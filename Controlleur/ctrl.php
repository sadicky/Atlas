<?php 
	function login(){
	require_once('Model/Admin/auth.php');
	include('Vues/login.php');
}
	function logout(){
	// require_once('Model/Admin/auth.php');
	include('Vues/logout.php');
}
function home(){
	   require_once('Model/Admin/vente.class.php');
		$vente = new Vente();	
		$getVente = $vente->getV();	
	   include('Vues/Admin/home.php');
}


//Liste Vente Q
function vente(){	
	require_once('Model/Admin/vente.class.php');
	// $art = new Articles();
	$vente = new Vente();	
	$getVente = $vente->getVente();	
	include('Vues/Admin/vente.php');
}

//Liste Vente Q
function ventem(){	
	require_once('Model/Admin/vente.class.php');
	// $art = new Articles();
	$vente = new Vente();	
	$getVente = $vente->getVenteM();	
	include('Vues/Admin/ventem.php');
}
//vente Q
function order(){
	include('Vues/Admin/order.php');
}

//Expired
function expired(){
	require_once('Model/Admin/articles.class.php');
	require_once('Model/Admin/categories.class.php');
	$art = new Articles();
	$cat = new Categories();
	include('Vues/Admin/expired.php');
}

//epuise
function epuise(){
	require_once('Model/Admin/articles.class.php');
	require_once('Model/Admin/categories.class.php');
	$art = new Articles();
	$cat = new Categories();
	include('Vues/Admin/epuise.php');
}
//vente M
function orderm(){
	include('Vues/Admin/orderm.php');
}

//caisse M
function caisse(){
	include('Vues/Admin/caisse.php');
}
//
function categories(){
	require_once('Model/Admin/categories.class.php');
	$cat = new Categories();	
	include('Vues/Admin/categories.php');
}
function articles(){
	// session_start();
	require_once('Model/Admin/articles.class.php');
	require_once('Model/Admin/categories.class.php');
	$art = new Articles();
	$cat = new Categories();
	$getCat = $cat->getCategoriess();
	include('Vues/Admin/articles.php');
}
function users(){
	require_once('Model/Admin/user.class.php');
    $user = new Users();	
	include('Vues/Admin/users.php');
}

function approv(){
	require_once('Model/Admin/articles.class.php');
	require_once('Model/Admin/categories.class.php');
	$art = new Articles();
	$cat = new Categories();
	include('Vues/Admin/approv.php');
}


function recquisq(){	
	require_once('Model/Admin/articles.class.php');
	require_once('Model/Admin/categories.class.php');
	$art = new Articles();
	$cat = new Categories();
	include('Vues/Admin/recquisq.php');
}

function recquism(){
	require_once('Model/Admin/articles.class.php');
	require_once('Model/Admin/categories.class.php');
	$art = new Articles();
	$cat = new Categories();
	include('Vues/Admin/recquism.php');
}


function stock_quincailleries(){
	require_once('Model/Admin/articles.class.php');
	// require_once('Model/Admin/categories.class.php');
	$art = new Articles();
	// $cat = new Categories();
	$getStock = $art->getQ();
	include('Vues/Admin/stock_quincailleries.php');
}
function stock_magasin(){
	require_once('Model/Admin/articles.class.php');
	require_once('Model/Admin/categories.class.php');
	$art = new Articles();
	$cat = new Categories();
	$getStock = $art->getM();	
	include('Vues/Admin/stock_magasin.php');
}

function depot(){
	require_once('Model/Admin/articles.class.php');
	require_once('Model/Admin/categories.class.php');
	$art = new Articles();
	$cat = new Categories();
	$getStock = $art->getArticlesId();		
	include('Vues/Admin/depot.php');
}

function profile(){
	require_once('Model/Admin/connexion.php');
	include('Vues/Admin/profile.php');
}
//
function caisseE(){	
	require_once('Model/Admin/caisse.class.php');
	$caisse = new Caisse();	
	$getCaisse = $caisse->getCaisse();	
	 include('Vues/Admin/caissee.php');
}
//caisse E
function inventory(){	
	require_once('Model/Admin/caisse.class.php');
	$caisse = new Caisse();	
	$getCaisse = $caisse->getCaisse();	
	 include('Vues/Admin/inventory.php');
}
//caisse autres
function other(){	
	require_once('Model/Admin/caisse.class.php');
	$caisse = new Caisse();	
	$getCaisse = $caisse->getCaisse();	
	 include('Vues/Admin/other.php');
}
//depense
function etatdep(){	
	require_once('Model/Admin/caisse.class.php');
	$depense = new Caisse();	
	$getDepense = $depense->getDepense();	
	 include('Vues/Admin/etatdep.php');
}
//caisse S
function caisseS(){	
	require_once('Model/Admin/caisse.class.php');
	$depense = new Caisse();	
	$getDep = $depense->getDepense();	
	 include('Vues/Admin/caisses.php');
}