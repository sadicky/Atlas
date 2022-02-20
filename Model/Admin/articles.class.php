<?php
require_once("connexion.php");

Class Articles
{
    public $statut = 1;
    public $dateins=null;
    public $article;
    public $prix;
    public $qte;
    public $montant;
    public $idu;
    public $stockout;
    public $idcat;
    public $cond;
    public $expired=null;
    public $fab;
    
    //                
     
    //ajouter un article
    public function setArticle($article,$qte,$prix,$cond,$expired,$fab,$montant,$stock,$dateins,$statut,$idcat,$idu)
    {   
        $this->idcat=$idcat;
        $this->statut=$statut;
        $this->dateins=$dateins;
        $this->article=$article;
        $this->prix=$prix;
        $this->montant=$montant;
        $this->fab=$fab;          
        $this->expired=$expired;
        $this->stock=$stock;
        $this->cond=$cond;
        $this->idu=$idu;
        $this->qte=$qte;
        $db = getConnection();
        $add1 = $db->prepare("INSERT INTO tbl_articles (ARTICLE,QTE,PRIX,CONDITIONEMMENT,PEREMPTION,PAYSFABR,MONTANT,STOCK_OUT,DATECREAT,STATUT,IDCAT,IDUSER    
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $addline1 = $add1->execute(array($article,$qte,$prix,$cond,$expired,$fab,$montant,$stock,$dateins,$statut,$idcat,$idu)) or die(print_r($add1->errorInfo()));
        
        $add2 = $db->prepare("INSERT INTO tbl_stockm (ARTICLE,QTE,PRIX,CONDITIONEMMENT,PEREMPTION,PAYSFABR,MONTANT,STOCK_OUT,DATERECEIVE,STATUT,IDCAT,IDUSER    
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $addline2 = $add2->execute(array($article,$qte,$prix,$cond,$expired,$fab,$montant,$stock,$dateins,$statut,$idcat,$idu)) or die(print_r($add2->errorInfo()));
       
        $add3 = $db->prepare("INSERT INTO tbl_stockq (ARTICLE,QTE,PRIX,CONDITIONEMMENT,PEREMPTION,PAYSFABR,MONTANT,STOCK_OUT,DATERECEIVE,STATUT,IDCAT,IDUSER    
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $addline3 = $add3->execute(array($article,$qte,$prix,$cond,$expired,$fab,$montant,$stock,$dateins,$statut,$idcat,$idu)) or die(print_r($add3->errorInfo()));
       
        
        return $addline1;
    }

    
    
    public function Approvisionner($qte,$expired,$dateins,$fab,$idu,$id)
    {   
        $this->fab=$fab;          
        $this->expired=$expired;
        $this->idu=$idu;
        $this->qte=$qte;
        $this->id=$id;
        $db = getConnection();
        $update = $db->prepare("UPDATE tbl_articles SET QTE=?,PEREMPTION=?,DATECREAT=?,PAYSFABR=?,IDUSER=? WHERE ID =?");
        $ok = $update->execute(array($qte,$expired,date('Y-m-d H:i:s'),$fab,$idu,$id)) or die(print_r($update->errorInfo()));
        return $ok;
    }
     
    //RECQUISITIONER LA QUINQ
    public function recquisQ($qte,$dateins,$idu,$id)
    {   
        $this->idu=$idu;
        $this->qte=$qte;
        $this->id=$id;
        $this->dateins=$dateins;
        $db = getConnection();
        $update = $db->prepare("UPDATE tbl_stockq SET QTE=?,DATERECEIVE=?,IDUSER=? WHERE ID =?");
        $ok = $update->execute(array($qte,$dateins,$idu,$id)) or die(print_r($update->errorInfo()));
        return $ok;
    }
    //RECQUISITIONER LE STOCK
    public function recquisM($qte,$dateins,$idu,$id)
    {   
        $this->idu=$idu;
        $this->qte=$qte;
        $this->id=$id;
        $this->dateins=$dateins;
        $db = getConnection();
        $update = $db->prepare("UPDATE tbl_stockm SET QTE=?,DATERECEIVE=?,IDUSER=? WHERE ID =?");
        $ok = $update->execute(array($qte,$dateins,$idu,$id)) or die(print_r($update->errorInfo()));
        return $ok;
    }
    //MISE A JOUR APRES RECQUISITION 
    public function ApprovRecq($qte,$idu,$id)
    {   
        $this->idu=$idu;
        $this->qte=$qte;
        $this->id=$id;
        $db = getConnection();
        $update = $db->prepare("UPDATE tbl_articles SET QTE=?,IDUSER=? WHERE ID =?");
        $ok = $update->execute(array($qte,$idu,$id)) or die(print_r($update->errorInfo()));
        return $ok;
    }
    
    public function RecquisitionnerQ($qte,$expired,$dateins,$fab,$idu,$id)
    {   
        $this->fab=$fab;          
        $this->expired=$expired;
        $this->idu=$idu;
        $this->qte=$qte;
        $this->id=$id;
        $db = getConnection();
        $update = $db->prepare("UPDATE tbl_stockq SET QTE=?,PEREMPTION=?,DATECREAT=?,PAYSFABR=?,IDUSER=? WHERE ID =?");
        $ok = $update->execute(array($qte,$expired,date('Y-m-d H:i:s'),$fab,$idu,$id)) or die(print_r($update->errorInfo()));
        return $ok;
    }

    public function RecquisitionnerM($qte,$expired,$dateins,$fab,$idu,$id)
    {   
        $this->fab=$fab;          
        $this->expired=$expired;
        $this->idu=$idu;
        $this->qte=$qte;
        $this->id=$id;
        $db = getConnection();
        $update = $db->prepare("UPDATE tbl_stockm SET QTE=?,PEREMPTION=?,DATECREAT=?,PAYSFABR=?,IDUSER=? WHERE ID =?");
        $ok = $update->execute(array($qte,$expired,date('Y-m-d H:i:s'),$fab,$idu,$id)) or die(print_r($update->errorInfo()));
        return $ok;
    }

    public function Approvisionner2($expired,$fab,$idu,$id)
    {   
        $this->fab=$fab;          
        $this->expired=$expired;
        $this->idu=$idu;
        $this->id=$id;
        $db = getConnection();
        $update1 = $db->prepare("UPDATE tbl_stockm SET PEREMPTION=?,PAYSFABR=?,IDUSER=? WHERE ID =?");
        $ok1 = $update1->execute(array($expired,$fab,$idu,$id)) or die(print_r($update1->errorInfo()));
        return $ok1;
         
    }
    public function Approvisionner3($expired,$fab,$idu,$id)
    {   
        $this->fab=$fab;          
        $this->expired=$expired;
        $this->idu=$idu;
        $this->id=$id;
        $db = getConnection();       
        $update2 = $db->prepare("UPDATE tbl_stockq SET PEREMPTION=?,PAYSFABR=?,IDUSER=? WHERE ID =?");
        $ok = $update2->execute(array($expired,$fab,$idu,$id)) or die(print_r($update2->errorInfo()));
        return $ok;
         
    }


     //afficher les catégories
    public function getArticlesId()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT tbl_articles.ID,tbl_articles.ARTICLE,tbl_articles.QTE,tbl_articles.PRIX,tbl_articles.PEREMPTION,tbl_articles.STATUT,tbl_categories.CATEGORIE FROM tbl_articles,tbl_categories WHERE  tbl_articles.IDCAT=tbl_categories.ID");
        $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }

     //afficher tous les articles epuises
     public function getOutStock()
     {
         $db = getConnection();
         $statement = $db->prepare("select * from tbl_articles,tbl_categories WHERE tbl_articles.IDCAT=tbl_categories.ID && QTE='0' && DATECREAT !='0000-00-00'");
         $statement->execute();
         $tbP = array();
         while($data =  $statement->fetchObject()){
             $tbP[] = $data;
         }
          return $tbP;
     }

     //afficher tous les articles epuises
     public function getExpired()
     {
         $db = getConnection();
         $drug_expiry_date = date("Y-m-d", strtotime(date("Y-m-d")));
         $statement = $db->prepare("select * FROM tbl_articles,tbl_categories WHERE tbl_articles.IDCAT=tbl_categories.ID && PEREMPTION < '$drug_expiry_date' AND DATECREAT !='0000-00-00'");
         $statement->execute();
         $tbP = array();
         while($data =  $statement->fetchObject()){
             $tbP[] = $data;
         }
          return $tbP;
     }
      //afficher les catégories
      public function StockQId($id)
      {
          $db = getConnection();
          $statement = $db->prepare("SELECT * FROM tbl_stockq  WHERE ID=? LIMIT 1");
          $statement->execute(array($id));
          $tbP = array();
          while($data =  $statement->fetchObject()){
              $tbP[] = $data;
          }
           return $tbP;
      }
      //STOCK QUINQ
      public function getQ()
      {
          $db = getConnection();
          $statement = $db->prepare("SELECT  tbl_stockq.ID as ID,tbl_stockq.ARTICLE as ARTICLE,tbl_stockq.QTE as QTE,tbl_stockq.PRIX AS PRIX,tbl_stockq.PEREMPTION AS PEREMPTION,tbl_stockq.STATUT AS STATUT,tbl_categories.CATEGORIE AS CATEGORIE FROM tbl_stockq,tbl_categories WHERE  tbl_stockq.IDCAT=tbl_categories.ID ");
          $statement->execute();
          $tbP = array();
          while($data =  $statement->fetchObject()){
              $tbP[] = $data;
          }
           return $tbP;
      }
    
      //STOCK MAGASIN
      public function getM()
      {
          $db = getConnection();
          $statement = $db->prepare("SELECT  tbl_stockm.ID,tbl_stockm.ARTICLE,tbl_stockm.QTE,tbl_stockm.PRIX,tbl_stockm.PEREMPTION,tbl_stockm.STATUT,tbl_categories.CATEGORIE FROM tbl_stockm,tbl_categories WHERE  tbl_stockm.IDCAT=tbl_categories.ID ");
          $statement->execute();
          $tbP = array();
          while($data =  $statement->fetchObject()){
              $tbP[] = $data;
          }
           return $tbP;
      }
    
    public function OutOfStock($table){
        $db = getConnection();
        $statement =$db->prepare("SELECT * FROM tbl_articles WHERE QTE <= 20 LIMIT 5"); 
         $statement->execute();
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
    public function StockMId($id)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_stockm  WHERE ID=? LIMIT 1");
        $statement->execute(array($id));
        $tbP = array();
        while($data =  $statement->fetchObject()){
            $tbP[] = $data;
        }
         return $tbP;
    }
  
    public function getArticleId($idart)
    {
        $db = getConnection();
        $matP = $db->prepare("SELECT tbl_articles.ID,tbl_articles.ARTICLE,tbl_articles.QTE,tbl_articles.PRIX,tbl_articles.PEREMPTION,tbl_articles.STATUT,tbl_categories.CATEGORIE,tbl_articles.PAYSFABR  FROM tbl_articles,tbl_categories WHERE tbl_articles.IDCAT=tbl_categories.ID
         AND tbl_articles.ID=? LIMIT 1");
        $matP->execute(array($idart));
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
    
    public function updateProf($login,$pwd,$prenom,$nom,$fonction,$sexe,$tel,$photo,$access,$idprof)
    {
        $db = getConnection();
        $update = $db->prepare("UPDATE Admin SET LOGIN=?,PWD=?,PRENOM=?,NOM=?,FX=?,SEXE=?,TEL=?,PHOTO=?,ACCESS=?  WHERE ID =?");
        $ok = $update->execute(array($login,$pwd,$prenom,$nom,$fonction,$sexe,$tel,$photo,$access,$idadmin)) or die(print_r($update->errorInfo()));
        return $ok;
    }

     public function activArt($idart){
         $db = getConnection();
         $sql =$db->prepare( "UPDATE tbl_articles SET STATUT='1' where ID=?");
         $ok = $sql->execute(array($idart));
        return $ok;
     }
     
    public function deactivArt($idcat){
        $db = getConnection();
        $sql =$db->prepare( "UPDATE tbl_articles SET STATUT='0' WHERE QTE='0' AND ID=?");
        $ok = $sql->execute(array($idcat));
        return $ok;
    }




   
}
?>