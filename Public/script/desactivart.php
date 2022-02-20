<?php
require_once('../../Model/Admin/articles.class.php');
$cat = new Articles();
$id=isset($_POST['id'])?$_POST['id']:'';
// $id = 23;
if($id)
{
    $delete = $cat->deactivArt($id);
	if($delete) echo "avec succes";
	else echo "non ajoute";
}
	
?>