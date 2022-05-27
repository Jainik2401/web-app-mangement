<?php session_start(); 

if(!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Easy App</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/logo.png">

        <!--Chartist Chart CSS -->
        <!-- <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css"> -->

        <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="./assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="./assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="./assets/css/_main.css" rel="stylesheet" type="text/css">    
        <link href="./assets/css/datatables.css" rel="stylesheet" type="text/css">        
        <link href="./plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <link href="./plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    </head>

    <body class="enlarged">
 
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.php" class="logo">
                        <span>
                                <!-- <img src="assets/images/logo-light.png" alt="" height="18"> -->
                                <h3  class="text-success mt-4" >Easy App</h3>
                            </span>
                        <i>
                                <h3  class="text-success mt-4" style="font-style: normal;" >E</h3>
                                <!-- <img src="assets/images/logo-sm.png" alt="" height="22"> -->
                            </i>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right list-inline float-right mb-0">
                        <!-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <form role="search" class="app-search">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li> -->

                        <!-- full screen -->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-fullscreen noti-icon"></i>
                            </a>
                        </li>

                        
                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/admin-profile.png" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="admin-profile.php"><i class="fas fa-user-circle"></i>  Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="logout.php"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="index.php" class="waves-effect">
                                    <i class="ti-home"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-package"></i> <span> App Management <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="add_new_app.php">Add New App</a></li>
                                    <li><a href="app_listing.php">App Listing</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-receipt"></i><span> App Catagory <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span></a>
                                <ul class="submenu">
                                    <li><a href="add_app_catagory.php">Add App Catgory</a></li>
                                    <li><a href="app_category_listing.php">Category Listing</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-pie-chart"></i><span>App Manager <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="add_new_appmanager.php">Add New App Manager</a></li>
                                    <li><a href="app_manager_listing.php">App Manager Listing</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="app_request_pending.php" class="waves-effect">
                                   <i class="fas fa-envelope-open-text"></i><span>Application Pending</span>
                                </a>
                            </li>

                            <li>
                                <a href="inquiry.php" class="waves-effect">
                                   <i class="fas fa-envelope-open-text"></i><span>Inquiry</span>
                                </a>
                            </li>

                            <li>
                                <a href="feedback.php" class="waves-effect">
                                   <i class="fas fa-envelope-open-text"></i><span>Feedbacks</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
				</div>
            </div><!-- Sidebar -left --><!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        