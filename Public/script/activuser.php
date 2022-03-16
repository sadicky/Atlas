<?php
require_once('../../Model/Admin/user.class.php');
$cat = new Users();
$id=isset($_POST['id'])?$_POST['id']:'';

if($id)
{
    $active = $cat->activUser($id);
	if($active){
		echo '
		<strong style="color: green;">Succes:</strong> avec succes .
		';
		echo "<script>window.location.href='https://atlas243.com/index.php?page=user'</script>";
	}else{ echo "non ajoute";}
}
	
?>