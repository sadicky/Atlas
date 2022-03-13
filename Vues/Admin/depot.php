<?php $title = 'Dépôt'; ?>
<!DOCTYPE html>
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
                        <!-- /.col-lg-12 -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="messages"></div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                   Liste des articles disponibles au <?= $title ?>
                        <div class="pull-right"> 
                            <button class="btn btn-danger btn-xs" id="print"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button> 
                            
                          
                            
                        </div>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                     <tr>
                                                     <?php 
                                                      if(isset($_SESSION['TYPE'])){
                                                        $type=$_SESSION['TYPE'];
                                                        if ($type=="admin") { ?>
                                                        <th>#</th>
                                                        <th>Articles</th>
                                                        <th>Stock Disponible</th>
                                                        <th>Prix</th>
                                                        <th>Montant</th>
                                                        <th>Approvisionner</th>
                                                        <th>Actions</th>  
                                                                
                                                         <?php   }elseif($type=="gestionnaire de dépôt"){ ?>
                                                        <th>#</th>
                                                        <th>Articles</th>
                                                        <th>Stock Disponible</th>
                                                        <th>Prix</th>
                                                        <th>Montant</th>
                                                        <th>Approvisionner</th>
                                                           <?php }
                                                         }

                                                         ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                      if(isset($_SESSION['TYPE'])){
                                                        $type=$_SESSION['TYPE'];
                                                        if ($type=="admin") { ?>
                                                         <?php $cnt=1; foreach($getStock as $cat):?>
                                                    <tr class="odd gradeX">
                                                        <td><?=$cnt?></td>
                                                        <td><b><?=$cat->ARTICLE?></b></td>
                                                        <td><?=$cat->QTE?></td>
                                                        <td><?=$cat->PRIX?></td>
                                                        <td><?=$cat->PRIX*$cat->QTE?></td>
                                                        <td class="center">
                                                            <a href='index.php?page=approv&id=<?=$cat->ID?>'type='submit'  class='btn btn-xs btn-primary approv' title='Approvisionner'><i class='fa fa-cart-plus'></i> Approvisionner</a>
                                                         </td>
                                                        <td class="center">
                                                         <button 
                                                          class='btn btn-info btn-xs btn-block view_datas' 
                                                          id="<?=$cat->ID?>" title='Modification'>
                                                          <span class='glyphicon glyphicon-edit'></span>
                                                          </button>

                                                        </td>
                                                    </tr>
                                                    <?php $cnt++; endforeach ?>
                                                                
                                                         <?php   }elseif($type=="gestionnaire de dépôt"){ ?>
                                                           <?php $cnt=1; foreach($getStock as $cat):?>
                                                    <tr class="odd gradeX">
                                                        <td><?=$cnt?></td>
                                                        <td><b><?=$cat->ARTICLE?></b></td>
                                                        <td><?=$cat->QTE?></td>
                                                        <td><?=$cat->PRIX?></td>
                                                        <td><?=$cat->PRIX*$cat->QTE?></td>
                                                        <td class="center">
                                                            <a href='index.php?page=approv&id=<?=$cat->ID?>'type='submit'  class='btn btn-xs btn-primary approv' title='Approvisionner'><i class='fa fa-cart-plus'></i> Approvisionner</a>
                                                         </td>
                                                        
                                                    </tr>
                                                    <?php $cnt++; endforeach ?>
                                                           <?php }
                                                         }

                                                         ?>

                                                    
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

<?php
include_once 'Public/modals/addrec.php';
include_once 'Public/modals/editstock.php';
?>

<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({responsive: true});

$(document).on('click', '.approv', function(){
        var id = $(this).attr("id");
        var btn_action = 'fetch_single';
        $.ajax({
         url:"Public/script/approv.php",
         method:"POST",
         data:{id:id,},
         dataType:"json",
         success:function(data)
         {
          $('#article').val(data.ARTICLE);
          $('#category_id').val(category_id);
          $('#category_id').val(category_id);
          $('#action').val('Edit');
          $('#btn_action').val("Edit");
         }
        })
       });

$('.view_datas').click(function(){  
  var Id = $(this).attr("id");  
$.ajax({  
  url:"Public/script/viewstock.php",  
  method:"post",  
  data:{Id:Id},  
  success:function(data){  
 $('#stock_detail').html(data);  
 $('#stockModal').modal("show");  

}  
});  
});
//
$(document).on('click','.submitb',function(){
    $.ajax({
            url:"Public/script/editstock.php",
            type:"post",
            data:$("#formstock").serialize(),
            success:function(data){
            $("#messages").html(data).slideDown();
            $("#stockModal").modal('hide');
            
            }
   
});
    return false;
}); 


          //imprimer
             
          $(document).on("click", "#print", function (event) {
          event.preventDefault();
      $.ajax({
        url: 'Public/script/printAppr.php',
        type: 'post',
        data: {},
        dataType: 'text',
        success: function(response) {
          var mywindow = window.open('', 'Atlas', 'height=400,width=600');
          mywindow.document.write('<html><head><title>Approvisionnements</title>');
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
       

});
</script>