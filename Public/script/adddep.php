<?php
session_start();
require_once('../../Model/Admin/caisse.class.php');
$caisse = new Caisse();
 $tel=isset($_POST['tel'])?$_POST['tel']:"";
 $date=isset($_POST['date'])?$_POST['date']:""; 
 $dateins=date("Y-m-d"); 
 $client=isset($_POST['client'])?$_POST['client']:""; 
 $montant=isset($_POST['montant'])?$_POST['montant']:""; 
 $motif=isset($_POST['motif'])?$_POST['motif']:""; 
 $adresse= isset($_POST['adresse'])?$_POST['adresse']:""; 
 $statut = 1;
 $idu = $_SESSION['ID'] ;
 $add = null;
  $add = $caisse-> setDepense($client,$tel,$adresse,$motif,$montant,$date,$dateins,$statut,$idu);
  if(!empty($add)){
	echo "<span class='alert alert-success alert-lg col-sm-12'>Ajout reussi avec Succes<button type='button' class='close' data-dismiss='alert'>x</button></span>";
	echo "<script>window.location.href='https://atlas243.com/index.php?page=caisseS'</script>"; 
}
  else{
	  echo "<span class='alert alert-danger alert-lg col-sm-12'>erreur d'insertion <button type='button' class='close' data-dismiss='alert'>x</button></span>";
	}
?>
   