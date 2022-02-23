<?php $title = 'Tableau de bord';
include 'public/includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="public/Images/logo.png" type="image/x-icon">
  <meta name="description" content="Atlas">
  <meta name="author" content="SpaceLine">

  <!-- Bootstrap Core CSS -->
  <link href="plugins/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="plugins/css/metisMenu.min.css" rel="stylesheet">

  <!-- Timeline CSS -->
  <link href="plugins/css/timeline.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="plugins/css/startmin.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="plugins/css/morris.css" rel="stylesheet">

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
            <!-- /.col-lg-12 -->
          </div>
          <?php
          require_once('Model/Admin/connexion.php');
          $db = getConnection();
          $tdate = date('Y-m-d');
          $sql = "select sum(MTOTAL)  as TOTAL from tbl_vente WHERE DATEV='$tdate';";
          $req = $db->query($sql);
          $req->execute();
          $g = $req->fetch(PDO::FETCH_OBJ);
          $sum_today = $g->TOTAL;

          //NOMBRE D'ARTICLES
          $sql1 = "select count(ARTICLE)  as TOTAL from tbl_articles";
          $req1 = $db->query($sql1);
          $req1->execute();
          $g1 = $req1->fetch(PDO::FETCH_OBJ);
          $article = $g1->TOTAL;

          //NOMBRE PRODUITS EXPIRES          
          $drug_expiry_date = date("Y-m-d", strtotime(date("Y-m-d")));
          $query = $db->query("SELECT count(PEREMPTION) as EXPIRY FROM tbl_articles WHERE PEREMPTION < '$drug_expiry_date' AND DATECREAT !='0000-00-00'");
          $g2 = $query->fetch(PDO::FETCH_OBJ);
          $expiry = $g2->EXPIRY;

          //NOMBRE ARTICLES EPUISÉS
          $sql3 = "select count(ARTICLE)  as EPUISE from tbl_articles WHERE QTE='0' AND DATECREAT !='0000-00-00'";
          $req3 = $db->query($sql3);
          $req3->execute();
          $g3 = $req3->fetch(PDO::FETCH_OBJ);
          $epuise = $g3->EPUISE;

          //ARTICLES EPUISÉS
          $sql4 = "select * from tbl_articles WHERE QTE='0' AND DATECREAT !='0000-00-00' LIMIT 5";
          $req4 = $db->query($sql4);
          $req4->execute();
          $epuises = $req4->fetchAll(PDO::FETCH_OBJ);

          ?>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-money fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge"><?= $sum_today ?></div>
                      <div>Ventes Aujourd'hui</div>
                    </div>
                  </div>
                </div>
                <a href="index.php?page=caisse">
                  <div class="panel-footer">
                    <span class="pull-left">Voir plus</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="panel panel-green">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge"><?= $epuise ?></div>
                      <div>Epuisés</div>
                    </div>
                  </div>
                </div>
                <a href="index.php?page=epuise">
                  <div class="panel-footer">
                    <span class="pull-left">Voir toutes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="panel panel-yellow">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge"><?= $article ?></div>
                      <div>Articles</div>
                    </div>
                  </div>
                </div>
                <a href="index.php?page=articles">
                  <div class="panel-footer">
                    <span class="pull-left">Voir plus</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="panel panel-red">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-warning fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge"><?= $expiry ?></div>
                      <div>Expirés</div>
                    </div>
                  </div>
                </div>
                <a href="index.php?page=expired">
                  <div class="panel-footer">
                    <span class="pull-left">Voir toutes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-8">
              <!-- /.panel -->
              <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          Les 10 derniers vente
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                          <div class="table-responsive">
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Total</th>
                                  <th>Payé</th>
                                  <th>Reste</th>
                                  <th>Statut Paiement</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $cnt = 1;
                                foreach ($getVente as $vente) :  ?>
                                  <tr class="odd gradeX">
                                    <td align="center"><b>FACT000<?= $vente->ID ?></b></td>
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
                                  </tr>
                                <?php $cnt++;
                                endforeach ?>
                              </tbody>
                            </table>
                          </div>
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
          <!-- /.col-lg-8 -->
          <div class="col-lg-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Epuisés
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="list-group">
                  <?php foreach ($epuises as $e) : ?>
                    <a href="#" class="list-group-item">
                      <i class="fa fa-cart fa-fw"></i><b><?= $e->ARTICLE ?></b>
                      <span class="pull-right text-muted small"><em>Prix: <?= $e->PRIX ?></em>
                      </span>
                    </a>
                  <?php endforeach ?>
                </div>
                <!-- /.list-group -->
                <a href="index.php?page=expired" class="btn btn-default btn-block">Tous les produits expirés</a>
              </div>
              <!-- /.panel-body -->
            </div>
          </div>
          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

  </div>

  <!-- ./wrapper -->

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
</body>

</html>