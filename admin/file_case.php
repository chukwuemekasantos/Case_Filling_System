<?php
    
    session_start();

   

    include_once '../contoller/insert.php';

    if (isset($_SESSION['member']['organization_id'])) {
      
          $member_id = $_SESSION['member']['organization_id'];

    }elseif (isset($_SESSION['member']['individual_id'])){
        
          $member_id = $_SESSION['member']['individual_id'];
    }

    $insert = new insert();


    $file_case = $insert->file_a_case($member_id);



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Charts</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php

    include_once 'include/navbar.php';

  ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include_once 'include/Sidebar.php';
    ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">File Case</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
         <!--  <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div> -->
          <div class="card-body">
              <div class="container" style="">
  
        <?php

          switch ($file_case) {
            case 'too_large':
                    echo '

                        <div class="alert alert-danger text-center">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Sorry!</strong> Your Image Is Above 5M.
                        </div>

                    ';
              break;
             case 'success':
                   echo '

                        <div class="alert alert-success text-center">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> Your Have Successfully File A Case.
                        </div>

                    ';
              break;

            case 'failed to upload':
                  echo '

                        <div class="alert alert-danger text-center">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Sorry!</strong> Falied To File A Case.
                        </div>

                    ';
              break;

            default:
              
              break;
          }

        ?>
       


        <form method="POST" enctype="multipart/form-data">

           <h6>In the High Court of Ebonyi State</h6>
          <br>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
                <div class="form-label-group">
                  <h6>In the</h6>
                </div>
              </div>
             <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="division" name="division" class="form-control" placeholder="Division" required="required" autofocus="autofocus">
                  <label for="division">Abakaliki Division</label>
                </div>
              </div>

             <div class="col-md-4">
                <div class="form-label-group">
                    Judical Division
                </div>
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
                <div class="form-label-group">
                  <h6>Between A.B</h6>
                </div>
              </div>
             <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="ab" name="ab" class="form-control" placeholder="Name Of Plaintiff" required="required" autofocus="autofocus">
                  <label for="ab">Name Of Plaintiff</label>
                </div>
              </div>

               <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="add_of_plain" name="add_of_plain" class="form-control" placeholder="Address Of Plaintiff" required="required" autofocus="autofocus">
                  <label for="add_of_plain">Address Of Plaintiff</label>
                </div>
              </div>

             <div class="col-md-2">
                <div class="form-label-group">
                    Plaintiff
                </div>
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
                <div class="form-label-group">
                  <h6>C.D and E.F</h6>
                </div>
              </div>
             <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="cd" name="cd" class="form-control" placeholder="C.D" required="required" autofocus="autofocus">
                  <label for="cd">Name Of Defendants</label>
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-label-group">
                   <input type="text" id="add" name="add_of_def" class="form-control" placeholder="Address Of Defendants" required="required" autofocus="autofocus">
                  <label for="add">Address Of Defendants</label>
                </div>
              </div>
             <div class="col-md-2">
                <div class="form-label-group">
                    Defendants
                </div>
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
                <div class="form-label-group">
                  <h6>Upload Claims</h6>
                </div>
              </div>
             <div class="col-md-4">
                <div class="form-label-group">
                  <input type="File"  name="claims[]" class="form-control" required="required" autofocus="autofocus" multiple="">
                </div>
              </div>
            </div>
          </div>

          
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
                <div class="form-label-group">
                  <h6>The summons was taken out by</h6>
                </div>
              </div>
             <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="lp" name="name_of_practioner" class="form-control" placeholder="Legal Practioners Name" autofocus="autofocus">
                  <label for="lp">Legal Practioners Name (Optional)</label>
                </div>
              </div>
             <div class="col-md-4">
                <div class="form-label-group">
                    Legal Practioners for the above-named
                </div>
              </div>
            </div>
          </div>
          
        
          

          <input type="submit" name="file_case" class="btn btn-primary btn-block" value="File Case" style="background-color: #7971EA; border-color: #7971EA;" />
        </form>
        
     
          </div>
         
        </div>

        

       <!--  <p class="small text-center text-muted my-5">
          <em>More chart examples coming soon...</em>
        </p>
 -->
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
