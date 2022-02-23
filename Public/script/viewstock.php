<?php 

include"../../Model/Admin/connexion.php";
$db = getConnection();

$Id=$_POST['Id'];
//
$sql="SELECT tbl_articles.ARTICLE as ARTICLE,tbl_articles.ID as ARTID,tbl_articles.IDCAT as IDCAT,
tbl_articles.QTE as QTE,tbl_articles.PRIX as PRIX,tbl_articles.CONDITIONEMMENT as COND,tbl_categories.CATEGORIE as CATEGORIE FROM tbl_categories,
tbl_articles WHERE  tbl_articles.IDCAT=tbl_categories.ID AND tbl_articles.ID='$Id'";
$req=$db->query($sql);
$d=$req->fetch();
var_dump($Id);

 ?>

 <form class="form" id="formstock">
  <input type="hidden" name="Id" id="Id" class="form-control" value="<?=$d['ARTID']?>">
 	<div class="row">
 		<div class="col-md-6">
 			<div class="form-group">
 				<input type="number" min="20" name="qte" id="qte" class="form-control" value="<?=$d['QTE']?>">
 				<label>Stock disponible</label>
 			</div>
 		</div>
 		<div class="col-md-6">
 		<button class="btn btn-success btn-block submitb" name="submit" type="submit" id="submit">
           	<span class="glyphicon glyphicon-download"> Enregistrer</span>
        </button>
 		</div>
 	</div>
 </form>