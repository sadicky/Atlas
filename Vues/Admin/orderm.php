<?php
ini_set('display_errors', 1);
$title = 'Vente - Magasin';
require_once 'Model/Admin/connexion.php';
$connect = getConnection();


if($_GET['o'] == 'add') { 
  // add order
    echo "<div class='div-request div-hide'></div>";
  } else if($_GET['o'] == 'manord') { 
    echo "<div class='div-request div-hide'>manord</div>";
  } else if($_GET['o'] == 'editOrd') { 
    echo "<div class='div-request div-hide'>editOrd</div>";
  } // /else manage order
  
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="public/Images/logo.png" type="image/x-icon">
    <meta name="description" content="">
    <meta name="author" content="">

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
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">

              <i class="glyphicon glyphicon-plus-sign"></i> Ajouter

            </div>
            <!--/panel-->
            <div class="panel-body">

              <?php if ($_GET['o'] == 'add') { ?>

                <div class="success-messages"></div>
                <!--/success-messages-->

                <form class="form-horizontal" method="POST" action="public/script/createOrderm.php" id="createOrderForm">

                  <div class="form-group">
                    <label for="orderDate" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="datev" name="datev" autocomplete="off" />
                    </div>
                  </div>
                  <!--/form-group-->
                  <div class="form-group">
                    <label for="clientName" class="col-sm-2 control-label">Client</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="client" name="client" placeholder="Nom du Client" autocomplete="off" />
                    </div>
                  </div>
                  <!--/form-group-->
                  <div class="form-group">
                    <label for="clientContact" class="col-sm-2 control-label">Téléphone du client</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tel" name="tel" placeholder="Numero du client" autocomplete="off" />
                    </div>
                  </div>
                  <!--/form-group-->

                  <table class="table" id="productTable">
                    <thead>
                      <tr>
                        <th style="width:40%;">Produit</th>
                        <th style="width:20%;">Prix</th>
                        <th style="width:10%;">Stock</th>
                        <th style="width:15%;">Quantité <br></th>
                        <th style="width:25%;">Total</th>
                        <th style="width:10%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $productSql = "SELECT * FROM tbl_stockm WHERE  STATUT = '1' AND QTE > '0'";
                      $productData = $connect->prepare($productSql);
                      $productData->execute();
                      $data = $productData->fetchAll(PDO::FETCH_ASSOC);
                      // var_dump($row);	
                      $arrayNumber = 0;
                      for ($x = 1; $x < 2; $x++) { ?>
                        <tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">
                          <td style="margin-left:20px;">
                            <div class="form-group">
                              <select class="form-control" name="article[]" id="article<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)">
                                <option value="">Choisir un article</option>
                                <?php
                                foreach ($data as $row) {
                                  echo "<option value='" . $row['ID'] . "' id='changeProduct" . $row['ID'] . "'>" . $row['ARTICLE'] . "</option>";
                                } // /while 

                                ?>
                              </select>
                            </div>
                            </td>
                          <td style="padding-left:20px;">			  					
                            <input type="text" name="rate[]" id="rate<?=$x?>" autocomplete="off" disabled="true" class="form-control" />			  					
                            <input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
                          </td>
                          <td style="padding-left:20px;">
                            <div class="form-group">
                              <p id="stockD<?= $x; ?>"></p>
                            </div>
                          </td>
                          <td style="padding-left:20px;">
                            <div class="form-group">
                              <input type="number" name="qte[]" id="qte<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
                            </div>
                          </td>
                          <td style="padding-left:20px;">
                            <input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />
                            <input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />
                          </td>
                          <td>

                            <button class="btn btn-danger removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                          </td>
                        </tr>
                      <?php
                        $arrayNumber++;
                      } // /for
                      ?>
                    </tbody>
                  </table>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="paid" class="col-sm-3 control-label"> Montant payé</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" />
                      </div>
                    </div>
                    <!--/form-group-->
                    <div class="form-group">
                      <label for="due" class="col-sm-3 control-label">Montant dû</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="due" name="due" disabled="true" />
                        <input type="hidden" class="form-control" id="dueValue" name="dueValue" />
                      </div>
                    </div>
                    <!--/form-group-->
                    <div class="form-group">
                      <label for="totalAmount" class="col-sm-3 control-label">Montant Total</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true" />
                        <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
                      </div>
                    </div>
                  </div>
                  <!--/col-md-6-->

                  <div class="col-md-6">
                    <!--/form-group-->
                    <div class="form-group">
                      <label for="clientContact" class="col-sm-3 control-label">Type du Paiment </label>
                      <div class="col-sm-9">
                        <select class="form-control" name="paymentType" id="paymentType">
                          <option value="">~~SELECT~~</option>
                          <option value="Cheque">Cheque</option>
                          <option value="Cash">Cash</option>
                          <option value="CC">Credit Card</option>
                        </select>
                      </div>
                    </div>
                    <!--/form-group-->
                    <div class="form-group">
                      <label for="clientContact" class="col-sm-3 control-label">Statut du Paiement</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="paymentStatus" id="paymentStatus">
                          <option value="">~~SELECT~~</option>
                          <option value="totalite">Totalité</option>
                          <option value="partiel">Acompte(Partiel)</option>
                          <option value="dette">Dette</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!--/col-md-6-->


                  <div class="form-group submitButtonFooter">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" class="btn btn-primary" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Ajouter une ligne </button>

                      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>

                      <button type="reset" class="btn btn-danger" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Réinitialiser</button>
                    </div>
                  </div>
                </form>

            </div>
            <!--/panel-->
          </div>
          <!--/panel-->
        <?php } ?>
        </div>
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

<script type="text/javascript" src="public/ajax/orderm.js"></script>
</body>

</html>