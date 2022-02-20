<?php
function getConnection(){
	$db=new PDO("mysql:host=localhost;dbname=atlas","root","");
	return $db; 
}
?>