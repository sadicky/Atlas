<?php 	

require_once '../../Model/Admin/connexion.php';
$connect = getConnection();

$statement = $connect->prepare("SELECT ID,ARTICLE FROM tbl_stockq WHERE STATUT = '1'and QTE > '0'");
$statement->execute();

$data =  $statement->fetchAll();

// $connect->close();

echo json_encode($data);