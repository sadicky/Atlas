<?php 
session_start(); 
require_once("../../Model/connexion.php");
$db = getConnection();

if(!empty($_POST['EMAIL']) && !empty($_POST['PWD'])){
  $EMAIL=$_POST['EMAIL'];
  $PWD=$_POST['PWD'];

  var_dump($EMAIL);
  var_dump($PWD);

  $sql = $db->prepare("SELECT * FROM tbl_users WHERE EMAIL= :EMAIL");
  $sql->bindValue('EMAIL',$EMAIL);
  $sql->execute();
  $res=$sql->fetch(PDO::FETCH_ASSOC);
    
    var_dump($res);

  if($res){
    $pwdHash=$res['PWD'];
    if(password_verify($PWD,$pwdHash)){
      // header("location:../../index.php?page=home");
      echo "Connexion reussie...";
    }else{
      echo "invalid";
    }
  }else{
    echo "invalid";
  }
}
/*
Email 'carolle@gmail.com'
Mot de passe '718930b5'

*/ 
?>