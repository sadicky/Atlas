<?php
require_once('../../Model/Admin/user.class.php');
$cat = new Users();
$id=isset($_POST['id'])?$_POST['id']:'';

if($id)
{
    $active = $cat->activUser($id);
	if($active) echo "avec succes";
	else echo "non ajoute";
}
	
?>