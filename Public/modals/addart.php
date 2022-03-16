<div id="ajoutart" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter un Article</h4>
      </div>
      <div class="modal-body">	
      <form method="post" id="formulaire"  enctype="multipart/form-data">
          <?php 
            if ($_SESSION['ID']) { ?>
            	<input type="hidden" value="<?=$_SESSION['ID'] ?>" name="iduser" id="iduser" class="form-control" required>
           <?php }
           ?>
      	<div class="row">
      		<div class="col-sm-6">
			  <div class="form-group">      				
      				<b><label>Catégorie : </label> <span class="text-danger"></span></b>
							
				<select name="cat" id="cat" class='form-control'>
					<option value=''>Choisir une Catégorie</option>
					<?php foreach ($getCat as $f) {?>
						<option value='<?=$f->ID?>'><?=$f->CATEGORIE?></option>				
					<?php } ?>
				</select>
					 </div>
					 
      			<div class="form-group">      				
      				<b><label>Conditionnement : </label> <span class="text-danger"></span></b>
                      <select name="cond" class="form-control" id="cond">
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
      				<input type="text" class="form-control" placeholder="article" name="article" id="article" required>
					  <input type="hidden" name="expired" id="expired">
      		</div>
			    
      			
      			<div class="form-group">      				
      				<b><label>Coût d'achat : </label> <span class="text-danger">*</span></b>
      				<input type="number" class="form-control" placeholder="prix d'achat + transport" name="prix" id="prix" required>
      			</div><button class="btn btn-primary pull-right btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Ajouter</button>
			  
		</div>		
			  	
      	</div>
      </form>
      </div>
    </div>
  </div>
</div> 