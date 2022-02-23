<?php
function getConnection(){
	$db=new PDO("mysql:host=localhost;dbname=atlas1","root","");
	return $db; 
}
?>