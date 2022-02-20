<?php 
include"../../Model/connexion.php";
$db = getConnection();

if(empty($_POST['Id'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Cet article n\'existe pas
	';
  }elseif(empty($_POST['cat'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer la categorie SVP !
	';
  }elseif(empty($_POST['cond'])){
	echo '
	<strong style="color: red;">Erreur 403:</strong> Veuillez completer le conditionnement SVP !
	';
  }elseif(empty($_POST['article'])){
	echo "
	<strong style='color: red;'>Erreur 403:</strong> Veuillez completer l'article SVP !
	";
  }elseif(empty($_POST['prix'])){
	echo "
	<strong style='color: red;'>Erreur 403:</strong> Veuillez completer le prix SVP !
	";
  }else{
	$Id = htmlspecialchars(trim($_POST['Id']));
    $article=htmlspecialchars(trim($_POST['article']));
    $prix=htmlspecialchars(trim($_POST['prix']));  
    $cond=htmlspecialchars(trim($_POST['cond']));
    $cat=htmlspecialchars(trim($_POST['cat']));

	$sql1="SELECT tbl_articles.ID as ID,tbl_articles.ARTICLE as ARTICLE FROM tbl_categories,tbl_articles WHERE tbl_articles.IDCAT=tbl_categories.ID AND tbl_articles.ID='$Id' ";
	$sql2="UPDATE tbl_articles SET ARTICLE=?,PRIX=?,CONDITIONEMMENT=?,IDCAT=? WHERE ID=?";
	$sql3="UPDATE tbl_stockm SET ARTICLE=?,PRIX=?,CONDITIONEMMENT=?,IDCAT=? WHERE ID=?";
	$sql4="UPDATE tbl_stockq SET ARTICLE=?,PRIX=?,CONDITIONEMMENT=?,IDCAT=? WHERE ID=?";
	$req1=$db->query($sql1);
	$req2=$db->prepare($sql2);
	$req3=$db->prepare($sql3);
	$req4=$db->prepare($sql4);
	$data1 = $req1->fetch();
	if(empty($data1)){
	  echo '
	  <strong style="color: red;">Erreur 401:</strong> Cet article n\'existe pas.
	  ';
	}else{
	  $data2 = $req2->execute(array($article,$prix,$cond,$cat,$Id));
	  $data3 = $req3->execute(array($article,$prix,$cond,$cat,$Id));
	  $data4 = $req4->execute(array($article,$prix,$cond,$cat,$Id));
	  if ($data2 && $data3 && $data4) {
		echo "
		<strong style='color: green;'>Succes:</strong>  l'articele ".$data1['ARTICLE']." est modifié par <strong>".$article."</strong> avec succes .
		";
	  }else{
		echo '
		<strong style="color: red;">Erreur 401:</strong> article existe deja.
		';
	  }
  
	}
  
  }





 ?>