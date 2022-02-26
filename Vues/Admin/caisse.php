<?php $title = 'Etat de la Caisse';
?>
<style>
.easypiechart {
  position: relative;
  text-align: center;
  width: 120px;
  height: 120px;
  margin: 20px auto 10px auto; }

.easypiechart .percent {
  display: block;
  position: absolute;
  font-size: 26px;
  top: 38px;
  width: 120px; }

#easypiechart-blue .percent {
  color: #30a5ff; }

#easypiechart-teal .percent {
  color: #1ebfae; }

#easypiechart-orange .percent {
  color: #ffb53e; }

#easypiechart-red .percent {
  color: #ef4040; }

</style>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Inventory Management System">
     <link rel="shortcut icon" href="public/Images/logo.png" type="image/x-icon"> 
        <meta name="author" content="SpaceLine">

        <title><?=$title?></title>

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

        <!-- Timeline CSS -->
        <link href="plugins/css/timeline.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="plugins/css/morris.css" rel="stylesheet">        

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
                <a href="index.php?page=historicapp">Historique d'approvisionnement</a>
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
              <h1 class="page-header"><?=$title?></h1>
            </div>
            <!-- /.col-lg-12 -->
			<div class="row">
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<?php
							//Today Expense
							// $userid = $_SESSION['detsuid'];
							require_once('Model/Admin/connexion.php');
							$db = getConnection();
							$tdate = date('Y-m-d');
							$sql="select sum(MTOTAL)  as TOTAL from tbl_vente WHERE DATEV='$tdate';";
							$req=$db->query($sql);
							$req->execute();
							$g=$req->fetch(PDO::FETCH_OBJ);
							$sum_today = $g->TOTAL;

							//AUTRES ENTREE
							$sqlo="select sum(MONTANT)  as TOTAL from tbl_other_entry WHERE DATE='$tdate';";
							$reqo=$db->query($sqlo);
							$reqo->execute();
							$go=$reqo->fetch(PDO::FETCH_OBJ);
							$sum_todayo = $go->TOTAL;

							//getDepense
							$sql1="select sum(MONTANT)  as TOTAL from tbl_depenses WHERE DATE='$tdate';";
							$req1=$db->query($sql1);
							$req1->execute();
							$g1=$req1->fetch(PDO::FETCH_OBJ);
							$sum_today1 = $g1->TOTAL;

							
							$sum_today += $sum_todayo - $sum_today1;
							?>

							<h4 align="center">Aujourd'hui</h4>
							<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today; ?>">
							<span class="percent">
								<?php if ($sum_today == "") {
											echo "0";
											} else {
											echo $sum_today.'$';
										}
								?></span>
								</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
						$ydate = date('Y-m-d', strtotime("-1 days"));
						$sql="select sum(MTOTAL)  as TOTAL from tbl_vente WHERE DATEV='$ydate';";
						$req=$db->query($sql);
						$req->execute();
						$g=$req->fetch(PDO::FETCH_OBJ);
						$sum_yesterday = $g->TOTAL;

						//Autres
						$sqlo="select sum(MONTANT)  as TOTAL from tbl_other_entry WHERE DATE='$ydate';";
						$reqo=$db->query($sqlo);
						$reqo->execute();
						$go=$reqo->fetch(PDO::FETCH_OBJ);
						$sum_yesterdayo = $go->TOTAL;
						
						//depense
						$sql1="select sum(MONTANT)  as TOTAL from tbl_depenses WHERE DATE='$ydate';";
						$req1=$db->query($sql1);
						$req1->execute();
						$g1=$req1->fetch(PDO::FETCH_OBJ);
						$sum_yesterday1 = $g1->TOTAL;

						$sum_yesterdayo += $sum_yesterday - $sum_yesterday1;
						?>
						<div class="panel-body easypiechart-panel">
							<h4 align="center">Hier</h4>
							<div class="easypiechart" id="easypiechart-orange" data-percent="<?=$sum_yesterday; ?>">
							<span class="percent">
								<?php if ($sum_yesterday == "") {
											echo "0";
											} else {
											echo $sum_yesterday.'$';
										}
								?></span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
					//Weekly
					$pastdate=  date("Y-m-d", strtotime("-1 week")); 
					$crrntdte=date("Y-m-d");
					$query="select sum(MTOTAL)  as TOTAL from tbl_vente WHERE DATEV between '$pastdate' and '$crrntdte'";
					$req=$db->query($query);
					$req->execute();
					$g=$req->fetch(PDO::FETCH_OBJ);
					$sum_weekly=$g->TOTAL;

					//autres	
					$sqlo="select sum(MONTANT)  as TOTAL from tbl_other_entry  WHERE DATE between '$pastdate' and '$crrntdte'";
					$reqo=$db->query($sqlo);
					$reqo->execute();
					$go=$reqo->fetch(PDO::FETCH_OBJ);
					$sum_weeklyo = $go->TOTAL;
					
					//getDepense
					$query1="select sum(MONTANT)  as TOTAL from tbl_depenses  WHERE DATE between '$pastdate' and '$crrntdte'";
					$req1=$db->query($sql1);
					$req1->execute();
					$g1=$req1->fetch(PDO::FETCH_OBJ);
					$sum_weekly1=$g1->TOTAL;

					$sum_weekly += $sum_weeklyo - $sum_weekly1;
					?>
					<div class="panel-body easypiechart-panel">
						<h4 align="center">Après 7 Jours</h4>
							<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly;?>"><span class="percent">
								<?php if($sum_weekly==""){
									echo "0";
									} else {
									echo $sum_weekly,'$';
									}
									?></span></div>
													</div>
				</div>
				</div>
				<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
				//Monthly 
				$monthdate=  date("Y-m-d", strtotime("-1 month")); 
				$crrntdte=date("Y-m-d");
				$sql="select sum(MTOTAL)  as TOTAL from tbl_vente WHERE DATEV between '$monthdate' and '$crrntdte'";
				$req=$db->query($sql);
				$req->execute();
				$g=$req->fetch(PDO::FETCH_OBJ);
				$sum_monthly=$g->TOTAL;

				//autres entrees
				$sqlo="select sum(MONTANT)  as TOTAL from tbl_other_entry  WHERE DATE between '$monthdate' and '$crrntdte'";
				$reqo=$db->query($sqlo);
					$reqo->execute();
					$go=$reqo->fetch(PDO::FETCH_OBJ);
					$sum_monthlyo = $go->TOTAL;

					//depense
					$sql1="select sum(MONTANT)  as TOTAL from tbl_depenses  WHERE DATE between '$monthdate' and '$crrntdte'";
				$req1=$db->query($sql1);
				$req1->execute();
				$g1=$req1->fetch(PDO::FETCH_OBJ);
				$sum_monthly1=$g1->TOTAL;
					$sum_monthly +=$sum_monthlyo - $sum_monthly1;

				?>
				<div class="panel-body easypiechart-panel">
					<h4 align="center">Mensuel</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly;?>" ><span class="percent">
							<?php if($sum_monthly==""){
								echo "0$";
							} else {
								echo $sum_monthly.'$';
							}
					?>
					</span></div>
					</div>
				</div>
				</div>

			</div>
			
		<div class="row">
			<div class="col-xs-6 col-md-6">
				<div class="panel panel-default">
					<?php
					//Yearly 
					$cyear= date("Y");
					$query="select sum(MTOTAL)  as TOTAL from tbl_vente WHERE (year(DATEV)='$cyear') ";
					$req=$db->query($query);
					$req->execute();
					$g=$req->fetch(PDO::FETCH_OBJ);
					$sum_yearly=$g->TOTAL;

					//autres
					$sqlo="select sum(MONTANT)  as TOTAL from tbl_other_entry  WHERE (year(DATE)='$cyear') ";
					$reqo=$db->query($sqlo);
					$reqo->execute();
					$go=$reqo->fetch(PDO::FETCH_OBJ);
					$sum_yearlyo = $go->TOTAL;
					
					//depenses					
					$query1="select sum(MONTANT)  as TOTAL from tbl_depenses  WHERE (year(DATE)='$cyear') ";
					$req1=$db->query($sql1);
					$req1->execute();
					$g1=$req1->fetch(PDO::FETCH_OBJ);
					$sum_yearly1=$g1->TOTAL;

					$sum_yearly +=$sum_yearlyo - $sum_yearly1;
					?>
					<div class="panel-body easypiechart-panel">
						<h4 align="center">Annuel</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yearly;?>" ><span class="percent">
							<?php if($sum_yearly==""){
							echo "<h1>0</h1>";
							} else {
							echo "<h2>".$sum_yearly." $</h2>";
							}

						?></span></div>


					</div>
				
				</div>

			</div>

