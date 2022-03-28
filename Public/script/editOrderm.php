<?php 	
// require_once 'core.php';
session_start();
require_once '../../Model/Admin/connexion.php';
$connect = getConnection();

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$orderId = $_POST['orderId'];
	$orderDate 						= $_POST['datev'];	
	$client 					        = $_POST['client'];
	$tel			                	= $_POST['tel'];
	$totalAmountValue                 = $_POST['totalAmountValue'];
	$paid                             = $_POST['paid'];
	$dueValue 						= $_POST['dueValue'];
	$paymentType 					    = $_POST['paymentType'];
	$paymentStatus 				    = $_POST['paymentStatus'];
	$date								= date('Y-m-d');
	$depot 				            ="Quincaillerie";
  //   $userid 				            =13;
	$userid 				= $_SESSION['ID'];
				
	$sql = "UPDATE tbl_vente SET DATEV = '$orderDate', CLIENT = '$client', TEL = '$tel', 
	 MTOTAL = '$totalAmountValue', PAYE = '$paid', RESTE = '$dueValue', PTYPE = '$paymentType', STATUTV = '$paymentStatus',
	  STATUT = 1 ,IDU = '$userid' WHERE ID = {$orderId}";	
	$connect->query($sql);
	
	$readyToUpdateOrderItem = false;
	// add the quantity from the order item to product table
	for($x = 0; $x < count($_POST['article']); $x++) {		
		//  product table
		$updateProductQuantitySql = "SELECT tbl_stockm.QTE FROM tbl_stockm WHERE tbl_stockm.ID = ".$_POST['article'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);			
			
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch()) {
			// order item table add product quantity
			$orderItemTableSql = "SELECT tbl_vente_article.QTE FROM tbl_vente_article WHERE tbl_vente_article.IDV = {$orderId}";
			$orderItemResult = $connect->query($orderItemTableSql);
			$orderItemData = $orderItemResult->fetch();

			$editQuantity = $updateProductQuantityResult[0] + $orderItemData[0];							

			$updateQuantitySql = "UPDATE tbl_stockm SET QTE = $editQuantity WHERE ID = ".$_POST['article'][$x]."";
			$connect->query($updateQuantitySql);		
		} // while	
		
		if(count($_POST['article']) == count($_POST['article'])) {
			$readyToUpdateOrderItem = true;			
		}
	} // /for quantity

	// remove the order item data from order item table
	for($x = 0; $x < count($_POST['article']); $x++) {			
		$removeOrderSql = "DELETE FROM tbl_vente_article WHERE IDV = {$orderId}";
		$connect->query($removeOrderSql);	
	} // /for quantity

	if($readyToUpdateOrderItem) {
			// insert the order item data 
		for($x = 0; $x < count($_POST['article']); $x++) {			
			$updateProductQuantitySql = "SELECT tbl_stockm.QTE FROM tbl_stockm WHERE tbl_stockm.ID = ".$_POST['article'][$x]."";
			$updateProductQuantityData = $connect->query($updateProductQuantitySql);
			
			while ($updateProductQuantityResult = $updateProductQuantityData->fetch()) {
				$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['qte'][$x];							
					// update product table
					$updateProductTable = "UPDATE tbl_stockm SET QTE = '".$updateQuantity[$x]."' WHERE ID = ".$_POST['article'][$x]."";
					$connect->query($updateProductTable);

					// add into order_item
				$orderItemSql = "INSERT INTO tbl_vente_article (IDV, IDA, QTE,PRIX, TOTAL, STATUT) 
				VALUES ('$orderId', '".$_POST['article'][$x]."', '".$_POST['qte'][$x]."', '".$_POST['rate'][$x]."', '".$_POST['totalValue'][$x]."', '1')";

				$connect->query($orderItemSql);		
			} // while	
		} // /for quantity
	}

	

	$valid['success'] = true;
	$valid['messages'] = "Successfully Updated";		
	
	// $connect->close();

	echo "<script>window.location.href='https://atlas243.com/index.php?page=ventem'</script>"; 
	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);