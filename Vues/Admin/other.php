<?php $title = 'Etat de la Caisse(Autres Entrées)';
include 'public/includes/header.php';
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
							$sql="select sum(MONTANT)  as TOTAL from tbl_other_entry WHERE DATE='$tdate';";
							$req=$db->query($sql);
							$req->execute();
							$g=$req->fetch(PDO::FETCH_OBJ);
							$sum_today = $g->TOTAL;
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
						$sql="select sum(MONTANT)  as TOTAL from tbl_other_entry WHERE DATE='$ydate';";
						$req=$db->query($sql);
						$req->execute();
						$g=$req->fetch(PDO::FETCH_OBJ);
						$sum_yesterday = $g->TOTAL;
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
					$query="select sum(MONTANT)  as TOTAL from tbl_other_entry  WHERE DATE between '$pastdate' and '$crrntdte'";
					$req=$db->query($query);
					$req->execute();
					$g=$req->fetch(PDO::FETCH_OBJ);
					$sum_weekly=$g->TOTAL;
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
				$sql="select sum(MONTANT)  as TOTAL from tbl_other_entry  WHERE DATE between '$monthdate' and '$crrntdte'";
				$req=$db->query($sql);
				$req->execute();
				$g=$req->fetch(PDO::FETCH_OBJ);
				$sum_monthly=$g->TOTAL;


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
					$query="select sum(MONTANT)  as TOTAL from tbl_other_entry  WHERE (year(DATE)='$cyear') ";
					$req=$db->query($query);
					$req->execute();
					$g=$req->fetch(PDO::FETCH_OBJ);
					$sum_yearly=$g->TOTAL;
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
				$query="select sum(MONTANT)  as TOTAL from tbl_other_entry";
				$req=$db->query($query);
					$req->execute();
					$g=$req->fetch(PDO::FETCH_OBJ);
					$sum_total=$g->TOTAL;
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