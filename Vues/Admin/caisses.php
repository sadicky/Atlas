<?php $title = 'Dépenses';
include 'public/includes/header.php';
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
              <div class='col-sm-12' id="message"></div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <!-- /.panel -->
                <div class="panel panel-default">
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            Facture
                            <div class="pull-right">
                              <button data-toggle="modal" data-target="#ajoutdep" class="btn btn-primary btn-xs"><i class="fa fa-plus fa-fw"></i> Nouvelle</button>
                              <button class="btn btn-danger btn-xs"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
                              <a href="index.php?page=etatdep" class="btn btn-default btn-xs"><i class="fa fa-list fa-fw"></i>Etats</a>
                          </div>
                          </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body">

                            <div class="table-responsive">
                              <table class="table table-striped table-condensed table-bordered table-hover" id="dataTables-example">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Total</th>
                                    <th>Motif du Paiement</th>
                                    <th>Statut</th>
                                    <th>Date Entree</th>
                                    <th>Crée par</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $cnt = 1;
                                  foreach ($getDep as $vente) : ?>
                                    <tr class="odd gradeX">
                                      <td align="center"><b>FACT000<?= $vente->ID ?></b></td>
                                      <td><b><?= $vente->BENEFICIAIRE ?></b></td>
                                      <td><?= $vente->MONTANT ?></td>
                                      <td><?= $vente->MOTIF ?></td>
                                      <td><?php // active 
                                          if ($vente->STATUT == '1') {
                                            echo "<label class='label label-success'>Actif</label>";
                                          } else {
                                            echo "<label class='label label-danger'>Actif</label>";
                                          } ?>
                                      </td>
                                      <td><?= $vente->DATE ?></td>
                                      <td><?= $vente->NAME ?></td>
                                    
                                    </tr>
                                  <?php $cnt++;
                                  endforeach ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                      </div>
                      <!-- /.col-lg-12 -->
                    </div>

                  </div>
                  <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
              </div>
              <!-- /.col-lg-8 -->
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

      </div>


      <?php

      include_once 'Public/modals/adddep.php'; ?>

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

      <!-- Page-Level Demo Scripts - Tables - Use for reference -->
      <script type="text/javascript" src="public/ajax/dep.js"></script>
      <!-- ./wrapper -->

</body>

<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

</html>