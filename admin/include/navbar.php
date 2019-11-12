<?php

    include_once '../contoller/select.php';


    include_once '../contoller/insert.php';

    if (isset($_SESSION['member']['organization_id'])) {
      
          $member_id = $_SESSION['member']['organization_id'];

    }elseif (isset($_SESSION['member']['individual_id'])){
        
          $member_id = $_SESSION['member']['individual_id'];
    }                                                                                                           
  
    $select = new select();

     $insert = new insert();


    $countNewMessageForAdmin = $select->countNewMessageForAdmin();

       $insert->changebadgecount();


?>


<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">STHCAB ADMIN</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <!--  <i class="fas fa-bell fa-fw"></i> -->
          <span class="badge badge-danger" style="font-size: 10px;"><?php  print_r($countNewMessageForAdmin); ?></span>
        </a>
      
      </li>
      <li class="nav-item  no-arrow mx-1">
        <form method="post">
        <button type="submit" name="seen" class="btn btn-defualt btn-sm">
          <i class="fas fa-envelope fa-fw" style="font-size: 18px; color: white; margin-top: 4px;"></i>
        </button>
        </form>
       
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user fa-fw"></i>
        <?php

        	if (isset($_SESSION['admin']['admin_name'])) {
        		
       ?>

       		 <?=$_SESSION['admin']['admin_name']?>

       <?php

        	}       
        	
        ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="log_out.php">Logout</a>
        </div>
      </li>
    </ul>

  </nav>