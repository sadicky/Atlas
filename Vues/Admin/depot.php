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
            include 'public/includes/navbar.php';
            ?>

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

<script type="text/javascript" src="public/ajax/depot.js"></script>
<script>
$(document).ready(function() {
$('#dataTables-example').DataTable({responsive: true});

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

});
</script>