<?php
require_once('../../Model/Admin/articles.class.php');
$arts = new Articles();
$aqte = isset($_POST['aqte']) ? $_POST['aqte'] : 0;
$sqte = isset($_POST['sqte']) ? $_POST['sqte'] : 0;
$qqte = isset($_POST['qqte']) ? $_POST['qqte'] : 0;
$id = isset($_POST['id']) ? $_POST['id'] : 0;

// Calculs	
$balance = intval($sqte) - intval($aqte);
$Quinc_Qty= intval($aqte) + intval($qqte);
// $balance = 10;
$date = date('Y-m-d H:i:s');
$idu = 30;
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
  $add = $arts->recquisQ($Quinc_Qty, $date, $idu, $id);
  if ($add2 > 0) {
    echo "<script>window.location.href='https://atlas243.com/index.php?page=stock_quincailleries'</script>"; 
   echo "<span class='alert alert-success alert-lg col-sm-12'>Le stock de la Quincaillerie a été approvisionner avec succes<button type='button' class='close' data-dismiss='alert'>x</button></span>
         ";
  }  else {
    echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
  }			
}
