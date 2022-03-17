<?php
// function getConnection(){
// 	$db=new PDO("mysql:host=web47.lws-hosting.com;dbname=c1829494c_atlas243","c1829494c_atlas243","Spaceline2022");
// 	return $db;
// }

function getConnection(){
$db=new PDO("mysql:host=localhost;dbname=atlas","root","");
return $db;
}
 
?>



