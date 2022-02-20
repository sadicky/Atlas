<?php $title = 'Recquisition Magasin';
include 'public/includes/header.php';
require_once('Model/Admin/connexion.php');
$id =$_GET['id'];
$db = getConnection();
$sql="SELECT * FROM tbl_articles WHERE ID='$id'";
$req=$db->query($sql);
$req->execute();
$g=$req->fetch(PDO::FETCH_OBJ);
$art = new Articles();
$data = $art->stockMId($id);
foreach ($data as $v):?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Debut Navbar -->
    <?php
    // include 'public/includes/navbar.php';

    //MENUADIM
    // include 'public/includes/menuadmin.php';
    ?>
    <!--Fin Navbar -->
    <!-- Content Wrapper. Contains page content -->

    <div id="wrapper">

      <!-- Navigation -->
      <?php
      include 'public/includes/navbar.php';
      ?>

      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header"><?= $title ?></h1>
            </div>
            <div class='col-sm-12' id="message"></div>
            <!-- /.col-lg-12 -->
            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                   <?=$title?>
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                    <!-- /.col-lg-12 -->

                    <form method="post" id="formulaire">

                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Produit</label>
                            <input type="hidden" name="id" id="id" value="<?=$v->ID?>">
                            <input readonly type="text" name="article" id="article" class="form-control" value="<?=$v->ARTICLE?>" placeholder="DCU du medicament Ici">
                         </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Stock Disponible</label>
                              <input readonly type="number" name="sqte" id="sqte" value="<?=$g->QTE?>" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Quantite : </label>
                            <input value="<?=$v->QTE?>" type="hidden" name="qqte" id="qqte">
                            <input type="number" name="aqte" id="aqte" class="form-control" placeholder="Quantity" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group"> 
                            <label>&nbsp; </label><br>
                            <button type="submit" class="btn btn-primary btn-block pull-right">Recquisitionner</button>
                         </div>
                        </div>
                        </div>

                        <!-- /.col -->
                      </div>
                    </form>

                  </div>

                </div>
                <!-- /.container-fluid -->
              </div>
              <!-- /#page-wrapper -->

            </div>

            <!-- jQuery -->
            <script src="plugins/js/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="plugins/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="plugins/js/metisMenu.min.js"></script>

            <!-- DataTables JavaScript -->
            <script src="plugins/js/dataTables/jquery.dataTables.min.js"></script>
            <script src="plugins/js/dataTables/dataTables.bootstrap.min.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="plugins/js/startmin.js"></script>

            <!-- /.content-wrapper -->
            <?php  endforeach ?>
            
          
          </div>
          <!-- ./wrapper -->

</body>

<script type="text/javascript" src="public/ajax/recquism.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

</html>