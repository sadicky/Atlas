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

function getCategories()
{
    $db = getConnection();
    $statement = $db->prepare("SELECT * FROM tbl_categories group by ID DESC");
    $statement->execute();
    $tbP = array();
    while($data =  $statement->fetchObject()){
            $tbP[] = $data;
    }
         return $tbP;
}

?>
<form method="post" id="formeditart"  enctype="multipart/form-data">
    <input type="hidden" value="<?=$d['ARTID']?>" name="Id" id="Id" />
      	<div class="row">
      		<div class="col-sm-6">
              <div class="form-group">      				
      				<b><label>Catégorie : </label> <span class="text-danger"></span></b>
							
				<select name="cat" id="cat" class='form-control'>
					<option value="<?=$d['IDCAT']?>"><?=$d['CATEGORIE']?></option>
					<?php 
                    $getCat = getCategories();
                    foreach ($getCat as $f) {?>
						<option value='<?=$f->ID?>'><?=$f->CATEGORIE?></option>				
					<?php } ?>
				</select>
					 </div>

      			<div class="form-group">      				
      				<b><label>Conditionnement : </label> <span class="text-danger"></span></b>
                      <select name="cond" class="form-control" id="cond">
                        <option value="<?=$d['COND']?>"><?=$d['COND']?></option>
                        <option value="Carton">Carton</option>
                        <option value="Paquet">Paquet</option>
                        <option value="Sac">Sac</option>
                        <!-- <option value="Autres">Autre</option> -->
                      </select>
					 </div>
      		</div>
      		<div class="col-sm-6">
              <div class="form-group">      				
      				<b><label>Article : </label> <span class="text-danger">*</span></b>
      				<input type="text" class="form-control" value="<?=$d['ARTICLE']?>" name="article" id="article" required>
      			</div>

      			<div class="form-group">      				
      				<b><label>Prix d'achat : </label> <span class="text-danger">*</span></b>
      				<input type="number" value="<?=$d['PRIX']?>" class="form-control" name="prix" id="prix" required>
      			</div><button class="btn btn-info pull-right btn-sm submitarticle" name="submit" type="submit" id="submit"><i class="fa fa-download fa-fw"></i> Editer</button>
			  
		</div>		
			  	
      	</div>
      </form>