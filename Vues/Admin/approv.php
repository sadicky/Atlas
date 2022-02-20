<?php $title = 'Approvisioner';
include 'public/includes/header.php';
$id =$_GET['id'];
$art = new Articles();
$data = $art->getArticleId($id);
// var_dump($data);die();
foreach ($data as $v):
?>

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
                    Approvisioner les produits
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                    <!-- /.col-lg-12 -->

                    <form method="post" id="formulaire">
                     <?php 
                      if (isset($_SESSION['ID'])) { ?>
                        <input type="text" name="iduser" id="iduser" value="<?=$_SESSION['ID'] ?>">
                     <?php }
                      ?>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Produit</label>
                            <input type="hidden" name="id" id="id" value="<?= $v->ID ?>">
                            <input readonly type="text" name="article" id="article" class="form-control" value="<?=  $v->ARTICLE ?>">
                         </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Date de Peremption</label>
                            <?php
                            if ($v->PEREMPTION !='0000-00-00') { ?>
                              <input type="date" name="expired" id="expired" value="<?=$v->PEREMPTION?>" class="form-control">
                            <?php } else { ?>
                              <input type="date" value="<?=$v->PEREMPTION?>"  name="expired" id="expired"  class="form-control">
                            <?php   }
                            ?>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Quantite : <span style="color:red"><?= $v->QTE  ?> </span></label>
                            <input value="<?=$v->QTE ?>" type="hidden" name="sqte" id="sqte">
                            <input type="number" name="qte" id="qte" class="form-control" placeholder="Quantity" required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Pays d'Approvisionnement : </label>
                            <input type="text" name="fab" value="<?=$v->PAYSFABR ?>" id="fab" class="form-control" placeholder="Pays d'Approvisionnement" required>
                         </div>
                        <button type="submit" class="btn btn-primary pull-right">Approvisionner</button>
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

<script type="text/javascript" src="public/ajax/approv.js"></script>
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

</html>