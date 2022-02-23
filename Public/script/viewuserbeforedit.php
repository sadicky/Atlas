<?php
include"../../Model/Admin/connexion.php";
$db = getConnection();
$Id = $_POST['Id'];
$sql="SELECT * FROM tbl_users WHERE ID='$Id'";
$req=$db->query($sql);
$d=$req->fetch();

// echo $Id;

?>
 
<div>

<form method="post" id="formedit"  enctype="multipart/form-data">
    <input type="hidden" id="Id" name="Id" value="<?=$d['ID'] ?>">
      	<div class="row">
      		<div class="col-sm-6">
      			<div class="form-group">      				
      				<b><label>Noms : </label> <span class="text-danger">*</span></b>
      				<input type="text" class="form-control" value="<?= $d['NAME']?>" name="name" id="name" required>
      			</div>
      			<div class="form-group">      				
      				<b><label>Type : </label> <span class="text-danger"></span></b>
                      <select name="type" class="form-control" id="type" required>
                        <option value="<?=$d['TYPE']?>"><?= $d['TYPE']?></option>
                        <option value="admin">Admin</option>
                        <option value="gestionnaire de dépôt">Gestionnaire de dépôt</option>
                        <option value="magasinier">Magasinier</option>
                        <option value="quincaillerier">Quincaillerier</option>
                      </select>
					 </div>
      		</div>
      		<div class="col-sm-6">
      			<div class="form-group">      				
      				<b><label>Email : </label> <span class="text-danger">*</span></b>
      				<input type="text" class="form-control" value="<?= $d['EMAIL']?>" name="email" id="email" required>
      			</div>     
      			<b><label>#</label></b>
                <button class="btn btn-success btn-block submitb" name="submit" type="submit" id="submit">
           		    <span class="glyphicon glyphicon-download"> Enregistrer</span>
           	    </button>
					 <!--  -->
      		</div>	
			  	
      	</div>
      </form>

</div>