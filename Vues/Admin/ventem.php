<?php $title = 'Liste de Vente - Magasin';
?>
<html lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" href="Public/Images/logo.png" type="image/x-icon"> 
<meta name="description" content="Atlas">
<meta name="author" content="SpaceLine">

<title><?= $title ?></title>

<!-- Bootstrap Core CSS -->
<link href="plugins/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="plugins/css/metisMenu.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link href="plugins/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="plugins/css/dataTables/dataTables.responsive.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="plugins/css/startmin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="plugins/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

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
if (isset($_SESSION['logged'])) { ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php?page=home">Atlas</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-right navbar-top-links">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i>
                 <?php 
                  $name = isset($_SESSION['NAME']) ? $_SESSION['NAME']:'';
                  echo $name;
                  ?>
               <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="index.php?page=profile"><i class="fa fa-user fa-fw"></i> Profil</a>
              </li>
              <li class="divider"></li>
              <li><a href="index.php?page=logout"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
              <li>
                <a href="index.php?page=home" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
              </li>              
              <li>
                <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Articles<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="index.php?page=categories">Catégories</a>
                  </li>
                  <li>
                    <a href="index.php?page=articles">Articles</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
               <?php 
               if (isset($_SESSION['TYPE'])) {
                   $type=$_SESSION['TYPE'];
                   if($type=="admin" OR $type=="gestionnaire de dépôt"){ ?>
               <li>
                <a href="index.php?page=depot"><i class="fa fa-table fa-fw"></i> Dépot </a>
              </li>
                 <?php }
               }
              ?>
             
               <?php 
                 if (isset($_SESSION['TYPE'])) {
                    $type=$_SESSION['TYPE'];
                    if ($type=="admin" OR $type=="magasinier" OR $type=="quincaillerier") { ?>
                <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Recquisitionner<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <?php 
                   if ($type=="quincaillerier" OR $type=="admin") { ?>
                  <li>
                    <a href="index.php?page=stock_quincailleries">Métropole</a>
                  </li>
                 <?php  }
                   ?>
                  <?php 
                  if ($type=="magasinier" OR $type=="admin") { ?>
                    <li>
                    <a href="index.php?page=stock_magasin">Atlas</a>
                  </li>
                 <?php }
                   ?>
                </ul>
                <!-- /.nav-second-level -->
              </li>
                   <?php }
                 }
                ?>
                <?php 
                 if (isset($_SESSION['TYPE'])) {
                    $type=$_SESSION['TYPE'];
                    if ($type=="admin" OR $type=="magasinier" OR $type=="quincaillerier") { ?>
                <li>
                <a href="#"><i class="fa fa-money fa-fw"></i>  Vente<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <?php 
                   if ($type=="quincaillerier" OR $type=="admin") { ?>
                  <li>
                      <a href="index.php?page=vente">Métropole</a>
                  </li>
                 <?php  }
                   ?>
                  <?php 
                  if ($type=="magasinier" OR $type=="admin") { ?>
                    <li>
                    <a href="index.php?page=ventem">Atlas</a>
                  </li>
                 <?php }
                   ?>
                </ul>
                <!-- /.nav-second-level -->
              </li>
                   <?php }
                 }
                ?>
                <!--  -->
                <?php 
               if (isset($_SESSION['TYPE'])) {
                   $type=$_SESSION['TYPE'];
                   if($type=="admin"){ ?>
                       <li>
                <a href="#"><i class="fa fa-usd fa-fw"></i> Caisse<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                <a href="index.php?page=caisse">Etat</a>
                  </li>
                  <li>
                <a href="index.php?page=caisseE">Entrée</a>
                  </li>
                  <li>
                <a href="index.php?page=caisseS">Dépense</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
                  <?php }
               }
              ?>
                
              <?php 
               if (isset($_SESSION['TYPE'])) {
                   $type=$_SESSION['TYPE'];
                   if($type=="admin"){ ?>
                    <li>
                <a href="index.php?page=user"><i class="fa fa-user fa-fw"></i> Utilisateurs</a>
              
                <!-- /.nav-second-level -->
              </li>
                  <?php }
               }
              ?>
              <?php 
               if (isset($_SESSION['TYPE'])) {
                   $type=$_SESSION['TYPE'];
                   if($type=="admin" OR $type="gestionnaire de dépôt"){ ?>
                         <li>
                <a href="#"><i class="fa fa-plus fa-fw"></i> Historique<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                <li>
                      <a href="index.php?page=historicapp">Approvisionnement</a>
                  </li>
                  <li>
                      <a href="index.php?page=historicrecm">Récquisition Atlas</a>
                  </li>
                  <li>
                      <a href="index.php?page=historicreq">Récquisition Métropole</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
                  <?php }
               }
              ?>
               <?php 
               if (isset($_SESSION['TYPE'])) {
                  $type=$_SESSION['TYPE'];
                  if ($type=="admin") { ?>
                     <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Rapports<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="index.php?page=inventory">Inventaire</a>
                  </li>
                  <!-- <li>
                    <a href="index.php?page=stock_magasin">Stock</a>
                  </li> -->
                </ul>
                <!-- /.nav-second-level -->
              </li>
                 <?php }
               }
                ?>
            </ul>
          </div>
        </div>
      </nav>
<?php }else{
header("location:index.php?page=login");
} ?>
      <div id="page-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header"><?= $title ?></h1>
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
                              <button class="btn btn-danger btn-xs" id="print"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>

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
                                                              
                                                              <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder(<?= $vente->ID?>)" style="cursor:pointer;"> <i class="glyphicon glyphicon-save"></i> Paiement</a></li>

                                                              <li><a type="button" onclick="printOrder(<?= $vente->ID?>)" style="cursor:pointer;"> <i class="glyphicon glyphicon-print"></i> Imprimer </a></li>
                                                                     
                                                            </ul>
                                                          </div>
                                                        </td>
                                                    </tr>
                                                    <?php $cnt++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                      </td>
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
      <script type="text/javascript" src="Public/ajax/orderm.js"></script>
      <!-- ./wrapper -->

