<?php
// function getConnection(){
// 	$db=new PDO("mysql:host=sql311.epizy.com;dbname=epiz_31115766_atlas","epiz_31115766","EKqLeLn9thGmT");
// 	return $db;
// }
function getConnection(){
	$db=new PDO("mysql:host=localhost;dbname=atlas1","root","");
	return $db; 
}
?>