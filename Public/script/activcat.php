<?php
require_once('../../Model/Admin/categories.class.php');
$cat = new Categories();
$id=isset($_POST['id'])?$_POST['id']:'';

if($id)
{
    $delete = $cat->activCat($id);
	if($delete){
        echo '
		<strong style="color: green;">Succes:</strong> avec succes .
		';
		echo "<script>window.location.href='https://atlas243.com/index.php?page=categories'</script>";
   }else{echo "non ajoute";}
}
	
?>