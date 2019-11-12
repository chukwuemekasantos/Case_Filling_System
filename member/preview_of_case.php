<?php
    
    session_start();

   

    include_once '../contoller/insert.php';

     include_once '../contoller/select.php';

   $select = new select();

    $insert = new insert();

    if (isset($_GET['upload'])) {
          
          $file_case_id = $_GET['upload'];
    }


    $file_case = $select->preview_case($file_case_id)
    // $reply_complaint = $insert->message_seen_by_admin();



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
          <li class="breadcrumb-item active">Defendant Claims</li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
         <!--  <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div> -->
          <div class="card-body">
              <div class="container" style="">
  
        <?php

          // switch ($send_complaint) {
          //   case 'nope':
          //           echo '

          //               <div class="alert alert-danger text-center">
          //                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          //                 <strong>Sorry!</strong> Failed To Sent Message.
          //               </div>

          //           ';
          //     break;
          //    case 'success':
          //          echo '

          //               <div class="alert alert-success text-center">
          //                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          //                 <strong>Success!</strong> Your Message Is Sent Successfully.
          //               </div>

          //           ';
          //     break;

          //   default:
              
          //     break;
          // }

        ?>
       
            <div id="printContent">
      <div  class="well container" style="white-space: 10px; width: 800px; line-height: 34px;">



            <h6 style="float: right;">Case No : <?php print_r($file_case['res'][0]['file_case_id']); ?></h6>
            <div class="clearfix"></div>
            <center><h1>SUMMON</h1></center>
            <center><h5>General Form Of Originating Summons</h5></center>
            <p>Court : In the High Court Of Ebonyi State.<br>
               Division : In the Abakaliki Judicial Division <br> 
               Venue : Holding at Abakaliki.

               <br>
               <br>

               Between A.B  <b><?php print_r($file_case['res'][0]['name_of_plaintiff']);?></b> Plaintiff
               <br>

                C.D  <b><?php print_r($file_case['res'][0]['name_of_defendants']); ?></b> Defendants.

                <br>

                Let <b><?php print_r($file_case['res'][0]['name_of_defendants']); ?></b> of <b><?php print_r($file_case['res'][0]['add_of_defendants']); ?></b> in within eight days after service of this summors on him, inclusive of the days of such service cause an apprearence to be entered for him to this summon which is issued upon the application of <b><?php print_r($file_case['res'][0]['name_of_plaintiff']); ?></b> of <b><?php print_r($file_case['res'][0]['add_of_plaintiff']); ?></b> who claims to be (state the nature of the claim), for the determination of he following questions.<br>

                <br>

                Dated : <?php print_r(date("jS".' - '."F".' - '."Y",strtotime($file_case['res'][0]['date_of_file_case']))) ?> 
                
                <br>

                This Summon was taken out by <b><?php print_r($file_case['res'][0]['name_of_practitioner']);?></b><br>
                Lagel Prationers for the above named. 
                <br>
                <br>
                Note - if the defendant does not enter appearence within the time and at the place above mentioned, such order will be made and proceeding may be taken as the judge may think just and expedient.

                <br>
                <br>

                <button class="btn btn-danger" style="float: right; margin-left: 5px;"><a href="list_of_filed_case.php" style="color: white; text-decoration: none;">Back</a></button>
               <button class="btn btn-success" style="float: right;" onclick="print('printContent')">Print</button>
            </p>
          </div>
        </div>

       
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

   <script type="text/javascript">
                        
                        function print(divname) {

                              let printContent = document.getElementById(divname).innerHTML;

                            let  w = window.open();

                              w.document.write(printContent);

                              w.print();

                              w.close();

                        
                        }


                      </script>


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
