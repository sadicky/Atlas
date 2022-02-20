<div id="ajoutdep" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content"> 
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter une dépense</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="formulaire" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <b><label>Bénéficiaire : </label> <span class="text-danger"></span></b> 
                  <input type="hidden" name="idu" id="idu" class='form-control'>
                  <input type="text"  placeholder="Nom du Client"  name="client" id="client" class='form-control' required>
              </div>
              <div class="form-group">
                <b><label>Montant : </label> <span class="text-danger"></span></b>
                <input type="number" placeholder="Montant"  name="montant" id="montant" class='form-control' required>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <b><label>Adresse : </label></b> 
                  <input type="text"  placeholder="Adresse du client"  name="adresse" id="adresse" class='form-control'>             
              </div>
              <div class="form-group">
                <b><label>Motif : </label></b>
                <input type="text"  placeholder="Motif d'entree"  name="motif" id="motif" class='form-control'>             
               </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <b><label>Téléphone : </label></b>
                <input type="text" class="form-control" placeholder="Numero de téléphone" name="tel" id="tel">
              </div>

              <div class="form-group">
                <b><label>Date : </label> <span class="text-danger">*</span></b>
                <input type="date" class="form-control" name="date" id="date" required>
              </div>
              <div class="form-group ">
                <b><label>&nbsp; </label></b><br>
                <button class="btn btn-primary btn-block btn-sm" type="submit"><i class="fa fa-plus fa-fw"></i> Ajouter</button>
              </div>
            </div>

          </div>

      </div>
      </form>
    </div>
  </div>
</div>
</div>