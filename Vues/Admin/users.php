<?php $title = 'Utilisateur';
$users=$user->getUsers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="public/Images/logo.png" type="image/x-icon"> 
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title> 
    <!--  -->

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
            include 'public/includes/navbar.php';
            ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?= $title ?>
                                <?php 
                                  if (isset($_SESSION['TYPE'])) {
                                      echo $_SESSION['TYPE'];
                                  }
                                 ?>
                            </h1>
                        </div>
     				 <div class='col-sm-12' id="message"></div>	
                        <!-- /.col-lg-12 -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Les Utilisateurs
                        <div class="pull-right"> 
                            <button data-toggle="modal" data-target="#ajoutuser"  class="btn btn-primary btn-xs"><i class="fa fa-plus fa-fw"></i> Nouvel</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
                            
                        </div>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th><center>#</center></th>
                                                        <th><center>Username</center></th>
                                                        <th><center>Type</center></th>
                                                        <th><center>Email</center></th>
                                                        <th><center>Etat</center></th>
                                                        <th><center>Activer/Desactiver</center></th>
                                                        <th><center>Actions</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $cnt=1; foreach($users as $user):?>
                                                    <tr class="odd gradeX">
                                                        <td><?=$cnt?></td>
                                                        <td><b><?=$user->NAME?></b></td>
                                                        <td><?=$user->TYPE?></td>
                                                        <td><?=$user->EMAIL?></td>
                                                        <?php 
                                                        if ($user->STATUT == 0) {
                                                            echo "<td> <span class='label label-danger'> Desactiver</span></td>";
                                                        } else {
                                                            echo "<td> <span class='label label-info'> Activer</span></td>";
                                                        }
                                                        if($user->STATUT == 0){
                                                        echo "<td><button type='button'  id='".$user->ID."' name='activer' class='btn btn-xs btn-default activers'><span class='glyphicon glyphicon-ok' ></span> Activer?</button></td>";
                                                        } else {
                                                            echo "<td>	<button type='button'  id='".$user->ID."' name='desactiver' class='btn btn-xs btn-default desactivers'><span class='glyphicon glyphicon-remove' ></span> Desactiver?</button>
                                                            </td>";}?>
                                                        <td class="center">
                                                        <center>
                                                          <button 
                                                          class='btn btn-info btn-xs view_data' 
                                                          id="<?=$user->ID?>" title='Modification'>
                                                          <span class='glyphicon glyphicon-edit'></span>
                                                          </button>
                                                        </center>

                                                        </td>
                                                    </tr>
                                                    <?php $cnt++; endforeach ?>
                                                </tbody>
                                            </table>
                                            </table>
                                            <div id="messages"></div>
                                        </div>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>

                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /#page-wrapper -->

            </div>


            <?php 
            include_once 'Public/modals/edituser.php';
            include_once 'Public/modals/adduser.php';

            ?>



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
            

          

<script type="text/javascript" src="Public/ajax/user.js"></script>
</body>

</html>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({ responsive: true });
    
       
        $(document).on("click",".activers", function (event) {
          event.preventDefault();
            var id = $(this).attr("id");
            if (confirm("Voulez-vous activer cet article? ")) {
              $.ajax({
                url: "Public/script/activuser.php",
                method: "POST",
                data: {
                  id: id
                },
                success: function (data) {
                }
              });
            } else {
              return false;
            }
          });    

$(document).on("click",".desactivers", function (event) {
        event.preventDefault();
          var id = $(this).attr("id");
          if (confirm("Voulez-vous desactiver cet article ? ")) {
            $.ajax({
              url: "Public/script/desactivuser.php",
              method: "POST",
              data: {
                id: id
              },
              success: function (data) {
              }
            });
          } else {
            return false;
          }
        });
                 
});
</script>