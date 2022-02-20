<?php $title = 'Liste de Vente - Magasin';
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
              <h1 class="page-header"><?=$title?></h1>
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
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
                                            
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
                                                        <th>Payé</th>
                                                        <th>Reste</th>
                                                        <th>Statut Paiement</th>
                                                        <th>Statut</th>
                                                        <th>Date</th>
                                                        <th>Crée par</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $cnt=1; foreach($getVente as $vente):
                                                      // $orderId = $vente->ID;

                                                      // $countOrderItemSql = "SELECT count(*) FROM tbl_vente_article WHERE IDV = $orderId";
                                                      // $itemCountResult = $db->query($countOrderItemSql);
                                                      // $itemCountRow = $itemCountResult->rowCount();
                                                      // var_dump($itemCountRow);die();
                                                      ?>
                                                    <tr class="odd gradeX">
                                                        <td align="center"><b>FACT000<?=$vente->ID?></b></td>
                                                        <td><b><?=$vente->CLIENT?></b></td>
                                                        <td><?=$vente->MTOTAL?></td>
                                                        <td><?=$vente->PAYE?></td>
                                                        <td><?=$vente->RESTE?></td>
                                                        <td><?php // active 
                                                          if($vente->STATUTV == 'totalite') { 		
                                                            echo "<label class='label label-success'>Totalité</label>";
                                                          } else if($vente->STATUTV == 'partiel') { 		
                                                            echo "<label class='label label-info'>Partiel</label>";
                                                          } else { 		
                                                           echo "<label class='label label-danger'>No Payment</label>";
                                                          }?>
                                                         </td>
                                                        <td><?=$vente->STATUT?></td>
                                                        <td><?=$vente->PTYPE?></td>
                                                        <td><?=$vente->NAME?></td>
                                                        <td class="center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                              Action <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                              
                                                              <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder(<?= $vente->ID?>)"> <i class="glyphicon glyphicon-save"></i> Paiement</a></li>

                                                              <li><a type="button" onclick="printOrder(<?= $vente->ID?>)"> <i class="glyphicon glyphicon-print"></i> Imprimer </a></li>
                                                                     
                                                            </ul>
                                                          </div>
                                                        </td>
                                                    </tr>
                                                    <?php $cnt++; endforeach ?>
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
<script type="text/javascript" src="public/ajax/orderm.js"></script>
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