<?php 
require_once("connexion.php");
$db = getConnection();
$msg="";

if(empty($_POST['EMAIL'])){
// $msg='
//   <strong style="color: red;">Erreur 403:</strong> Veuillez completer le mail SVP 
//   ';
}elseif(empty($_POST['PWD'])){
  $msg='
  <strong style="color: red;">Erreur 403:</strong> Veuillez completer le mot de passe SVP
  ';
}else{
  $EMAIL=$_POST['EMAIL'];
  $PWD=$_POST['PWD'];

  $sql = $db->prepare("SELECT * FROM tbl_users WHERE STATUT='1' AND EMAIL= :EMAIL");
  $sql->bindValue('EMAIL',$EMAIL);
  $sql->execute();
  $res=$sql->fetch(PDO::FETCH_ASSOC);
    
    // var_dump($res);

  if($res){
    $pwdHash=$res['PWD'];
    if(password_verify($PWD,$pwdHash)){
      session_start(); 
      $_SESSION['ID']=$res['ID'];
      $_SESSION['TYPE']=$res['TYPE'];
      $_SESSION['STATUT']=$res['STATUT'];
      $_SESSION['NAME']=$res['NAME'];
      $_SESSION['EMAIL']=$res['EMAIL'];
      $_SESSION['logged']=true;

      header("location:index.php?page=home");
    }else{
      $msg="Error 403: Erreur de la connexion";
    }
  }else{
      $msg="Error 403: Erreur de la connexion";
  }
}


echo $msg;
/*
Email 'carolle@gmail.com'
Mot de passe '718930b5'
---------------------
Email 'dev@gmail.com'
Mot de passe '5df7791d'

*/ 
?>