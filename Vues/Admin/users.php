<?php $title = 'Utilisateur';
$users=$user->getUsers();
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
                                                          class='btn btn-success btn-sm view_data'  id='<?=$user->ID?>' title='Modification'>
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
            <!-- <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title text-center">Editer un Utilisateur</h4>  
                </div>  
                <div class="modal-body" id="user_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> -->

            <?php 
            
            include_once 'Public/modals/adduser.php';
            include_once 'Public/modals/edituser.php';

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
            if (confirm("Voulez-vous activer cet utilisateur? ")) {
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
          if (confirm("Voulez-vous desactiver cet utilisateur ? ")) {
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


         
//view client view befor edit
$('.view_data').click(function(){  
  var Id = $(this).attr("id");  
$.ajax({  
  url:"Public/script/viewuserbeforedit.php",  
  method:"post",  
  data:{Id:Id},  
  success:function(data){  
 $('#user_detail').html(data);  
 $('#dataModal').modal("show");  
//  getUser();
}  
});  
});
  //formB
  $(document).on('click','.submitb',function(){
    $.ajax({
            url:"Public/script/edituser.php",
            type:"post",
            data:$("#formedit").serialize(),
            success:function(data){
            $("#messages").html(data).slideDown();
            $("#dataModal").modal('hide');
            // getUser();
            }
   
    });
    return false;
}); 

                 
});
</script>