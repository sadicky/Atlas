<?php 
include"../../Model/Admin/connexion.php";
$db = getConnection();

// $Id=$_POST['Id'];
// $email=$_POST['email'];
// $name=$_POST['name'];
// $type=$_POST['type'];
// $sql="UPDATE tbl_users SET EMAIL='$email',NAME='$name',TYPE='$type' WHERE ID='$Id'";
// $req=$db->prepare($sql);
// $d=$req->execute(array($email,$name,$type));
// if ($d) {
// 	echo "Modification reussi...";
// }else{
// 	echo "Error...";
// }


if(empty($_POST['Id'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Utilisateur de cet identifiant est inconnu
	';
  }elseif(empty($_POST['email'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer le champ Mail SVP !
	';
  }elseif(empty($_POST['name'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer le champ Noms SVP !
	';
  }elseif(empty($_POST['type'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer le Type champs SVP !
	';
  }else{
	$Id = htmlspecialchars(trim($_POST['Id']));
	$email = htmlspecialchars(trim($_POST['email']));
	$name = htmlspecialchars(trim($_POST['name']));
	$type = htmlspecialchars(trim($_POST['type']));
	$sql1="SELECT tbl_users.ID as ID FROM tbl_users WHERE ID='$Id' ";
	$sql2="UPDATE tbl_users SET EMAIL='$email',NAME='$name',TYPE='$type' WHERE ID='$Id'";
	$req1=$db->query($sql1);
	$req2=$db->prepare($sql2);
	$data1 = $req1->fetch();
	if(empty($data1)){
	  echo '
	  <strong style="color: red;">Erreur 401:</strong> Utilisateur n\'existe pas.
	  ';
	}else{
	  $data2 = $req2->execute(array($email,$name,$type));
	  if ($data2) {
		echo '
		<strong style="color: green;">Succes:</strong> Utilisateur est modifie avec succes .
		';
		echo "<script>window.location.href='https://atlas243.com/index.php?page=user'</script>";
	  }else{
		echo '
		<strong style="color: red;">Erreur 401:</strong> Utilisateur existe deja.
		';
	  }
  
	}
  
  }





 ?>