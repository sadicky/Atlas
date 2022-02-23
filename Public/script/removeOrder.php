<?php 	

require_once '../../Model/Admin/connexion.php';
$connect = getConnection();


$valid['success'] = array('success' => false, 'messages' => array());

$orderId = $_POST['orderId'];

if($orderId) { 

 $sql = "UPDATE tbl_vente SET STATUT = 2 WHERE ID = {$orderId}";

 $orderItem = "UPDATE tbl_vente_article SET STATUS = 2 WHERE  IDV = {$orderId}";

 if($connect->query($sql) === TRUE && $connect->query($orderItem) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
//  $connect->close();

 echo json_encode($valid);
 
} // /if $_POST