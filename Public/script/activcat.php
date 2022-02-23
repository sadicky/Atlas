<?php
require_once('../../Model/Admin/categories.class.php');
$cat = new Categories();
$id=isset($_POST['id'])?$_POST['id']:'';

if($id)
{
    $delete = $cat->activCat($id);
	if($delete){
        echo "<script>
        window.location.href=http://atlas1.epizy.com/atlasLines/index.php?page=categories
        </script>";
   }else{echo "non ajoute";}
}
	
?>