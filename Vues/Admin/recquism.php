<?php $title = 'Recquisition Magasin';
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
                   if($type=="admin" OR $type="gestionnaire de dépôt"){ ?>
                         <li>
                <a href="#"><i class="fa fa-plus fa-fw"></i> Historique<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                <li>
                <a href="#"><i class="fa fa-plus fa-fw"></i> Historique<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                <li>
                      <a href="index.php?page=historicapp">Approvisionnement</a>
                  </li>
                  <li>
                      <a href="index.php?page=historicrecm">Récquisition Magasin</a>
                  </li>
                  <li>
                      <a href="index.php?page=historicreq">Récquisition Quincaillerie</a>
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

<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
       // getCategories();
       $("#formulaire").submit(function (event) {
        event.preventDefault();
        var aqte =  $("#aqte").val();
        var sqte =  $("#sqte").val();
        var qqte =  $("#qqte").val();
        var id = $("#id").val();
        $.ajax({
            url: "Public/script/recquism.php",
            method: "POST",
            data: {
                id:id,
                aqte: aqte,
                qqte: qqte,
                sqte: sqte
            },
            success: function (donnees) {
                $('#message').html(donnees).slideDown();
                $("#formulaire")[0].reset();
            }
        });
    });
  });
</script>

</html>