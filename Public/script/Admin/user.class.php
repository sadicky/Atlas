<?php
require_once("connexion.php");

Class Users
{
    public $email; 
    public $pwd;
    public $name;
    public $type;
    public $statut;
    public $iduser;

    //ajouter un Admin
    public function setAdmin($email,$name,$type)
    {   
    //   PWD
    $pwdg = substr(sha1(time()),0,8);
    $pwd_encrypt=password_hash($pwdg,PASSWORD_DEFAULT);

        $this->email=$email;
        $pwds = $this->pwd=$pwd_encrypt;
        $this->name=$name;
        $this->type=$type;
        $statuts = $this->statut=1;

        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_users (EMAIL,PWD,NAME,TYPE,STATUT) VALUES (?,?,?,?,?)");
        $addline = $add->execute(array($email,$pwds,$name,$type,$statuts)) or die(print_r($add->errorInfo()));
        return !$addline?false:[
               'EMAIL'=>$this->email,
               'PWD'=>$pwdg
        ];
    }

    //afficher utilisateur
    public function getUsers()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_users group by ID DESC");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    public function activUser($iduser)
    {
    $db = getConnection();
    $req=$db->prepare("UPDATE tbl_users SET STATUT='1' WHERE ID=?");
    $d=$req->execute(array($iduser));
    return $d;
    }
    public function desactUser($iduser)
    {
    $db = getConnection();
    $req=$db->prepare("UPDATE tbl_users SET STATUT='0' WHERE ID=?");
    $d=$req->execute(array($iduser));
    return $d;
    }
}
?>