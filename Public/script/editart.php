<?php 
// include"../../Model/connexion.php";
include"../../Model/Admin/connexion.php";
$db = getConnection();

if(empty($_POST['Id'])){
 echo "<strong style='color:red;'>Cet article n'existe pas</strong>";
}elseif(empty($_POST['cat'])){
 echo "<strong style='color:red;'>Veuillez completer la categorie de cet article</strong>";
}elseif(empty($_POST['cond'])){
	echo "<strong style='color:red;'>Veuillez completer le conditionnement de cet article</strong>";
}elseif(empty($_POST['article'])){
	echo "<strong style='color:red;'>Veuillez completer le nom d'article</strong>";
}elseif(empty($_POST['prix'])){
	echo "<strong style='color:red;'>Veuillez completer le prix de cet article</strong>";
}else{
$id=htmlspecialchars(trim($_POST['Id']));
$cat=htmlspecialchars(trim($_POST['cat']));
$cond=htmlspecialchars(trim($_POST['cond']));
$article=htmlspecialchars(trim($_POST['article']));
$prix=htmlspecialchars(trim($_POST['prix']));

$sql=$db->prepare("UPDATE tbl_articles SET ARTICLE=?,PRIX=?,CONDITIONEMMENT=?,IDCAT=? WHERE ID=?");
$sql1=$db->prepare("UPDATE tbl_stockm SET ARTICLE=?,PRIX=?,CONDITIONEMMENT=?,IDCAT=? WHERE ID=?");
$sql2=$db->prepare("UPDATE tbl_stockq SET ARTICLE=?,PRIX=?,CONDITIONEMMENT=?,IDCAT=? WHERE ID=?");
$data=$sql->execute(array($article,$prix,$cond,$cat,$id));
$data1=$sql1->execute(array($article,$prix,$cond,$cat,$id));
$data2=$sql2->execute(array($article,$prix,$cond,$cat,$id));
/*----------------------------------------------------------*/
if($data OR $data1 OR $data2){
 echo "<strong style='color:green;'>L'article est modifié avec succes</strong>";
 echo "<script>window.location.href='https://atlas243.com/index.php?page=articles'</script>"; 
}else{
echo "<strong style='color:red;'>Erreur de la modification d'un article</strong>";
}

}

?>