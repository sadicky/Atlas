<?php 
session_start(); 
require_once("../../Model/Admin/connexion.php");
$db = getConnection();
extract($_POST);


$message='' ;
if(isset($_POST["login"]))  
{  
if(empty($_POST["email"]) || empty($_POST["pwd"]))  
{  
 $message = '<label>Veuillez complequer tout les champs</label>';  
}  
else  
{  
$sql = "SELECT * FROM tbl_users WHERE STATUT=1 AND EMAIL =? AND PWD =?";  
$req = $db->prepare($sql);  
$d=$req->execute(array(  
                          'EMAIL'     =>   $_POST["email"],  
                          'PWD'     =>     $_POST["pwd"]  
                     ));  
$count = $d->rowCount();  
if($count > 0)  
{  
$_SESSION["EMAIL"] = $_POST["email"];  
header("location:../../index.php?page=home");  
}  
else  
{  
$message = "<label>Utilisateur de ce compte n'existe pas </label>";  
header("location:../../index.php?page=login");  
}  
}  
}  

echo $message;


 ?>