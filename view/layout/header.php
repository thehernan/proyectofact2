<?php
    

//error_reporting(0);
    
//var_dump($_SESSION);
    if(empty($_SESSION['id']) || !isset($_SESSION['id'])){
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=".base_url."'>";
        
        
    }
////?>


<!DOCTYPE html>
<html lang="es">

<head>
 
      <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <!--<meta charset="UTF-8">-->
    <!--<meta http-equiv="X-UA-Compatible" content="IE=Edge">-->
    <!--<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">-->
    
    <title>Facturación</title>
    <!-- Favicon-->
    <!--<link rel="icon" href="favicon.ico" type="image/x-icon">-->

  <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url ?>plugins/animate-css/animate.css" rel="stylesheet" />
    
     <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?= base_url ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="<?= base_url ?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    
     <!-- Sweet Alert Css -->
    <link href="<?= base_url ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
      <!-- Bootstrap Select Css -->
    <link href="<?= base_url ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?= base_url ?>css/style.css" rel="stylesheet">
    


    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url ?>css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-teal">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Espere por favor...</p><!--
        -->        </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<?php include './view/layout/searchbar.php'; ?>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<?php include './view/layout/navbar.php'; ?>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <?php include './view/layout/userinfo.php'; ?>
        <!-- #User Info -->
        <!-- Menu -->
        <?php include './view/layout/menu.php'; ?>
        <!-- #Menu -->
        <!-- Footer -->
        <?php include './view/layout/footer.php'; ?>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <?php include './view/layout/rightsidebar.php'; ?>
    <!-- #END# Right Sidebar -->


</section>