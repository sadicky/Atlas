<?php
require_once("connexion.php");

Class Categories
{
    public $idcat;
    public $cat;
    public $dateins=null;
    public $statut = 1;

    //ajouter une categorie
    public function setCategorie($cat,$dateins,$statut)
    {   
        $this->cat=$cat;
        $this->dateins=$dateins; 
        $this->statut=$statut;
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_categories (CATEGORIE,CREATEDAT,STATUT) VALUES (?,?,?)");
        $addline = $add->execute(array($cat,date("Y-m-d"),$statut)) or die(print_r($add->errorInfo()));
        return $addline;
    }

    //afficher les catégories
    public function getCategories()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_categories group by ID DESC");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    //afficher les catégories
    public function getCategoriess()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_categories WHERE STATUT='1'");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
  
    public function getCatId($idcat)
    {
        $db = getConnection();
        $matP = $db->prepare("SELECT * FROM tbl_categories WHERE ID=? LIMIT 1");
        $matP->execute(array($idprof));
        $res = array();
        while($data = $matP->fetchObject())
        {
            $res[] = $data;
        }
        return $res;
    }
	
     public function activCat($idcat){
         $db = getConnection();
         $sql =$db->prepare( "UPDATE tbl_categories SET STATUT='1' WHERE ID=?");
         $ok = $sql->execute(array($idcat));
        return $ok;
     }
     
    public function deactivCat($idcat){
        $db = getConnection();
        $sql =$db->prepare( "UPDATE tbl_categories SET STATUT='0' WHERE ID=?");
        $ok = $sql->execute(array($idcat));
        return $ok;
    }
}
?>