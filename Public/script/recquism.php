<?php
require_once('../../Model/Admin/articles.class.php');
require_once('../../Model/Admin/historic.class.php');
$hist = new Historics();
$arts = new Articles();
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$aqte = isset($_POST['aqte']) ? $_POST['aqte'] : 0;
$sqte = isset($_POST['sqte']) ? $_POST['sqte'] : 0;
$qqte = isset($_POST['qqte']) ? $_POST['qqte'] : 0;
$idu = htmlspecialchars(trim($_POST['idu']));

// Calculs	
$balance = intval($sqte) - intval($aqte);
$Quinc_Qty= intval($aqte) + intval($qqte);
// $balance = 10;
$date = date('Y-m-d H:i:s');
$add = null;
// var_dump($Quinc_Qty);die();
if ($sqte <= 0) {
 echo "<span class='alert alert-danger alert-lg col-sm-12'>ce produit est déjà épuisé dans le stock<button type='button' class='close' data-dismiss='alert'>x</button></span>
       ";

} else if ($aqte > $sqte) { 
  echo "<span class='alert alert-danger alert-lg col-sm-12'>Quantité entrée est supérieure à celle du Stock principal<button type='button' class='close' data-dismiss='alert'>x</button></span>
  ";
  die();

}
else if ($sqte > 0) {
  $add2 = $arts->ApprovRecq($balance, $idu, $id);
  $add = $arts->recquisM($Quinc_Qty, $date, $idu, $id);
  $add3 = $arts->setHistoricReqAtlas($id,$aqte,$date,$idu);
  if ($add2 > 0) {
    echo "<script>window.location.href='https://atlas243.com/index.php?page=stock_magasin'</script>"; 
   echo "<span class='alert alert-success alert-lg col-sm-12'>Le stock de la Quincaillerie a été approvisionner avec succes<button type='button' class='close' data-dismiss='alert'>x</button></span>
         ";
  }  else {
    echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
  }			
}
