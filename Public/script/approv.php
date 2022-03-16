<?php
require_once('../../Model/Admin/articles.class.php');
require_once('../../Model/Admin/historic.class.php');
$arts = new Articles();
$hist = new Historics();

$expired = isset($_POST['expired']) ? $_POST['expired'] : "";
$article = isset($_POST['article']) ? $_POST['article'] : "";
$fab = isset($_POST['fab']) ? $_POST['fab'] : "Inconnu";
$aqte = isset($_POST['qte']) ? $_POST['qte'] : 0;
$sqte = isset($_POST['sqte']) ? $_POST['sqte'] : 0;
$id = isset($_POST['id']) ? $_POST['id'] : 0; //iduser
$iduser = htmlspecialchars(trim($_POST['iduser']));

// Calculs	
$balance = intval($sqte) + intval($aqte);
// $balance = 10;
$date = date('Y-m-d');
// $idu = 13;
$add = null;
$add4=$hist->setHistoricApp($id,$expired,$aqte,$fab,$date,$iduser);
$add2 = $arts->Approvisionner2($expired, $fab, $iduser, $id);
$add3 = $arts->Approvisionner3($expired, $fab, $iduser, $id);
$add = $arts->Approvisionner($balance, $expired, $date, $fab, $iduser, $id);
if (!empty($add)) {
 echo "<span class='alert alert-success alert-lg col-sm-12'>Ajout reussi avec Succes<button type='button' class='close' data-dismiss='alert'>x</button></span>
       ";
  echo "<script>window.location.href='https://atlas243.com/index.php?page=depot'</script>"; 
} else {
  echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
}
