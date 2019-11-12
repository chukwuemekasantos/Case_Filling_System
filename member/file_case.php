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

   // print_r($file_case);



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
        <div class="card mb-3" id="form_case">
         <!--  <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div> -->
          <div class="card-body">
              <div class="container" style="">
  
        <?php

          switch ($file_case['message']) {
            case 'too_large':
                    echo '

                        <div class="alert alert-danger text-center">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Sorry!</strong> Your Image Is Above 5M. 
                        </div>

                    ';
              break;
             case 'success':
            ?>

                        <div class="alert alert-success text-center">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> Your Have Successfully File A Case. <b  onclick="hide_form('printContent')" style="cursor:pointer;">Click To Print </b>
                        </div>
            <?php
                  
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
       

 

        <form method="POST" enctype="multipart/form-data" id="form">

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
                  <input type="text" id="division" name="division" class="form-control" value="Abakaliki Division" placeholder="Division" required="required" autofocus="autofocus" readonly="">
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

               <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="add_of_plain" name="add_of_plain" class="form-control" placeholder="Address Of Plaintiff" required="required" autofocus="autofocus">
                  <label for="add_of_plain">Address Of Plaintiff</label>
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

               <div class="col-md-6">
                <div class="form-label-group">
                   <input type="text" id="add" name="add_of_def" class="form-control" placeholder="Address Of Defendants" required="required" autofocus="autofocus">
                  <label for="add">Address Of Defendants</label>
                </div>
              </div>
             

            
              <div class="col-md-4" style="margin-top: 10px; margin-left: 160px;">
               
                  <select name="def_cat" class="form-control" required="">
                    <option value="" selected="">Select Defendant Category</option>
                    <option value="individual">Individual</option>
                    <option value="organization">Organization</option>
                  </select>
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
                  <input type="File"  name="claims" class="form-control" required="required" autofocus="autofocus" multiple="">
                </div>
              </div>

             <div class="col-md-4">
                  <select name="amount" class="form-control" id="range" required="">
                    <option value="" selected="">Select Claim Amount</option>
                    <option value="N250,001 - N500,000">N250,001 - N500,000</option>
                    <option value="N500,001 - N1,000,000">N500,001 - N1,000,000</option>
                    <option value="N500,001 - N1,000,000">N500,001 - N1,000,000</option>
                    <option value="N100,000,001 - N5,000,000">N1,000,001 - N5,000,000</option>
                    <option value="N500,000,000 - Above">N5,000,000 - Above</option>
                  </select>
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
          
         <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <button class="btn btn-success btn-block" id="pay" onclick="payWithPaystack()">Pay</button>
                </div>               
              </div>

                <div class="col-md-6">
                  <div class="form-label-group">
                     <button type="submit" name="file_case" id="filecase" class="btn btn-primary btn-block" style="background-color: #7971EA; border-color: #7971EA;">File Case</button>
                    </div>
                </div>
              </div>      
          </div>
          
        </form>

<br>
<br>

        <form>
  <script src="https://js.paystack.co/v1/inline.js"></script>
<!--   <select name="range" id="">
    <option value="1000">1000</option>
  </select>
  <button type="button" onclick="payWithPaystack()" id="rangeb"> Pay </button>  -->
</form>


<!-- place below the html form -->
<script>

   document.getElementById("filecase").disabled = true;
   
  function payWithPaystack(){

    let range = document.getElementById('range').value;

   

      if (range == '') {

          alert("alert select amount")
      }else{

           // <option value="N250,001 - N500,000">N250,001 - N500,000</option>
           //          <option value="N500,001 - N1,000,000">N500,001 - N1,000,000</option>
           //          <option value="N500,001 - N1,000,000">N500,001 - N1,000,000</option>
           //          <option value="N100,000,001 - N5,000,000">N1,000,001 - N5,000,000</option>
           //          <option value="N500,000,000 - Above">N5,000,000 - Above</option>

            if (range == 'N250,001 - N500,000') {

                  amount = 200000;
            }else if( range == 'N500,001 - N1,000,000')
            {
                  amount = 300000;
            }else if(range = 'N100,000,001 - N5,000,000'){

                  amount = 400000;

            }else if(range = 'N500,000,000 - Above'){

              amount = 500000;
            }

          var handler = PaystackPop.setup({
      key: 'pk_test_a44a0c9cbb4da3c7ee0765ab95ed47c138513b15',
      email: 'customer@email.com',
      amount: amount,
       // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){

          //alert('success. transaction ref is ' + response.reference);

          document.getElementById("filecase").disabled = false;
          document.getElementById("pay").disabled = true;
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }

      }

    
</script>
      </div>

      <div style="display: none;" id="printContent">
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

                Defendant should register with the following link : 

                <br>

                <?php


                      if ($file_case['res'][0]['cat_of_defendants'] == 'organization') {



                      $v = $file_case['res'][0]['file_case_id'];

                      print_r("localhost/STHCAB/member/register_organization.php?case=".$v);
                
                ?>
                      

                <?php
                      }

                      elseif ($file_case['res'][0]['cat_of_defendants'] == 'individual') {

                      $v = $file_case['res'][0]['file_case_id'];

                      print_r("localhost/STHCAB/member/register_individual.php?case=".$v);
                      
                ?>
                   

                <?php

                    }

                ?>
            </p>
          </div>
        </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      
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


  <!-- place below the html form -->



   <script type="text/javascript">
                        
                        function hide_form(divname) {

                              let printContent = document.getElementById(divname).innerHTML;

                            let  w = window.open();

                              w.document.write(printContent);

                              w.print();

                              w.close();

                        
                        }

                         $(document).ready(function(){

                            function print(){

                             

                            //   let printContent = document.getElementById(divname).innerHTML;

                            // let  w = window.open();

                            //   w.document.write(printContent);

                            //   w.print();

                            //   w.close();

                              // let originalContent = document.body.innerHTML;

                              // document.body.innerHTML = printContent;

                              // window.print();

                              //  document.body.innerHTML = originalContent;


                             };    

                          });  



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
