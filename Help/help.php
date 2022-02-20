<?php 
 session_start();  
 //Nicwal 
 include"Model/connexion.php";
$db = getConnection();

$message='' ;
if(isset($_POST["login"]))  
{  
if(empty($_POST["EMAIL"]) || empty($_POST["PWD"]))  
{  
 $message = '<label>Veuillez complequer tout les champs</label>';  
}  
else  
{  
$sql = "SELECT * FROM tbl_users WHERE EMAIL = :EMAIL AND PWD = :PWD";  
$req = $db->prepare($sql);  
$d=$req->execute(array(  
                          'EMAIL'     =>   $_POST["EMAIL"],  
                          'PWD'     =>     $_POST["PWD"]  
                     ));  
$count = $d->rowCount();  
if($count > 0)  
{  
$_SESSION["EMAIL"] = $_POST["EMAIL"];  
header("location:index.php?page=home");  
}  
else  
{  
$message = "<label>Utilisateur de ce compte n'existe pas </label>";  
}  
}  
}  

echo $message;
  
 ?>


