<?php 	
require_once '../../Model/Admin/connexion.php';
$connect = getConnection();

$orderId = $_POST['orderId'];

$valid = array('order' => array(), 'order_item' => array());

$statement = $connect->prepare("SELECT tbl_vente.ID, tbl_vente.DATEV, tbl_vente.CLIENT, tbl_vente.TEL, tbl_vente.MTOTAL,  tbl_vente.PAYE, tbl_vente.RESTE, 
tbl_vente.PTYPE, tbl_vente.STATUT FROM tbl_vente 	
	WHERE tbl_vente.ID = {$orderId}");

$statement->execute();
$data =  $statement->fetchAll();
$valid['order'] = $data;


// $connect->close();


echo json_encode($valid);