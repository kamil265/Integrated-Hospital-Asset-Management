<?php 
 include '_loader.php';
 include_once("env.php");
 session_start();
 error_reporting(0);
 include 'connect.php';
 if(strlen($_SESSION['alogin'])==0)
   { 
 header('location:login.php');
 }
 if(isset($_GET['halaman'])){
    $halaman=$_GET['halaman'];
  }
  else{
    $halaman='dashboard';
  }
  ob_start();
  $file='_halaman/'.$halaman.'.php';
  if(!file_exists($file)){
    include '_halaman/error.php';
  }
  else{
    include $file;
  }
  $halaman = ob_get_contents();
  ob_end_clean();
?>


<!DOCTYPE html>
<html lang="en">
    <?php include '_layouts/head.php'?>
    <body>
****************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
      <?php
        include '_layouts/header.php';
        include '_layouts/sidebar.php';
      ?>
        <div class="content-body">

        
          

            <?php
              echo $halaman;
            ?>
        </div>
        <div class="footer">
            <div class="copyright">
                <p><strong>Integrated Hospital Asset Management</strong> © 2021 All Rights Reserved</p>            </div>
        </div>
    </div>
    <?php
      include '_layouts/javascript.php';
    ?>
</body>
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
        <?php
            
        ?>
      </div>
    </body>
</html>