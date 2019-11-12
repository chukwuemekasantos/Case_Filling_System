<?php
  
  session_start();

  include_once '../contoller/select.php';

  $select = new select();

  $admin_login = $select->admin_login();


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

    <style type="text/css">
    .d-block{
      color: #7971EA !important;
    }
  </style>
  
</head>

<body class="bg-dark">

  <div class="container" style="margin-top: 110px;">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header text-center" style="font-size: 25px;">Admin Login</div>
      <div class="card-body">

        <?php

          switch ($admin_login) {
            case 'invalid_admin':
                    echo '

                        <div class="alert alert-danger text-center">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Sorry!</strong> Invalid Credentials.
                        </div>

                    ';
              break;
             
            default:
              
              break;
          }

        ?>
        <form method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
                  <label for="email">Email</label>
                </div>
              </div>
            
            </div>
          </div>

         
          

           <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          

         
         

          <input type="submit" name="login" class="btn btn-primary btn-block" value="Login" style="background-color: #7971EA; border-color: #7971EA;" />
        </form>
        <!-- <div class="text-center" style="color: #7971EA;">
          <a class="d-block small mt-3" href="register_individual.php">OR Register As An Individual</a>
          <a class="d-block small mt-3" href="../index.php.">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div> -->
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
