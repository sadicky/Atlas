<?php 	
// require_once 'core.php';
session_start();
require_once '../../Model/Admin/connexion.php';
$connect = getConnection();

$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');
// print_r($valid);die();
if($_POST) {
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

				
	$sql = "INSERT INTO tbl_vente (DATEV, CLIENT,TEL, STATUTV,MTOTAL,PAYE, RESTE,
        STATUT, PTYPE,DATE,DEPOT,IDU) VALUES ('$orderDate', '$client', '$tel', '$paymentStatus',
		'$totalAmountValue', '$paid', '$dueValue','1', '$paymentType','$date','$depot','$userid')";

	
	// $sql = "INSERT INTO tbl_vente (DATEV, CLIENT,TEL, STATUTV,MTOTAL,PAYE, RESTE,
    //     STATUT, PTYPE,DATE,IDU) VALUES ('$orderDate', 'Kebano', '8481748', 
    //     'Dette',  2500, 2000, 500,'1', 'Cash','$date','$userid')";
	// var_dump($sql);

	$order_id;
	$orderStatus = false;
	$connect->query($sql);
	$order_id = $connect->lastInsertId();
		$valid['order_id'] = $order_id;	
// echo $valid;die();
		$orderStatus = true;
	

		// $_POST['article']= [1,2];
		// $art = $_POST['article'];
	// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['article']); $x++) {			
		$updateProductQuantitySql = "SELECT tbl_stockq.QTE FROM tbl_stockq WHERE tbl_stockq.ID = ".$_POST['article'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);
		
		while($updateProductQuantityResult = $updateProductQuantityData->fetch()) {
			$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['qte'][$x];							
				// update product table
				$updateProductTable = "UPDATE tbl_stockq SET QTE = '".$updateQuantity[$x]."' WHERE ID = ".$_POST['article'][$x]."";
				$connect->query($updateProductTable);

				// add into order_item
				$orderItemSql = "INSERT INTO tbl_vente_article (IDV, IDA, QTE,PRIX, TOTAL, STATUT) 
				VALUES ('$order_id', '".$_POST['article'][$x]."', '".$_POST['qte'][$x]."', '".$_POST['rate'][$x]."', '".$_POST['totalValue'][$x]."', '1')";

				$connect->query($orderItemSql);		

				if($x == count($_POST['article'])) {
					$orderItemStatus = true;
				}		
		} // while	
	} // /for quantity

	$valid['success'] = true;
	$valid['messages'] = "Successfully Added";

	echo "<script>window.location.href='https://atlas243.com/index.php?page=vente'</script>"; 
	echo json_encode($valid);
	
 
} // /if $_POST
// echo json_encode($valid);