
<?php 	
header('Content-type: application/json');
require_once '../../Model/Admin/connexion.php';
$connect = getConnection();

$productId = $_POST['productId'];

// $productId = 1;
$sql = "SELECT tbl_stockq.ID as ID, tbl_stockq.ARTICLE as ARTICLE,  tbl_stockq.QTE as QTE,
 tbl_stockq.PRIX as PRIX, tbl_stockq.IDCAT AS IDCAT, tbl_stockq.STATUT as STATUT 
 FROM tbl_stockq,tbl_categories WHERE tbl_stockq.ID =$productId
  AND tbl_categories.ID= tbl_stockq.IDCAT " ;
$result = $connect->prepare($sql);
$result->execute(); 
 $row = $result->fetchAll(PDO::FETCH_ASSOC);

//  var_dump($row);
// if num_rows

// $connect->close();

echo json_encode($row);