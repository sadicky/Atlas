<?php 
include"../../Model/Admin/connexion.php";
$db = getConnection();

if(empty($_POST['Id'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Cette categorie n\'existe pas
	';
  }elseif(empty($_POST['cat'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer le champ nom du categorie SVP !
	';
  }else{
	$Id = htmlspecialchars(trim($_POST['Id']));
	$cat = htmlspecialchars(trim($_POST['cat']));
	$dateins = htmlspecialchars(trim($_POST['dateins']));
	$sql1="SELECT tbl_categories.ID as ID FROM tbl_categories WHERE ID='$Id' ";
	$sql2="UPDATE tbl_categories SET CATEGORIE=?,CREATEDAT=? WHERE ID=?";
	$req1=$db->query($sql1);
	$req2=$db->prepare($sql2);
	$data1 = $req1->fetch();
	if(empty($data1)){
	  echo '
	  <strong style="color: red;">Erreur 401:</strong> Cette categorie n\'existe pas.
	  ';
	}else{
	  $data2 = $req2->execute(array($cat,$dateins,$Id));
	  if ($data2) {
		echo '
		<strong style="color: green;">Succes:</strong> Categorie est modifiee avec succes .
		';
		echo "<script>window.location.href='https://atlas243.com/index.php?page=categories'</script>"; 
	  }else{
		echo '
		<strong style="color: red;">Erreur 401:</strong> Categorie existe deja.
		';
	  }
  
	}
  
  }





 ?>