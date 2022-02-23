<?php $title = 'Inventaire Vente';
?>
<html lang="en">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" href="public/Images/logo.png" type="image/x-icon"> 
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
                <a href="index.php?page=stock_quincailleries">Quincaillerie</a>
              </li>
             <?php  }
               ?>
              <?php 
              if ($type=="magasinier" OR $type=="admin") { ?>
                <li>
                <a href="index.php?page=stock_magasin">Magasin</a>
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
                  <a href="index.php?page=vente">Quincaillerie</a>
              </li>
             <?php  }
               ?>
              <?php 
              if ($type=="magasinier" OR $type=="admin") { ?>
                <li>
                <a href="index.php?page=ventem">Magasin</a>
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
               if($type=="admin"){ ?>
                <li>
            <a href="#"><i class="fa fa-plus fa-fw"></i> Historique</a>
          
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
                        <div class='col-sm-12' id="message"></div>
                        <!-- /.col-lg-12 -->
                        <div class="row">
                            <div class="col-lg-12">
                                
                            <form action="index.php?page=inventory" class="form-inline pull-right" method="post">
                                        <button type="submit" class="btn btn-link" name="tous">Afficher tous</button>
                                 </form>
                                <form role="form" method="post" class="form-inline" action="index.php?page=inventory">
                                    <div class="form-group">
                                        <label>Du</label>
                                        <input class="form-control" type="date" id="fromdate" name="fromdate" required="true">
                                    </div>
                                    <div class="form-group">
                                        <label>Au</label>
                                        <input class="form-control" type="date" id="todate" name="todate" required="true">
                                    </div>

                                    <div class="form-group has-success">
                                        <button type="submit" class="btn btn-primary" name="submit">Rechercher</button>
                                    </div>

                                    </form>
                                    

                            </div>
                            <?php if (isset($_POST['submit'])) : ?>
                                <div class="col-lg-12" style="padding-top:10px;">

                                    <?php
                                    $fdate = $_POST['fromdate'];
                                    $tdate = $_POST['todate'];
                                    ?>
                                    

                                    <div class="panel panel-default">
                                        <div class="panel-heading" align="center" style="color:blue">Rapport de Vente du <?php echo $fdate ?> Au <?php echo $tdate ?>
                                        <div class="pull-right">
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
                                         </div>
                                    </div>
                                    
                                        <div class="panel-body">

                                            <div class="col-md-12">

                                                <hr />
                                                <div class="table-responsive">
                                                    <table id="dataTables-example" class="table table-bordered table table-striped table-condensed table-bordered table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
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
                                                            </tr>
                                                        </thead>
                                                        <?php

                                                        require_once('Model/Admin/connexion.php');
                                                        $db = getConnection();
                                                        $ret = $db->query("SELECT tbl_vente.ID AS ID,tbl_vente.CLIENT AS CLIENT,tbl_vente.MTOTAL AS MTOTAL,
                                                        tbl_vente.STATUTV AS STATUTV,tbl_vente.STATUT AS STATUT,tbl_vente.PAYE AS PAYE,tbl_vente.RESTE AS RESTE,tbl_vente.DATEV AS DATEV,tbl_users.NAME,tbl_vente.PTYPE FROM tbl_vente,tbl_users 
                                                        where (DATEV BETWEEN '$fdate' and '$tdate') ORDER BY ID DESC");
                                                        $cnt = 1;
                                                        $ventes = $ret->fetchAll(PDO::FETCH_OBJ);
                                                        foreach ($ventes as $vente) {
                                                        ?>

                                                            <tr class="odd gradeX">
                                                                <td align="center"><b>FACT000<?= $vente->ID ?></b></td>
                                                                <td><b><?= $vente->CLIENT ?></b></td>
                                                                <td><?= $vente->MTOTAL ?></td>
                                                                <td><?= $vente->PAYE ?></td>
                                                                <td><?= $vente->RESTE ?></td>
                                                                <td><?php // active 
                                                                    if ($vente->STATUTV == 'totalite') {
                                                                        echo "<label class='label label-success'>Totalité</label>";
                                                                    } else if ($vente->STATUTV == 'partiel') {
                                                                        echo "<label class='label label-info'>Partiel</label>";
                                                                    } else {
                                                                        echo "<label class='label label-danger'>No Payment</label>";
                                                                    } ?>
                                                                </td>
                                                                <td><?= $vente->STATUT ?></td>
                                                                <td><?= $vente->PTYPE ?></td>
                                                                <td><?= $vente->NAME ?></td>
                                                                <td class="center">
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Action <span class="caret"></span>
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="orders.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Modifier</a></li>

                                                                            <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder('.$orderId.')"> <i class="glyphicon glyphicon-save"></i> Paiement</a></li>

                                                                            <li><a type="button" onclick="printOrder(<?= $vente->ID ?>)"> <i class="glyphicon glyphicon-print"></i> Imprimer </a></li>

                                                                            <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $cnt = $cnt + 1;
                                                        } ?>

                                                    </table>
                                                </div>




                                            </div>
                                        </div>
                                    </div><!-- /.panel-->
                                </div>

                            <?php endif ?>
                            
                       

                            <?php if (isset($_POST['tous'])) : ?>
                                <div class="col-lg-12" style="padding-top:10px;">

                                    <div class="panel panel-default">
                                        <div class="panel-heading" align="center" style="color:blue">Rapport de Vente
                                        <div class="pull-right">
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
                                         </div>
                                    </div>
                                        <div class="panel-body">

                                            <div class="col-md-12">

                                                <hr />
                                                <div class="table-responsive">
                                                    <table id="dataTables-example" class="table table-bordered table table-striped table-condensed table-bordered table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
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
                                                            </tr>
                                                        </thead>
                                                        <?php

                                                        require_once('Model/Admin/connexion.php');
                                                        $db = getConnection();
                                                        $ret = $db->query("SELECT tbl_vente.ID AS ID,tbl_vente.CLIENT AS CLIENT,tbl_vente.MTOTAL AS MTOTAL,
                                                        tbl_vente.STATUTV AS STATUTV,tbl_vente.STATUT AS STATUT,tbl_vente.PAYE AS PAYE,tbl_vente.RESTE AS RESTE,tbl_vente.DATEV AS DATEV,tbl_users.NAME,tbl_vente.PTYPE FROM tbl_vente,tbl_users 
                                                         ORDER BY ID DESC");
                                                        $cnt = 1;
                                                        $ventes = $ret->fetchAll(PDO::FETCH_OBJ);
                                                        foreach ($ventes as $vente) {
                                                        ?>

                                                            <tr class="odd gradeX">
                                                                <td align="center"><b>FACT000<?= $vente->ID ?></b></td>
                                                                <td><b><?= $vente->CLIENT ?></b></td>
                                                                <td><?= $vente->MTOTAL ?></td>
                                                                <td><?= $vente->PAYE ?></td>
                                                                <td><?= $vente->RESTE ?></td>
                                                                <td><?php // active 
                                                                    if ($vente->STATUTV == 'totalite') {
                                                                        echo "<label class='label label-success'>Totalité</label>";
                                                                    } else if ($vente->STATUTV == 'partiel') {
                                                                        echo "<label class='label label-info'>Partiel</label>";
                                                                    } else {
                                                                        echo "<label class='label label-danger'>No Payment</label>";
                                                                    } ?>
                                                                </td>
                                                                <td><?= $vente->STATUT ?></td>
                                                                <td><?= $vente->PTYPE ?></td>
                                                                <td><?= $vente->NAME ?></td>
                                                                <td class="center">
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Action <span class="caret"></span>
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="orders.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Modifier</a></li>

                                                                            <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder('.$orderId.')"> <i class="glyphicon glyphicon-save"></i> Paiement</a></li>

                                                                            <li><a type="button" onclick="printOrder(<?= $vente->ID ?>)"> <i class="glyphicon glyphicon-print"></i> Imprimer </a></li>

                                                                            <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                            $cnt = $cnt + 1;
                                                        } ?>

                                                    </table>
                                                </div>




                                            </div>
                                        </div>
                                    </div><!-- /.panel-->
                                </div>

                            <?php endif ?>

                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>


        <?php

        include_once 'Public/modals/addart.php'; ?>

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
        <script type="text/javascript" src="public/ajax/article.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

</body>

</html>