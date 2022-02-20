<div id="Ajouter" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Approvisionner</h4></div>
      <div class="modal-body">
                            <form method="post" id="formulaire">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Produit</label>
                                            <input type="hidden" name="id" id="id" value="<?= 1 ?>" placeholder="DCU du medicament Ici">
                                            <input readonly type="text" name="article" id="article" class="form-control" value="<?= "article" ?>" placeholder="DCU du medicament Ici">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date de Peremption</label>
                                            <?php
                                            if ( '0000-00-00') { ?>
                                                <input readonly type="date" name="expiry" id="expiry" value="<?='000-00-00'?>" class="form-control">
                                            <?php } else { ?>
                                                <input type="date" name="expiry" id="expiry" required class="form-control">
                                                <span class="text-danger"></span>
                                            <?php   }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Quantite : <span style="color:red"><?=0 ?> </span></label>
                                            <input value="<?= 0 ?>" type="hidden" name="sqte" id="sqte">
                                            <input type="number" name="qte" id="qte" class="form-control" placeholder="Quantity" required>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Ajouter</button>

                                    <!-- /.col -->
                                </div>
                            </form>

      </div>
    </div>
  </div>
</div>