<?php
ini_set('display_errors', 1);
$title = 'Vente - Quincaillerie';
require_once 'Model/Admin/connexion.php';
$connect = getConnection();


if ($_GET['o'] == 'add') {
  // add order
  echo "<div class='div-request div-hide'></div>";
} else if ($_GET['o'] == 'manord') {
  echo "<div class='div-request div-hide'>manord</div>";
} else if ($_GET['o'] == 'editOrd') {
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
  <link rel="shortcut icon" href="Public/Images/logo.png" type="image/x-icon">
  <meta name="description" content="Atlas">
  <meta name="author" content="SpaceLine">

  <title><?= $title ?></title>

  <!-- Bootstrap Core CSS -->
  <link href="plugins/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="plugins/css/metisMenu.min.css" rel="stylesheet">

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
          <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-alerts">

              <li>
                <a href="#">
                  <div>
                    <i class="fa fa-tasks fa-fw"></i> New Task
                    <span class="pull-right text-muted small">4 minutes ago</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div>
                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                    <span class="pull-right text-muted small">4 minutes ago</span>
                  </div>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a class="text-center" href="#">
                  <strong>See All Alerts</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw"></i> AdminName <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="index.php?page=profil"><i class="fa fa-user fa-fw"></i> Profil</a>
              </li>
              <li><a href="index.php?page=parametre"><i class="fa fa-gear fa-fw"></i> Parametres</a>
              </li>
              <li><a href="index.php?page=parametre"><i class="fa fa-list fa-fw"></i> Historiques</a>
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
              <li>
                <a href="index.php?page=depot"><i class="fa fa-table fa-fw"></i> Dépot </a>

                <!-- /.nav-second-level -->
              </li>
              <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Recquisitionner<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="index.php?page=stock_quincailleries">Quincaillerie</a>
                  </li>
                  <li>
                    <a href="index.php?page=stock_magasin">Magasin</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
              <li>
                <a href="#"><i class="fa fa-money fa-fw"></i> Vente<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="index.php?page=vente">Quincaillerie</a>
                  </li>
                  <li>
                    <a href="index.php?page=ventem">Magasin</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
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
              <li>
                <a href="index.php?page=user"><i class="fa fa-user fa-fw"></i> Utilisateurs</a>

                <!-- /.nav-second-level -->
              </li>
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
              <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Rapports<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                  <li>
                    <a href="index.php?page=inventory">Inventaire</a>
                  </li>
                </ul>
                <!-- /.nav-second-level -->
              </li>
            </ul>
          </div>
        </div>
      </nav>

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

              <?php if ($_GET['o'] == 'add') : ?>

                <div class="success-messages"></div>
                <!--/success-messages-->

                <form class="form-horizontal" method="POST" action="Public/script/createOrder.php" id="createOrderForm">

                  <div class="form-group">
                    <label for="orderDate" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="datev" name="datev" autocomplete="off" required/>
                    </div>
                  </div>
                  <!--/form-group-->
                  <div class="form-group">
                    <label for="clientName" class="col-sm-2 control-label">Client</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="client" name="client" placeholder="Nom du Client" autocomplete="off" required/>
                    </div>
                  </div>
                  <!--/form-group-->
                  <div class="form-group">
                    <label for="clientContact" class="col-sm-2 control-label">Téléphone du client</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tel" name="tel" placeholder="Numero du client" autocomplete="off" required/>
                    </div>
                  </div>
                  <!--/form-group-->

                  <table class="table table-condensed" id="productTable">
                    <thead>
                      <tr>
                        <th style="width:40%;">Produit</th>
                        <th style="width:20%;">Prix</th>
                        <th style="width:10%;">Stock</th>
                        <th style="width:15%;">Quantité</th>
                        <th style="width:25%;">Total</th>
                        <th style="width:10%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $productSql = "SELECT * FROM tbl_stockq WHERE  STATUT = '1' AND QTE > '0'";
                      $productData = $connect->prepare($productSql);
                      $productData->execute();
                      $data = $productData->fetchAll(PDO::FETCH_ASSOC);
                      // var_dump($row);	
                      $arrayNumber = 0;
                      for ($x = 1; $x < 2; $x++) { ?>
                        <tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">
                          <td style="margin-left:20px;">
                            <div class="form-group">
                              <select class="form-control" required name="article[]" id="article<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)">
                                <option value="">Choisir un article</option>
                                <?php
                                foreach ($data as $row) {
                                  echo "<option value='" . $row['ID'] . "' id='changeProduct" . $row['ID'] . "'>" . $row['ARTICLE'] . "</option>";
                                } // /while 

                                ?>
                              </select>
                            </div>
                          </td>
                          <td style="padding-left:30px;">
                            <div class="form-group">
                              <input type="text" name="rate[]" id="rate<?= $x ?>" autocomplete="off" class="form-control" onkeyup="getTotal(<?php echo $x ?>)" />
                              <input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />
                            </div>
                          </td>
                          <td style="padding-left:20px;">
                            <p class="text-danger text-bold" id="stockD<?= $x; ?>"></p>
                          </td>
                          <td style="padding-left:20px;">
                            <div class="form-group">
                              <input type="number" name="qte[]" id="qte<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
                            </div>
                          </td>
                          <td style="padding-left:30px;">
                            <div class="form-group">
                              <input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />
                              <input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />
                            </div>
                          </td>
                          <td style="padding-left:30px;">
                            <div class="form-group">
                              <button class="btn btn-danger removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                            </div>
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
                        <input type="text" class="form-control" id="paid" name="paid" required autocomplete="off" onkeyup="paidAmount()" />
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
                        <select class="form-control" name="paymentType" id="paymentType" required>
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
                        <select class="form-control" required name="paymentStatus" id="paymentStatus">
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
        <?php endif ?>
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
</body>
<script>
  $(document).ready(function() {
    var divRequest = $(".div-request").text();

    if (divRequest == 'add') {

      // create order form function
      $("#createOrderForm").unbind('submit').bind('submit', function() {
        var form = $(this);
        $('.form-group').removeClass('has-error').removeClass('has-success');
        $('.text-danger').remove();

        var orderDate = $("#datev").val();
        var client = $("#client").val();
        var tel = $("#tel").val();
        var paid = $("#paid").val();
        var paymentType = $("#paymentType").val();
        var paymentStatus = $("#paymentStatus").val();

        // form validation 
        if (orderDate == "") {
          $("#orderDate").after('<p class="text-danger">Date de vente inexistante </p>');
          $('#orderDate').closest('.form-group').addClass('has-error');
        } else {
          $('#orderDate').closest('.form-group').addClass('has-success');
        } // /else

        if (client == "") {
          $("#client").after('<p class="text-danger"> Le nom du client est obligatoire </p>');
          $('#client').closest('.form-group').addClass('has-error');
        } else {
          $('#client').closest('.form-group').addClass('has-success');
        } // /else

        if (tel == "") {
          $("#tel").after('<p class="text-danger"> Le contact est obligatoire </p>');
          $('#tel').closest('.form-group').addClass('has-error');
        } else {
          $('#tel').closest('.form-group').addClass('has-success');
        } // /else

        if (paid == "") {
          $("#paid").after('<p class="text-danger"> Ce Champ est obligatoire </p>');
          $('#paid').closest('.form-group').addClass('has-error');
        } else {
          $('#paid').closest('.form-group').addClass('has-success');
        } // /else


        if (paymentType == "") {
          $("#paymentType").after('<p class="text-danger">Le type de paiement est obligatoire</p>');
          $('#paymentType').closest('.form-group').addClass('has-error');
        } else {
          $('#paymentType').closest('.form-group').addClass('has-success');
        } // /else

        if (paymentStatus == "") {
          $("#paymentStatus").after('<p class="text-danger"> Le champs du statut de paiement est obligatoire </p>');
          $('#paymentStatus').closest('.form-group').addClass('has-error');
        } else {
          $('#paymentStatus').closest('.form-group').addClass('has-success');
        } // /else


        // array validation
        var article = document.getElementsByName('article[]');
        var validateProduct;
        for (var x = 0; x < article.length; x++) {
          var articleId = article[x].id;
          if (article[x].value == '') {
            $("#" + articleId + "").after('<p class="text-danger"> Le produit est obligatoire!! </p>');
            $("#" + articleId + "").closest('.form-group').addClass('has-error');
          } else {
            $("#" + articleId + "").closest('.form-group').addClass('has-success');
          }
        } // for

        for (var x = 0; x < article.length; x++) {
          if (article[x].value) {
            validateProduct = true;
          } else {
            validateProduct = false;
          }
        } // for       		   	

        var qte = document.getElementsByName('qte[]');
        var validateqte;
        for (var x = 0; x < qte.length; x++) {
          var qteId = qte[x].id;
          if (qte[x].value == '') {
            $("#" + qteId + "").after('<p class="text-danger">La quantite est obligatoire!! </p>');
            $("#" + qteId + "").closest('.form-group').addClass('has-error');
          } else {
            $("#" + qteId + "").closest('.form-group').addClass('has-success');
          }
        } // for

        for (var x = 0; x < qte.length; x++) {
          if (qte[x].value) {
            validateqte = true;
          } else {
            validateqte = false;
          }
        } // for       	


        if (orderDate && client && tel && paid && paymentType && paymentStatus) {
          if (validateProduct == true && validateqte == true) {
            // create order button
            $("#createOrderBtn").button('loading');

            $.ajax({
              url: form.attr('action'),
              type: form.attr('method'),
              data: form.serialize(),
              dataType: 'json',
              success: function(response) {
                // console.log(response);
                // reset button
                $("#createOrderBtn").button('reset');

                $(".text-danger").remove();
                $('.form-group').removeClass('has-error').removeClass('has-success');

                if (response.success == true) {

                  // create order button
                  $(".success-messages").html('<div class="alert alert-success">' +
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                    ' <br /> <br /> <a type="button" onclick="printOrder(' + response.order_id + ')" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print </a>' +
                    '<a href="index.php?page=order&o=add" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Order </a>' +
                    '</div>');

                  $("html, body, div.panel, div.pane-body").animate({
                    scrollTop: '0px'
                  }, 100);

                  // disabled te modal footer button
                  $(".submitButtonFooter").addClass('div-hide');
                  // remove the product row
                  $(".removeProductRowBtn").addClass('div-hide');

                } else {
                  alert(response.messages);
                }
              } // /response
            }); // /ajax
          } // if array validate is true
        } // /if field validate is true


        return false;
      }); // /create order form function	

    }
  });


  // print order function
  function printOrder(orderId = null) {
    if (orderId) {

      $.ajax({
        url: 'Public/script/printOrder.php',
        type: 'post',
        data: {
          orderId: orderId
        },
        dataType: 'text',
        success: function(response) {

          var mywindow = window.open('', 'Atlas', 'height=400,width=600');
          mywindow.document.write('<html><head><title>Facture</title>');
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
    } // /if orderId
  } // /print order function

  // select on product data
  function getProductData(row = null) {

    if (row) {
      var productId = $("#article" + row).val();

      if (productId == "") {
        $("#rate" + row).val("");

        $("#qte" + row).val("");
        $("#total" + row).val("");

      } else {
        $.ajax({
          url: 'Public/script/fetchSelectedProduct.php',
          type: 'post',
          data: {
            productId: productId
          },
          dataType: 'json',
          success: function(data) {

            $("#rate" + row).val(data[0].PRIX);
            $("#rateValue" + row).val(data[0].PRIX);

            $("#qte" + row).val(1);
            $("#stockD" + row).text(data[0].QTE);

            var total = Number(data[0].PRIX) * 1;
            total = total.toFixed(2);
            $("#total" + row).val(total);
            $("#totalValue" + row).val(total);
            // console.log(total);
            subAmount();
          } // /success
        }); // /ajax function to fetch the product data	
      }

    } else {
      alert('no row! please refresh the page');
    }
  } // /select on product data

  // /documernt


  function addRow() {
    $("#addRowBtn").button("loading");

    var tableLength = $("#productTable tbody tr").length;

    var tableRow;
    var arrayNumber;
    var count;

    if (tableLength > 0) {
      tableRow = $("#productTable tbody tr:last").attr('id');
      arrayNumber = $("#productTable tbody tr:last").attr('class');
      count = tableRow.substring(3);
      count = Number(count) + 1;
      arrayNumber = Number(arrayNumber) + 1;
    } else {
      // no table row
      count = 1;
      arrayNumber = 0;
    }

    $.ajax({
      url: 'Public/script/fetchProductData.php',
      type: 'post',
      dataType: 'json',
      success: function(response) {
        $("#addRowBtn").button("reset");
        var tr = '<tr id="row' + count + '" class="' + arrayNumber + '">' +
          '<td>' +
          '<div class="form-group">' +
          '<select class="form-control" name="article[]" id="article' + count + '" onchange="getProductData(' + count + ')" >' +
          '<option value="">~~SELECT~~</option>';
        // console.log(response);
        $.each(response, function(index, value) {
          tr += '<option value="' + value[0] + '">' + value[1] + '</option>';
        });

        tr += '</select>' +
          '</div>' +
          '</td>' +
          '<td style="padding-left:20px;">' +
          '<input type="text" name="rate[]" id="rate' + count + '" autocomplete="off"  onkeyup="getTotal(' + count + ')" class="form-control" />' +
          '<input type="hidden" name="rateValue[]" id="rateValue' + count + '" autocomplete="off" class="form-control" />' +
          '</td>' +
          '<td style="padding-left:20px;">' +
          '<div class="form-group">' +
          '<p id="stockD' + count + '"></p>' +
          '</div>' +
          '<td style="padding-left:20px;">' +
          '<div class="form-group">' +
          '<input type="number" name="qte[]" id="qte' + count + '" onkeyup="getTotal(' + count + ')" autocomplete="off" class="form-control" min="1" />' +
          '</div>' +
          '</td>' +
          '<td style="padding-left:20px;">' +
          '<input type="text" name="total[]" id="total' + count + '" autocomplete="off" class="form-control" disabled="true" />' +
          '<input type="hidden" name="totalValue[]" id="totalValue' + count + '" autocomplete="off" class="form-control" />' +
          '</td>' +
          '<td>' +
          '<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow(' + count + ')"><i class="glyphicon glyphicon-trash"></i></button>' +
          '</td>' +
          '</tr>';
        if (tableLength > 0) {
          $("#productTable tbody tr:last").after(tr);
        } else {
          $("#productTable tbody").append(tr);
        }

      } // /success
    }); // get the product data

  } // /add row

  function removeProductRow(row = null) {
    if (row) {
      $("#row" + row).remove();
      subAmount();
    } else {
      alert('error! Refresh the page again');
    }
  }
  // table total
  function getTotal(row = null) {
    if (row) {
      var total = Number($("#rate" + row).val()) * Number($("#qte" + row).val());
      total = total.toFixed(2);
      $("#total" + row).val(total);
      $("#totalValue" + row).val(total);

      subAmount();

    } else {
      alert('no row !! please refresh the page');
    }
  }

  function subAmount() {
    var tableProductLength = $("#productTable tbody tr").length;
    var totalAmount = 0;
    for (x = 0; x < tableProductLength; x++) {
      var tr = $("#productTable tbody tr")[x];
      var count = $(tr).attr('id');
      count = count.substring(3);
      // console.log(count);
      totalAmount = Number(totalAmount) + Number($("#total" + count).val());
    } // /for

    totalAmount = totalAmount.toFixed(2);
    $("#totalAmount").val(totalAmount);
    $("#totalAmountValue").val(totalAmount);

    // console.log(totalAmount);

    var paidAmount = $("#paid").val();
    if (paidAmount) {
      paidAmount = Number($("#totalAmount").val()) - Number(paidAmount);
      paidAmount = paidAmount.toFixed(2);

      console.log(paidAmount);
      $("#due").val(paidAmount);
      $("#dueValue").val(paidAmount);
    } else {
      $("#due").val($("#totalAmount").val());
      $("#dueValue").val($("#totalAmount").val());
    } // else

  } // /sub total amount


  var paid = $("#paid").val();

  var dueAmount;
  if (paid) {
    dueAmount = Number($("#totalAmount").val()) - Number($("#paid").val());
    dueAmount = dueAmount.toFixed(2);

    $("#due").val(dueAmount);
    $("#dueValue").val(dueAmount);
  } else {
    $("#due").val($("#totalAmount").val());
    $("#dueValue").val($("#totalAmount").val());
  }

  // } // /discount function

  function paidAmount() {
    var grandTotal = $("#totalAmount").val();

    if (grandTotal) {
      var dueAmount = Number($("#totalAmount").val()) - Number($("#paid").val());
      dueAmount = dueAmount.toFixed(2);
      $("#due").val(dueAmount);
      $("#dueValue").val(dueAmount);
    } // /if
  } // /paid amoutn function


  function resetOrderForm() {
    // reset the input field
    $("#createOrderForm")[0].reset();
    // remove remove text danger
    $(".text-danger").remove();
    // remove form group error 
    $(".form-group").removeClass('has-success').removeClass('has-error');
  } // /reset order form


  // remove order from server
  function removeOrder(orderId = null) {
    if (orderId) {
      $("#removeOrderBtn").unbind('click').bind('click', function() {
        $("#removeOrderBtn").button('loading');

        $.ajax({
          url: 'Public/script/removeOrder.php',
          type: 'post',
          data: {
            orderId: orderId
          },
          dataType: 'json',
          success: function(response) {
            $("#removeOrderBtn").button('reset');

            if (response.success == true) {

              manageOrderTable.ajax.reload(null, false);
              // hide modal
              $("#removeOrderModal").modal('hide');
              // success messages
              $("#success-messages").html('<div class="alert alert-success">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                '</div>');

              // remove the mesages
              $(".alert-success").delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                });
              }); // /.alert	          

            } else {
              // error messages
              $(".removeOrderMessages").html('<div class="alert alert-warning">' +
                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                '</div>');

              // remove the mesages
              $(".alert-success").delay(500).show(10, function() {
                $(this).delay(3000).hide(10, function() {
                  $(this).remove();
                });
              }); // /.alert	          
            } // /else

          } // /success
        }); // /ajax function to remove the order

      }); // /remove order button clicked


    } else {
      alert('error! refresh the page again');
    }
  }
  // /remove order from server

  // Payment ORDER
  function paymentOrder(orderId = null) {
    if (orderId) {

      $("#orderDate").datepicker();

      $.ajax({
        url: 'Public/script/fetchOrderData.php',
        type: 'post',
        data: {
          orderId: orderId
        },
        dataType: 'json',
        success: function(response) {

          // due 
          $("#due").val(response.order[10]);

          // pay amount 
          $("#payAmount").val(response.order[10]);

          var paidAmount = response.order[9]
          var dueAmount = response.order[10];
          var grandTotal = response.order[8];

          // update payment
          $("#updatePaymentOrderBtn").unbind('click').bind('click', function() {
            var payAmount = $("#payAmount").val();
            var paymentType = $("#paymentType").val();
            var paymentStatus = $("#paymentStatus").val();

            if (payAmount == "") {
              $("#payAmount").after('<p class="text-danger">The Pay Amount field is required</p>');
              $("#payAmount").closest('.form-group').addClass('has-error');
            } else {
              $("#payAmount").closest('.form-group').addClass('has-success');
            }

            if (paymentType == "") {
              $("#paymentType").after('<p class="text-danger">The Pay Amount field is required</p>');
              $("#paymentType").closest('.form-group').addClass('has-error');
            } else {
              $("#paymentType").closest('.form-group').addClass('has-success');
            }

            if (paymentStatus == "") {
              $("#paymentStatus").after('<p class="text-danger">The Pay Amount field is required</p>');
              $("#paymentStatus").closest('.form-group').addClass('has-error');
            } else {
              $("#paymentStatus").closest('.form-group').addClass('has-success');
            }

            if (payAmount && paymentType && paymentStatus) {
              $("#updatePaymentOrderBtn").button('loading');
              $.ajax({
                url: 'Public/script/editPayment.php',
                type: 'post',
                data: {
                  orderId: orderId,
                  payAmount: payAmount,
                  paymentType: paymentType,
                  paymentStatus: paymentStatus,
                  paidAmount: paidAmount,
                  grandTotal: grandTotal
                },
                dataType: 'json',
                success: function(response) {
                  $("#updatePaymentOrderBtn").button('loading');

                  // remove error
                  $('.text-danger').remove();
                  $('.form-group').removeClass('has-error').removeClass('has-success');

                  $("#paymentOrderModal").modal('hide');

                  $("#success-messages").html('<div class="alert alert-success">' +
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                    '</div>');

                  // remove the mesages
                  $(".alert-success").delay(500).show(10, function() {
                    $(this).delay(3000).hide(10, function() {
                      $(this).remove();
                    });
                  }); // /.alert	

                  // refresh the manage order table
                  manageOrderTable.ajax.reload(null, false);

                } //

              });
            } // /if

            return false;
          }); // /update payment			

        } // /success
      }); // fetch order data
    } else {
      alert('Error ! Refresh the page again');
    }
  }
</script>

</html>