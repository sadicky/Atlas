<?php
include"../../Model/connexion.php";
$db = getConnection();

$Id = $_POST['Id'];
$sql="SELECT * FROM tbl_categories WHERE ID='$Id'";
$req=$db->query($sql);
$d=$req->fetch();

?>
<div>
<form  method="post" id='formeditcat' enctype="multipart/form-data">
    <input type="hidden" value="<?=$d['ID']?>" name="Id" id="Id" />
			<div class="form-group">
				<label>Catégorie</label>	
        	<input class="form-control" type="hidden" value="<?=$d['CREATEDAT']?>" name="dateins" id="dateins"required />
			<input class="form-control" type="text" value="<?=$d['CATEGORIE']?>" name="cat" id="cat" placeholder='Libellé de la catégorie' autocomplete="off" required />
			</div>
            <button class="btn btn-success btn-block submitb" name="submit" type="submit" id="submit">
           		    <span class="glyphicon glyphicon-download"> Enregistrer</span>
           	    </button>
      </form>
</div>