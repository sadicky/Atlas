<?php $title = 'Profil';
$db=getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and touch icons -->
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
            include 'public/includes/navbar.php';
            ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?= $title ?></h1>
                        </div>                        
                     <div class='col-sm-12' id="message"></div> 
                     <div id="messages"></div>    
                        <!-- /.col-lg-12 -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Profil
                                        
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div id="messages">
                                            
                                        </div>
                                      <div>
                                          <div class="col-lg-8">
                                              <?php 
                                      if ($_SESSION['ID']) { ?>
                                         <form method="POST" class="form" id="formprofile">
                                           <input type="hidden" name="id" class="form-control" value="<?=$_SESSION['ID'] ?>">
                                           <div class="form-group">
                                               <label>NOM</label>
                                               <input type="text" name="name" id="name" class="form-control" value="<?=$_SESSION['NAME'] ?>" >
                                           </div> 
                                           <div class="form-group">
                                               <label>ADRESSE MAIL</label>
                                               <input type="email" name="email" id="email" class="form-control" value="<?=$_SESSION['EMAIL'] ?>" >
                                           </div> 
                                           <div class="form-group">
                                               <label>FONCTION</label>
                                               <input  readonly class="form-control" value="<?=$_SESSION['TYPE'] ?>" >
                                           </div> 
                                            <div>
                                                <button type="submit" class="btn btn-info submitb">Valider</button>
                                            </div>
                                        </form>
                                       <?php  }
                                         ?>
                                          </div>
                                          <div class="col-lg-4">
                                              <div class="panel panel-default">
                                                <div class="panel-heading">Editer le mot de passe</div>
                                                  <div class="panel-body">
                                                     <form>
                                                         <div class="form-group">
                                                         <label>Ancien mot de passe</label>
                                                          <input type="text" name="name" id="name" class="form-control" required>
                                                         </div>
                                                         <div class="form-group">
                                                         <label>Nouveau mot de passe</label>
                                                          <input type="text" name="name" id="name" class="form-control" required>
                                                         </div>
                                                         <button type="submit" class="btn btn-info">Enregistrer</button>
                                                     </form> 
                                                  </div>
                                              </div>
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


</body>

</html>
<script>
$(document).ready(function() {
 $('#dataTables-example').DataTable({responsive: true});

$(document).on('click','.submitb',function(){
    $.ajax({
            url:"Public/script/editprofile.php",
            type:"post",
            data:$("#formprofile").serialize(),
            success:function(data){
            $("#messages").html(data).slideDown();
            }
   
});
    return false;
});
});
 </script>