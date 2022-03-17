<?php
session_start();
include 'Controlleur/ctrl.php';
if(isset($_SESSION['TYPE'])){ 
  $type=$_SESSION['TYPE'];
  $id=$_SESSION['ID'];
  if ($type=="admin") {
  	if(isset($_GET['page'])){
	if($_GET['page']=='login'){
		login();
	}
	else if($_GET['page']=='logout')
	{
		logout();
	}else if($_GET['page']=='home')
	{
		home();
	}else if($_GET['page']=='profile')
	{
		profile();
	}
	else if($_GET['page']=='categories')
	{
		categories();
	}
	else if($_GET['page']=='articles')
	{
		articles();
	}
	
	else if($_GET['page']=='stock_quincailleries')
	{
		stock_quincailleries();
	}
	else if($_GET['page']=='depot')
	{
		depot();
	}
	else if($_GET['page']=='user')
	{
		users();
	}
	else if($_GET['page']=='stock_magasin')
	{
		stock_magasin();
	}
	else if($_GET['page']=='approv')
	{
		approv();
	}
	else if($_GET['page']=='recquism')
	{
		recquism();
	}
	else if($_GET['page']=='recquisq')
	{
		recquisq();
	}
	else if($_GET['page']=='vente')
	{
		vente();
	}else if($_GET['page']=='order')
	{
		order();
	}
	else if($_GET['page']=='orderm')
	{
		orderm();
	}
	else if($_GET['page']=='caisse')
	{
		caisse();
	}else if($_GET['page']=='caisseE')
	{
		caisseE();
	}
	else if($_GET['page']=='caisseS')
	{
		caisseS();
	}
	else if($_GET['page']=='expired')
	{
		expired();
	}
	else if($_GET['page']=='epuise')
	{
		epuise();
	}
	else if($_GET['page']=='ventem')
	{
		ventem();
	}else if($_GET['page']=='other')
	{
		other();
	}
	else if($_GET['page']=='etatdep')
	{
		etatdep();
	}
	else if($_GET['page']=='inventory')
	{
		inventory();
	}
	else if($_GET['page']=='historicapp')
	{
		historicapp();
	}
	else if($_GET['page']=='historicrecm')
	{
		historicrecm();
	}
	else if($_GET['page']=='historicreq')
	{
		historicrecq();
	}
	else{
		home();
	}	
}
else{
	home();
}
  }elseif ($type=="gestionnaire de dépôt") {
  	if(isset($_GET['page'])){
	if($_GET['page']=='login'){
		login();
	}
	else if($_GET['page']=='logout')
	{
		logout();
	}else if($_GET['page']=='home')
	{
		home();
	}else if($_GET['page']=='profile')
	{
		profile();
	}
	else if($_GET['page']=='categories')
	{
		categories();
	}
	else if($_GET['page']=='articles')
	{
		articles();
	}
	else if($_GET['page']=='depot')
	{
		depot();
	}
	else if($_GET['page']=='approv')
	{
		approv();
	}
	else if($_GET['page']=='historicapp')
	{
		historicapp();
	}
	else if($_GET['page']=='expired')
	{
		expired();
	}
	else if($_GET['page']=='epuise')
	{
		epuise();
	}
	else{
		home();
	}	
}
else{
	home();
}
  }elseif ($type=="quincaillerier") {
  	if(isset($_GET['page'])){
	if($_GET['page']=='login'){
		login();
	}
	else if($_GET['page']=='logout')
	{
		logout();
	}else if($_GET['page']=='home')
	{
		home();
	}else if($_GET['page']=='profile')
	{
		profile();
	}
	else if($_GET['page']=='categories')
	{
		categories();
	}
	else if($_GET['page']=='articles')
	{
		articles();
	}
	else if($_GET['page']=='stock_quincailleries')
	{
		stock_quincailleries();
	}
	else if($_GET['page']=='recquisq')
	{
		recquisq();
	}
	else if($_GET['page']=='order')
	{
		order();
	}
	else if($_GET['page']=='vente')
	{
		vente();
	}else if($_GET['page']=='expired')
	{
		expired();
	}
	else if($_GET['page']=='epuise')
	{
		epuise();
	}
	else if($_GET['page']=='historicreq')
	{
		historicrecq();
	}
	else{
		home();
	}	
}
else{
	home();
}
  }elseif ($type=="magasinier") {
  	if(isset($_GET['page'])){
	if($_GET['page']=='login'){
		login();
	}
	else if($_GET['page']=='logout')
	{
		logout();
	}else if($_GET['page']=='home')
	{
		home();
	}else if($_GET['page']=='profile')
	{
		profile();
	}
	else if($_GET['page']=='categories')
	{
		categories();
	}
	else if($_GET['page']=='articles')
	{
		articles();
	}
	else if($_GET['page']=='stock_magasin')
	{
		stock_magasin();
	}
	else if($_GET['page']=='recquism')
	{
		recquism();
	}
	else if($_GET['page']=='orderm')
	{
		orderm();
	}
	else if($_GET['page']=='ventem')
	{
		ventem();
	}else if($_GET['page']=='expired')
	{
		expired();
	}
	else if($_GET['page']=='epuise')
	{
		epuise();
	}
	else if($_GET['page']=='historicrecm')
	{
		historicrecm();
	}
	else{
		home();
	}	
}
else{
	home();
}
  }
}else{
    if(isset($_GET['page'])){
	if($_GET['page']=='login'){
		login();
	}
	else if($_GET['page']=='logout')
	{
		logout();
	}
	else{
		login();
	}	
}
else{
	login();
}
  }
?>