<?php $title = 'Articles';
$arts = $art->getArticlesId();
 ?>
<!DOCTYPE html>
<html lang="en">

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
                                        Les Articles
                        <div class="pull-right"> 
                              <?php
                                            if (isset($_SESSION['TYPE'])) {
                                             $type = $_SESSION['TYPE'];
                                             if ($type=="admin") { ?>
                                                 <button data-toggle="modal" data-target="#ajoutart"  class="btn btn-primary btn-xs"><i class="fa fa-plus fa-fw"></i> Nouvel</button>
                                        <?php     }
                                            }
                                             ?>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-file-pdf-o fa-fw"></i> Imprimer PDF</button>
                            
                           
                        </div>
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                            <?php
                                            if (isset($_SESSION['TYPE'])) {
                                             $type = $_SESSION['TYPE'];
                                             if ($type=="admin") { ?>
                                                 <th>#</th>
                                                        <th>Articles</th>
                                                        <th>Catégories</th>
                                                        <th>Prix</th>
                                                        <th>Quantité</th>
                                                        <th>Peremption</th>
                                                        <th>Etat</th>
                                                        <th>Activ/Desact</th>
                                                        <th>Actions</th>
                                        <?php     }else{ ?>
                                                        <th>#</th>
                                                        <th>Articles</th>
                                                        <th>Catégories</th>
                                                        <th>Prix</th>
                                                        <th>Quantité</th>
                                                        <th>Peremption</th>
                                       <?php }
                                            }
                                             ?>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php
                                            if (isset($_SESSION['TYPE'])) {
                                             $type = $_SESSION['TYPE'];
                                             if ($type=="admin") { ?>
                                                  <?php $cnt=1; foreach($arts as $cat):?>
                                                    <tr class="odd gradeX">
                                                        <td><?=$cnt?></td>
                                                        <td><b><?=$cat->ARTICLE?></b></td>
                                                        <td><?=$cat->CATEGORIE?></td>
                                                        <td><?=$cat->PRIX?></td>
                                                        <td><?=$cat->QTE?></td>
                                                        <td><?=$cat->PEREMPTION?></td>
                                                        <?php
                                                            if ($cat->STATUT == 0) {
                                                                echo "<td> <span class='label label-danger'> Desactiver</span></td>";
                                                            } else {
                                                                echo "<td> <span class='label label-info'> Activer</span></td>";
                                                            }
                                                            if ($cat->STATUT == 0) {
                                                                echo "<td><button type='button'  id='" . $cat->ID . "' name='activer' class='btn btn-xs btn-default activer' ><span class='glyphicon glyphicon-ok' ></span> Activer?</button></td>";
                                                            } else {
                                                                echo "<td>  <button type='button'  id='" . $cat->ID . "' name='desactiver' class='btn btn-xs btn-default desactiver'><span class='glyphicon glyphicon-remove' ></span> Desactiver?</button>
                                                            </td>";
                                                            }
                                                            ?>
                                                        <td class="center">
                                                        <button 
                                                          class='btn btn-info btn-xs btn-block view_data' 
                                                          id="<?=$cat->ID?>" title='Modification'>
                                                          <span class='glyphicon glyphicon-edit'></span>
                                                          </button>

                                                        </td>
                                                    </tr>
                                                    <?php $cnt++; endforeach ?>
                                        <?php     }else{ ?>
                                                    <?php $cnt=1; foreach($arts as $cat):?>
                                                    <tr class="odd gradeX">
                                                        <td><?=$cnt?></td>
                                                        <td><b><?=$cat->ARTICLE?></b></td>
                                                        <td><?=$cat->CATEGORIE?></td>
                                                        <td><?=$cat->PRIX?></td>
                                                        <td><?=$cat->QTE?></td>
                                                        <td><?=$cat->PEREMPTION?></td>
                                                    </tr>
                                                    <?php $cnt++; endforeach ?>
                                      <?php  }
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


    <?php
        include_once 'Public/modals/addart.php';
        include_once 'Public/modals/editart.php';
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

            <!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script type="text/javascript" src="Public/ajax/article.js"></script>
            
</body>

</html>
<script>
$(document).ready(function() {
  $('#dataTables-example').DataTable({responsive: true });

$('.view_data').click(function(){  
  var Id = $(this).attr("id");  
$.ajax({  
  url:"Public/script/viewartbeforedit.php",  
  method:"post",  
  data:{Id:Id},  
  success:function(data){  
 $('#art_detail').html(data);  
 $('#artModal').modal("show");  
//  getUser();  formeditart
}  
});  
});
//
$(document).on('click','.submitb',function(){
    $.ajax({
            url:"Public/script/editart.php",
            type:"post",
            data:$("#formeditart").serialize(),
            success:function(data){
            $("#messages").html(data).slideDown();
            $("#artModal").modal('hide');
            // getUser();
            }
   
    });
    return false;
});

//
$(document).on("click", ".desactiver", function (event) {
        event.preventDefault();
          var id = $(this).attr("id");
          if (confirm("Voulez-vous desactiver cet article ? ")) {
            $.ajax({
              url: "Public/script/desactivart.php",
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
       
        $(document).on("click", ".activer", function (event) {
          event.preventDefault();
            var id = $(this).attr("id");
            if (confirm("Voulez-vous activer cet article? ")) {
              $.ajax({
                url: "Public/script/activart.php",
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