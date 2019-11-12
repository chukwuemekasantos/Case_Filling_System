<?php


include_once '../contoller/select.php';

$select = new select();


$count = $select->count_new_proceedings();


		

?>


<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">STHCAB MEMBER</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
     
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">

        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-danger"><?php print_r($count[0][0]);?></span>
          <i class="fas fa-bell fa-fw"></i>
          
        </a>
      
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="badge badge-danger"><?php print_r($count[0][0]);?></span>
          <i class="fas fa-envelope fa-fw"></i>
         
          
        </a>
       
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user fa-fw"></i>
        <?php

        	if (isset($_SESSION['member']['individual_fullname'])) {
        		
       ?>

       		 <?=$_SESSION['member']['individual_fullname']?>

       <?php

        	}

        	if (isset($_SESSION['member']['organization_name'])) {
        	
        ?>

        	<?=$_SESSION['member']['organization_name']?>
        <?php

        	}
         
        ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
         <!--  <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="log_out.php">Logout</a>
        </div>
      </li>
    </ul>

  </nav>