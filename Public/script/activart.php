<?php
require_once('../../Model/Admin/articles.class.php');
$cat = new Articles();
$id=isset($_POST['id'])?$_POST['id']:'';

if($id)
{
    $delete = $cat->activArt($id);
	if($delete) echo "avec succes";
	else echo "non ajoute";
}
	
?>