<?php $title = 'Login';
 include 'public/includes/header.php';
 ?>
 <div class="container">
            <div class="row">	
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">S'Authentifier</h3>
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