<div class="col-xs-6 col-md-6">
		<div class="panel panel-default">
			<?php
				//Yearly Expense
				$query="select sum(MTOTAL)  as TOTAL from tbl_vente";
				$req=$db->query($query);
					$req->execute();
					$g=$req->fetch(PDO::FETCH_OBJ);
					$sum_total=$g->TOTAL;

					//autres entrees
				$queryo="select sum(MONTANT)  as TOTAL from tbl_other_entry";
					$reqo=$db->query($queryo);
					$reqo->execute();
					$go=$reqo->fetch(PDO::FETCH_OBJ);
					$sum_totalo=$go->TOTAL;
					
					//depenses
				$query1="select sum(MONTANT)  as TOTAL from tbl_other_entry";
				$req1=$db->query($query1);
					$req1->execute();
					$g1=$req1->fetch(PDO::FETCH_OBJ);
					$sum_total1=$g1->TOTAL;

					$sum_total +=$sum_totalo - $sum_total1;
					 ?>
			<div class="panel-body easypiechart-panel">
				<h4 align="center">Total </h4>
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_total;?>" ><span class="percent">
					<?php if($sum_total==""){
							echo "<h1>0</h1>";
						} else {
						echo "<h2>".$sum_total." $</h2>";
						}

			?></span>
			</div>


			</div>
		
		</div>

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
            <script src="plugins/js/chart.min.js"></script>
	<script src="plugins/js/chart-data.js"></script>
	<script src="plugins/js/easypiechart.js"></script>
	<script src="plugins/js/easypiechart-data.js"></script>
	<script src="plugins/js/bootstrap-datepicker.js"></script>
	<script src="plugins/js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
 </script>
  <!-- ./wrapper -->

</body>
</html>