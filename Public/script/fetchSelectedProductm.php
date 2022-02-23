
<?php 	
header('Content-type: application/json');
require_once '../../Model/Admin/connexion.php';
$connect = getConnection();

$productId = $_POST['productId'];

// $productId = 1;
$sql = "SELECT tbl_stockm.ID as ID, tbl_stockm.ARTICLE as ARTICLE,  tbl_stockm.QTE as QTE,
 tbl_stockm.PRIX as PRIX, tbl_stockm.IDCAT AS IDCAT, tbl_stockm.STATUT as STATUT 
 FROM tbl_stockm,tbl_categories WHERE tbl_stockm.ID =$productId
  AND tbl_categories.ID= tbl_stockm.IDCAT " ;
$result = $connect->prepare($sql);
$result->execute(); 
 $row = $result->fetchAll(PDO::FETCH_ASSOC);

//  var_dump($row);
// if num_rows

// $connect->close();

echo json_encode($row);