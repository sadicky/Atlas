<?php $title = 'Login'; ?>
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
 <div class="container">
            <div class="row">	
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">S'AUTHENTIFIER</h3>
                        </div>
                        <div class="panel-body">
                            <div id="errorMsg"></div><br/>
                            <form role="form" method="POST" id="login_form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" id="email" name="EMAIL" type="email" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="PWD" id="pwd" type="password" required>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" name="login" value="Se Connecter" class="btn btn-lg btn-success btn-block"/>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                
     				 <div class='col-sm-12' id="message"></div>	
            </div>
        </div>
           <!-- jQuery -->
   <script src="plugins/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="plugins/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="plugins/js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="plugins/js/startmin.js"></script>

