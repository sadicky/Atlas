
<div id="facture" class="modal fade">

<div class="modal-dialog">
 <form method="post" id="order_form">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
 <h4 class="modal-title">Créer une facture</h4>
   </div>
   <div class="modal-body">
    <div class="row">
  <div class="col-md-6">
   <div class="form-group">
    <label>Client</label>
    <input type="text" name="client" id="client" class="form-control" required />
   </div>
  </div>
  <div class="col-md-6">
   <div class="form-group">
    <label>Date</label>
    <input type="text" name="date" id="date" class="form-control" required />
   </div>
  </div>
 </div>
 <div class="form-group">
  <label>téléphone du Client</label> 
  <input type="text" name="tel" id="tel" class="form-control" required /></div>
 <div class="form-group">
  <label>Détails du produit</label>
  <hr />
  <span id="span_product_details"></span>
  <hr />
 </div>
 <div class="form-group">
  <label>Select Payment Status</label>
  <select name="pstatut" id="pstatut" class="form-control">
   <option value="cash">Cash</option>
   <option value="credit">Credit</option>
  </select>
 </div>
   </div>
   <div class="modal-footer">
    <input type="hidden" name="inventory_order_id" id="inventory_order_id" />
    <input type="hidden" name="btn_action" id="btn_action" />
    <button type="submit" name="action" id="action" class="btn btn-primary"><i class="fa fa-plus"></i> Créer une facture</button>
   </div>
  </div>
 </form>
</div>

</div>