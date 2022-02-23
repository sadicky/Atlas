<?php
require_once('../../Model/Admin/articles.class.php');
require_once('../../Model/Admin/connexion.php');
$db=getConnection();
$arts = new Articles();

$cat=isset($_POST['cat'])?$_POST['cat']:"";
$fab=isset($_POST['fab'])?$_POST['fab']:""; 
$dateins=isset($_POST['dateins'])?$_POST['dateins']:""; 
$article=isset($_POST['article'])?$_POST['article']:""; 
$prix=isset($_POST['prix'])?$_POST['prix']:""; 
$cond= isset($_POST['cond'])?$_POST['cond']:""; 
$expired =date('Y-m-d');  
$iduser=isset($_POST['iduser'])?$_POST['iduser']:"";

 if(empty($_POST['iduser'])){
   echo '
 <strong style="color: red;">Erreur 403:</strong> Utilisateur est inconnu! 
  ';
 }elseif(empty($_POST['cat'])){
  echo '
 <strong style="color: red;">Erreur 403:</strong> Veuillez completer la Catégorie SVP ! 
  ';
 }elseif(empty($_POST['cond'])){
 echo '
<strong style="color: red;">Erreur 403:</strong> Veuillez completer le Conditionnement SVP !
';
 }elseif(empty($_POST['article'])){
  echo "
	<strong style='color: red;'>Erreur 403:</strong> Veuillez completer le nom de l'article SVP !
	";
 }elseif(empty($_POST['prix'])){
 echo "
   <strong style=': red;'>Erreur 403:</strong> Veuillez completer le Coût d'achat SVP !
	";
 }else{
  
 $cat=htmlspecialchars(trim($_POST['cat']));
 $cond=htmlspecialchars(trim($_POST['cond']));
 $article=htmlspecialchars(trim($_POST['article']));
 $prix=htmlspecialchars(trim($_POST['prix']));
 $iduser=htmlspecialchars(trim($_POST['iduser']));
 $expired ="0000-00-00"; 
 $dateins=date("Y-m-d"); 

// $cat="yst";
// $cond="sac";
// $article="abc";
// $prix=10;
// $iduser=13;
// $expired =date("Y-m-d"); 
// $dateins="0000-00-00"; 

 $statut = 1;
 $qte = 0; 
 $montant = 0;
 $stock = 0;

 $add = null;
 $sql=$db->query("SELECT tbl_articles.ARTICLE as ART FROM tbl_articles");
 $row=$sql->fetch();
 $art=$row['ART'];
 if($art!=$article){
  $add=$arts->setArticle($article,$qte,$prix,$cond,$expired,$fab,$montant,$stock,$dateins,$statut,$cat,$iduser);
  if(!empty($add)){
  echo "<span class='alert alert-success alert-lg col-sm-12'>Ajout reussi avec Succes<button type='button' class='close' data-dismiss='alert'>x</button></span>";  
  // echo "<script>window.location.href='localhost/atlaslines/index.php?page=articles'</script>"; 
  echo "<script>window.location.href='http://atlas1.epizy.com/index.php?page=articles'</script>"; 
  }
  else{
    echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
  }
 }else{
   echo "<strong style='color:red;'>Erreur 402:</strong> ".$article." existe deja";
 }
 }
 
?>
   