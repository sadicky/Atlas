<?php 
include"../../Model/Admin/connexion.php";
$db = getConnection();

if(empty($_POST['id'])){
    echo "Erreur d'identification ";
}else{
    $id=htmlspecialchars(trim($_POST['id']));
    $name=htmlspecialchars(trim($_POST['name']));
    $email=htmlspecialchars(trim($_POST['email']));
    /*-------------------------------------------*/ 
    $sql=$db->prepare("UPDATE tbl_users SET NAME=?,EMAIL=? WHERE ID=?");
    $data=$sql->execute(array($name,$email,$id));
    if($data){
        echo "Succes";
        echo "<script>window.location.href='https://atlas243.com/index.php?page=profile'</script>";
    }else{
    echo "Erreur d'identification ";

    }
}


?>