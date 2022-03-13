<?php 	

require_once '../../Model/Admin/connexion.php';
$connect = getConnection();


$valid['success'] = array('success' => false, 'messages' => array());

// $orderId = 1;
$orderId = $_POST['orderId'];

if($orderId) { 
 $sql = $connect->query("UPDATE tbl_vente SET STATUT = 0 WHERE ID = $orderId");

 $orderItem =$connect->query("UPDATE tbl_vente_article SET STATUT = 0 WHERE  IDV = $orderId");
	
 if($sql == TRUE && $orderItem == TRUE) {
	$valid['success'] = true;
   $valid['messages'] = "Annulation avec succes";		
} else {
	$valid['success'] = false;
	$valid['messages'] = "Erreur";
}	
  
//  $connect->close();

 echo json_encode($valid);
 
} // /if $_POST