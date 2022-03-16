<?php
include"../../Model/Admin/connexion.php";
$db = getConnection();

$id=$_POST['Id'];
$sql="SELECT * FROM tbl_users WHERE ID='$id'";
$req=$db->query($sql);
$d=$req->fetch();

?>

<form method="POST" class="form" id="formeditprof">
   <input type="hidden" name="id" id="id" value="<?=$d['ID']?>">
 <div class="form-group">
  <label for="name">name</label>
  <input type="text" id="name" class="form-control" name="name" value="<?=$d['NAME']?>" required/>
 </div>
 <div class="form-group">
  <label for="name">mail</label>
  <input type="email" id="email" class="form-control" name="email" value="<?=$d['EMAIL']?>" required/>
 </div>
 <button class="btn btn-success submitb" name="submit" type="submit" id="submit">
    <span class="glyphicon glyphicon-download"> Enregistrer</span>
 </button>
</form>