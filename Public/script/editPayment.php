<?php 	

require_once '../../Model/Admin/connexion.php';
$connect = getConnection();

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$orderId 					= $_POST['orderId'];
	$payAmount 				= $_POST['payAmount']; 
  $paymentType 			= $_POST['paymentType'];
  $paymentStatus 		= $_POST['paymentStatus'];  
  $paidAmount        = $_POST['paidAmount'];
  $grandTotal        = $_POST['grandTotal'];

  $updatePaidAmount = $payAmount + $paidAmount;
  $updateDue = $grandTotal - $updatePaidAmount;

	$sql = "UPDATE tbl_vente SET PAYE = '$updatePaidAmount', RESTE = '$updateDue', PTYPE = '$paymentType', STATUT = '$paymentStatus' WHERE tbl_vente = {$orderId}";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

	

echo json_encode($valid);
 
} // /if $_POST