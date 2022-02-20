<?php
require_once('../../Model/Admin/user.class.php');
$user = new Users();
$id=isset($_POST['id'])?$_POST['id']:'';

if($id)
{
    $desactiv = $user->desactUser($id);
	if($desactiv) echo "avec succes";
	else echo "non ajoute";
}
	
?>