</body>

<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });

  //imprimer

  $(document).on("click", "#print", function(event) {
    event.preventDefault();
    $.ajax({
      url: 'Public/script/printVm.php',
      type: 'post',
      data: {},
      dataType: 'text',
      success: function(response) {
        var mywindow = window.open('', 'Atlas', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Atlas - Vente</title>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.resizeTo(screen.width, screen.height);
        setTimeout(function() {
          mywindow.print();
          mywindow.close();
        }, 1250);

        //mywindow.print();
        //mywindow.close();

      } // /success function
    }); // /ajax function to fetch the printable order
  });

// remove order from server
function removeOrder(orderId = null) {
	if (orderId) {
		$("#removeOrderBtn").unbind('click').bind('click', function () {
			$("#removeOrderBtn").button('loading');

			$.ajax({
				url: 'Public/script/removeOrder.php',
				type: 'post',
				data: { orderId: orderId },
				dataType: 'json',
				success: function (response) {
					$("#removeOrderBtn").button('reset');

					if (response.success == true) {

						// hide modal
						$("#removeOrderModal").modal('hide');
						// success messages
						$("#success-messages").html('<div class="alert alert-success">' +
							'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
							'</div>');  
           window.location.href='https://atlas243.com/index.php?page=ventem';
  
					} else {
						// error messages
						$(".removeOrderMessages").html('<div class="alert alert-warning">' +
							'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
							'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function () {
							$(this).delay(3000).hide(10, function () {
								$(this).remove();
							});
						}); // /.alert	          
					} // /else

				} // /success
			});  // /ajax function to remove the order

		}); // /remove order button clicked


	} else {
		alert('error! refresh the page again');
	}
}
// /remove order from server
  // print order function
  function printOrder(orderId = null) {
    if (orderId) {

      $.ajax({
        url: 'Public/script/printOrderm.php',
        type: 'post',
        data: {
          orderId: orderId
        },
        dataType: 'text',
        success: function(response) {

          var mywindow = window.open('', 'Metropole', 'height=400,width=600');
          mywindow.document.write('<html><head><title>Facture</title>');
          mywindow.document.write('</head><body>');
          mywindow.document.write(response);
          mywindow.document.write('</body></html>');

          mywindow.document.close(); // necessary for IE >= 10
          mywindow.focus(); // necessary for IE >= 10
          mywindow.resizeTo(screen.width, screen.height);
          setTimeout(function() {
            mywindow.print();
            mywindow.close();
          }, 1250);

          //mywindow.print();
          //mywindow.close();

        } // /success function
      }); // /ajax function to fetch the printable order
    } // /if orderId
  }
</script>

<!-- remove order -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer cette vente</h4>
      </div>
      <div class="modal-body">

        <div class="removeOrderMessages"></div>

        <p>Voulez-vous vraiment supprimer cette vente ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove order-->

</html>