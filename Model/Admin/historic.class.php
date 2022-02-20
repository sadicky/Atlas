<?php 
class Historics
{
	//historic_app
    public $ID_ARTICLE;
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
}




 ?>