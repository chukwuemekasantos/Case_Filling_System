<?php

include_once '../contoller/select.php';

  session_start();

    $select = new select();

    if (isset($_GET['add'])) {
        
        $case_id = $_GET['add'];
    }


     if (isset($_SESSION['member']['organization_id'])) {
      
          $member_id = $_SESSION['member']['organization_id'];

    }elseif (isset($_SESSION['member']['individual_id'])){
        
          $member_id = $_SESSION['member']['individual_id'];
    }

    

    $List_case_proceedings = $select->List_case_proceedings($case_id,$member_id);


   $check_if_case =  $select->check_if_case($case_id)


   // print_r($List_case_proceedings);
    //print_r($List_case_proceedings);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Tables</title>

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

        include_once 'include/sidebar.php';

    ?>


 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Case Proceedings</li>

          
        </ol>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
          <center><h4>JUDGEMENT STATEMENT</h4></center>
        </div>
          <?php
            foreach ($check_if_case as $value):
          ?>
          <div class="container">
            <P>
              <?=$value['judgement_note']?>
            </P>
            <div class=""> 
              <a href="<?='admin/judgement_document/'.$value['judgement_document']?>" download="">Download Judgement File</a>
          </div>
          </div>
          <?php
            endforeach;
          ?>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

        <button id="progress" class="btn btn-warning btn-sm " style="color: white; background-color: darkorange; float: right;">Judgement in progress ....</button>

        <?php
          if ($check_if_case) {
        ?>

           <button class="btn btn-warning btn-sm " data-toggle="modal" data-target="#myModal" style="color: white; border-color:darkgreen; background-color: darkgreen; float: right;">View Judgement</button>
           <style type="text/css">
             #progress{
                display: none;
             }
           </style>

        <?php
          }
        ?>
      

        <div class="clearfix"></div>
        <br>
      <?php

        foreach ($List_case_proceedings as $value):
         
      ?>
       <div class="container">
         <i style="float: right;">Date Of Proceeding : <?=date("jS".' - '."F".' - '."Y",strtotime($value['date_of_preceeding']))?> </i>
          <div class="clearfix"></div>
          <div class="well" style="background-color: #E9ECEF; padding:10px;">
           
           <?=$value['preceeding']?>
          
           
          </div>

          <div class=""> 
              <a href="<?='admin/preceeding_document/'.$value['preceeding_document']?>" download="">Download Proceeding File</a>
          </div>

        </div>

        <br>
      <?php

          endforeach;

      ?>

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
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
