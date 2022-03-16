<?php 
include"../../Model/Admin/connexion.php";
$db = getConnection();

if(empty($_POST['Id'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Cet article n\'existe pas
	';
  }elseif(empty($_POST['qte'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer la quantite de stock SVP !
	';
  }else{
	$Id = htmlspecialchars(trim($_POST['Id']));
    $qte=htmlspecialchars(trim($_POST['qte']));

	$sql1="SELECT tbl_articles.ID as ID,tbl_articles.ARTICLE as ARTICLE,tbl_articles.QTE as QTE FROM tbl_categories,tbl_articles WHERE tbl_articles.IDCAT=tbl_categories.ID AND tbl_articles.ID='$Id' ";
	$sql2="UPDATE tbl_articles SET QTE=? WHERE ID=?";
	$req1=$db->query($sql1);
	$req2=$db->prepare($sql2);
	$data1 = $req1->fetch();
	if(empty($data1)){
	  echo '
	  <strong style="color: red;">Erreur 401:</strong> Cet article n\'existe pas.
	  ';
	}else{
	  $data2 = $req2->execute(array($qte,$Id));
	  if ($data2) {
		echo "
		<strong style='color: green;'>Succes:</strong>  le stock ".$data1['QTE']." est modifié avec succes .
		";
	 echo "<script>window.location.href='https://atlas243.com/index.php?page=depot'</script>";
	  }else{
		echo '
		<strong style="color: red;">Erreur 401:</strong> article existe deja.
		';
	  }
  
	}
  
  }





 ?>