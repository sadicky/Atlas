<?php
require_once("connexion.php");

Class Vente
{
    public $statut = 1;
    public $dateins=null;
    public $idcat;
    public $cat;

    //ajouter une categorie
    public function setVente($fac,$datev,$client,$tel,$statutv,$statut,$total)
    {   
        $this->client=$client;
        $this->tel=$tel;
        $this->fac=$fac;
        $this->statut=$statut;
        $this->statutv=$statutv;
        $this->total=$total;
        $this->datev=$datev;
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_vente (FACTURE, DATEV, CLIENT, TEL, STATUTV, STATUT, TOTAL)        VALUES (?,?,?,?,?,?,?)
    ");
        $addline = $add->execute(array($fac,$datev,$client,$tel,$statutv,$statut,$total)) or die(print_r($add->errorInfo()));
        return $addline;
    }
     //afficher les ventes de la quincaillerie
     public function getV()
     {
         $db = getConnection();
         $statement = $db->prepare("SELECT tbl_vente.ID AS ID,tbl_vente.CLIENT AS CLIENT,tbl_vente.MTOTAL AS MTOTAL,
         tbl_vente.STATUTV AS STATUTV,tbl_vente.STATUT AS STATUT,tbl_vente.PAYE AS PAYE,tbl_vente.RESTE AS RESTE,tbl_vente.DATEV AS DATEV,tbl_users.NAME,tbl_vente.PTYPE FROM tbl_vente,tbl_users 
         WHERE tbl_users.ID =tbl_vente.IDU ORDER BY ID DESC  LIMIT 10");
         $statement->execute();
         // $total_rows = $statement->rowCount();
         $tbP = array();
         while($data =  $statement->fetch(PDO::FETCH_OBJ)){
             $tbP[] = $data;
         }
          return $tbP;
     }
 

    //afficher les ventes de la quincaillerie
    public function getVente()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT tbl_vente.ID AS ID,tbl_vente.CLIENT AS CLIENT,tbl_vente.MTOTAL AS MTOTAL,
        tbl_vente.STATUTV AS STATUTV,tbl_vente.STATUT AS STATUT,tbl_vente.PAYE AS PAYE,tbl_vente.RESTE AS RESTE,tbl_vente.DATEV AS DATEV,tbl_users.NAME,tbl_vente.PTYPE FROM tbl_vente,tbl_users 
        WHERE tbl_users.ID =tbl_vente.IDU AND DEPOT='Quincaillerie' AND tbl_vente.STATUT='1' ORDER BY ID DESC");
        $statement->execute();
        // $total_rows = $statement->rowCount();
        $tbP = array();
        while($data =  $statement->fetch(PDO::FETCH_OBJ)){
            $tbP[] = $data;
        }
         return $tbP;
    }

        //afficher les ventes de la quincaillerie
        public function getVenteM()
        {
            $db = getConnection();
            $statement = $db->prepare("SELECT tbl_vente.ID AS ID,tbl_vente.CLIENT AS CLIENT,tbl_vente.MTOTAL AS MTOTAL,
            tbl_vente.STATUTV AS STATUTV,tbl_vente.STATUT AS STATUT,tbl_vente.PAYE AS PAYE,tbl_vente.RESTE AS RESTE,tbl_vente.DATEV AS DATEV,tbl_users.NAME,tbl_vente.PTYPE FROM tbl_vente,tbl_users 
            WHERE tbl_users.ID =tbl_vente.IDU AND DEPOT='Magasin' AND tbl_vente.STATUT='1' ORDER BY ID DESC");
            $statement->execute();
            // $total_rows = $statement->rowCount();
            $tbP = array();
            while($data =  $statement->fetch(PDO::FETCH_OBJ)){
                $tbP[] = $data;
            }
             return $tbP;
        }
  
    public function getCatId($idcat)
    {
        $db = getConnection();
        $matP = $db->prepare("SELECT * FROM tbl_categories WHERE ID=? LIMIT 1");
        $matP->execute(array($idcat));
        $res = array();
        while($data = $matP->fetchObject())
        {
            $res[] = $data;
        }
        return $res;
    }
    public function deleteCat($idcat)
    {
        $db = getConnection();
        $delete = $db->prepare("DELETE FROM tbl_categories WHERE ID =?");
        $ok = $delete->execute(array($idcat));
        return $ok;
    }
	
    public function updateProf($login,$pwd,$prenom,$nom,$fonction,$sexe,$tel,$photo,$access,$idcat)
    {
        $db = getConnection();
        $update = $db->prepare("UPDATE Admin SET LOGIN=?,PWD=?,PRENOM=?,NOM=?,FX=?,SEXE=?,TEL=?,PHOTO=?,ACCESS=?  WHERE ID =?");
        $ok = $update->execute(array($login,$pwd,$prenom,$nom,$fonction,$sexe,$tel,$photo,$access,$idcat)) or die(print_r($update->errorInfo()));
        return $ok;
    }

    public function deactivCat($idcat){
        $db = getConnection();
        $sql =$db->prepare( "UPDATE tbl_categories SET STATUT='0' where ID=?");
        $ok = $sql->execute(array($idcat));
        return $ok;
    }
    public function activCat($idcat){
        $db = getConnection();
        $sql =$db->prepare( "UPDATE tbl_categories SET STATUT='1' where ID=?");
        $ok = $sql->execute(array($idcat));
        return $ok;
    }
}
?>