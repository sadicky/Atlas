<?php 
require_once("connexion.php");

class Historics
{
	//historic_app
    public $ID_ARTICLE;
    public $ARTICLE;
    public $PEREMPTION;
    public $QTE;
    public $PAYSFABR;
    public $DATE_APP;
    public $ID_USER;
     //Historique d'approvisionnement tbl_historic_appro
    //                
     public function setHistoricApp($ID_ARTICLE,$PEREMPTION,$QTE,$PAYSFABR,$DATE_APP,$ID_USER)
    {   
        $this->ID_ARTICLE=$ID_ARTICLE;
        $this->PEREMPTION=$PEREMPTION;
        $this->QTE=$QTE;
        $this->PAYSFABR=$PAYSFABR;
        $this->DATE_APP=$DATE_APP;
        $this->ID_USER=$ID_USER;

    $db = getConnection();
    $add1 = $db->prepare("INSERT INTO tbl_historic_appro (ID_ARTICLE,PEREMPTION,QTE,PAYSFABR,DATE_APP,ID_USER) VALUES (?,?,?,?,?,?)");
        $addline1 = $add1->execute(array($ID_ARTICLE,$PEREMPTION,$QTE,$PAYSFABR,date('Y-m-d H:i:s'),$ID_USER)) or die(print_r($add1->errorInfo()));
       
        return $addline1;
    }

    public function getHistoricApp(){
        $db=getConnection();
        $sql="SELECT tbl_historic_appro.PEREMPTION as PER,tbl_historic_appro.DATE_APP as DATE_APP,tbl_historic_appro.QTE as QTE,tbl_historic_appro.PAYSFABR as PAYSF,tbl_articles.ARTICLE as ARTICLE,tbl_users.NAME as NAME
         FROM tbl_historic_appro,tbl_articles,tbl_users WHERE tbl_historic_appro.ID_ARTICLE=tbl_articles.ID AND tbl_historic_appro.ID_USER=tbl_users.ID";
        $req=$db->query($sql);
        $tbl=array();
        while ($data=$req->fetchObject()) {
            $tbl[]=$data;
        }
        return $tbl;
    }


    public function setHistoricRecM($ARTICLE,$QTE,$COND,$PEREMPTION,$DATE,$IDCAT,$IDU)
    {   
        $this->ARTICLE=$ARTICLE;
        $this->PEREMPTION=$PEREMPTION;
        $this->QTE=$QTE;
        $this->COND=$COND;
        $this->DATE=$DATE;
        $this->IDCAT=$IDCAT;
        $this->IDU=$IDU;

    $db = getConnection();
    $add1 = $db->prepare("INSERT INTO tbl_historic_appro (ARTICLE,QTE,CONDITIONEMMENT,PEREMPTION,DATERECEIVE,IDCAT,IDUSER	
    ) VALUES (?,?,?,?,?,?,?)");
        $addline1 = $add1->execute(array($ARTICLE,$QTE,$COND,$PEREMPTION,date('Y-m-d H:i:s'),$IDCAT,$IDU)) or die(print_r($add1->errorInfo()));
       
        return $addline1;
    }

    public function getHistoricRecM(){
        $db=getConnection();
        $sql="SELECT tbl_users.NAME as user,tbl_articles.ARTICLE as art,tbl_historic_stockm.QTE as qt,tbl_historic_stockm.DATE_REQ as dte FROM tbl_historic_stockm,tbl_users,tbl_articles 
        WHERE tbl_historic_stockm.ID_USER=tbl_users.ID AND tbl_historic_stockm.ID_ART=tbl_articles.ID";
        $req=$db->query($sql);
        $tbl=array();
        while($d=$req->fetchObject()){
             $tbl[]=$d;
        }
        return $tbl;
    }

    public function getHistoricRecQ(){
        $db=getConnection();
        $sql="SELECT tbl_users.NAME as user,tbl_articles.ARTICLE as art,tbl_historic_stockq.QTE as qt,tbl_historic_stockq.DATE_REQ as dte FROM tbl_historic_stockq,tbl_users,tbl_articles 
        WHERE tbl_historic_stockq.ID_USER=tbl_users.ID AND tbl_historic_stockq.ID_ART=tbl_articles.ID";
        $req=$db->query($sql);
        $tbl=array();
        while($d=$req->fetchObject()){
             $tbl[]=$d;
        }
        return $tbl;
    }


}




 ?>