<?php 
include"../../Model/connexion.php";
$db = getConnection();

if(empty($_POST['id'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Mauvaise connexion
	';
  }elseif(empty($_POST['name'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer le champ nom SVP !
	';
  }elseif(empty($_POST['email'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer le champ mail SVP !
	';
  }else{
	$id = htmlspecialchars(trim($_POST['id']));
	$name = htmlspecialchars(trim($_POST['name']));
	$email = htmlspecialchars(trim($_POST['email']));
	$sql1="SELECT tbl_users.ID as ID FROM tbl_users WHERE ID='$id' ";
	$sql2="UPDATE tbl_users SET NAME=?,EMAIL=? WHERE ID=?";
	$req1=$db->query($sql1);
	$req2=$db->prepare($sql2);
	$data1 = $req1->fetch();
	if(empty($data1)){
	  echo '
	  <strong style="color: red;">Erreur 402:</strong> Mauvaise connexion.
	  ';
	}else{
	  $data2 = $req2->execute(array($name,$email,$id));
	  if ($data2) {
		echo '
		<strong style="color: green;">Succes:</strong> Succes de la modification .
		';
	  }else{
		echo '
		<strong style="color: red;">Erreur 401:</strong> Mauvaise connexion.
		';
	  }
  
	}
  
  }





 ?>