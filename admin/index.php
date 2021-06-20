
<?php
session_start();
include('..//koneksi.php');

if (!isset($_SESSION['admin'])) {
    header("location: login.php");
}
$page = $_GET['page'];
$action = $_GET['action'];
$namaSitus = "Velve Admin";
$title = "";

if (!empty($page)) {
    switch ($page) {
        case 'Dashboard':
            if ($action == 'add') {
                $title = "Add user - " . $namaSitus;
            } else if ($action == 'update') {
                $title = "Update user - " . $namaSitus;
            
            } else {

            $title = "Dashboard - " . $namaSitus;
            }
            break;
        case 'category':
                if ($action == 'add') {
                    $title = "Add category - " . $namaSitus;
                } else if ($action == 'update') {
                    $title = "Update category - " . $namaSitus;
                
                } else {
    
                    $title = "Category - " . $namaSitus;
                }
                break;
        case 'products':
            if ($action == 'add') {
                $title = "Add new product - " . $namaSitus;
            } else if ($action == 'update') {
                $title = "Update product - " . $namaSitus;
            
            } else {

                $title = "Products - " . $namaSitus;
            }
            break;

        case 'purchase':
            if ($action == 'detail') {
                $title = "Detail purchase - " . $namaSitus;
            } else {
                $title = "Purchase - " . $namaSitus;
            }
            break;

        case 'customers':
            if ($action == 'add') {
                $title = "Add customer - " . $namaSitus;
            }else if ($action == 'update') {
                $title = "Update customer - " . $namaSitus;
            
            } else {
                $title = "Customers - " . $namaSitus;
            }
            break;

        case 'laporan':
            $title = "Laporan - " . $namaSitus;
            break;

        default:
            $title = "Dashboard";
            break;
    }
} else {
    $title = "Dashboard - " . $namaSitus;
}
//ambil data login
$data = $koneksi->query("SELECT * FROM tb_users WHERE id = '" . $_SESSION['id'] . "'")->fetch_assoc();
include('layout/header.php');
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
            </div>
            <div class="sidebar-brand-text mx-4">Velve Admin<sup></sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-tachometer-alt " ></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="index.php?page=category">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Category</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="index.php?page=products">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Products</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="index.php?page=purchase">
                <i class="fas fa-fw fa-money-bill-wave"></i>
                <span>Purchase</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="index.php?page=customers">
                <i class="fas fa-fw fa-users"></i>
                <span>Customers</span>
            </a>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="index.php?page=laporan">
                <i class="fas fa-fw fa-file"></i>
                <span>Laporan</span>
            </a>
        </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello Admin!</span>
                            <img class="img-profile rounded-circle" src="assets/img/logo.png">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container">
                <?php
                if (!empty($page)) {
                    switch ($page) {
                        case 'dashboard':

                                if ($action == "add") {
                                    include "page/user/add_user.php";
                                }else if ($action == "update") {
                                    include "page/user/update_user.php";
                                }else if ($action == "delete") {
                                    include "page/user/delete_user.php";
                                } else {
                                $title = "dashboard";
                                    include "page/dashboard.php";
                                }
                                break;
                        case 'category':

                                if ($action == "add") {
                                    include "page/category/add_category.php";
                                }else if ($action == "update") {
                                    include "page/category/update_category.php";
                                }else if ($action == "delete") {
                                    include "page/category/delete_category.php";
                                } else {
                                    include "page/category/category.php";
                                }
                                break;
                                
                        case 'products':
                            if ($action == "add") {
                                include "page/products/add_product.php";
                            } else if ($action == "update") {
                                include "page/products/update_product.php";
                            } else if ($action == "delete") {
                                include "page/products/delete_product.php";
                            } else {
                                include "page/products/products.php";
                            }
                            break;

                        case 'purchase':

                            if ($action == "detail") {
                                include "page/purchase/detail_purchase.php";
                            } else {
                                include "page/purchase/purchase.php";
                            }
                            break;

                        case 'customers':

                            if ($action == "add") {
                                include "page/customers/add_customer.php";
                            }else if ($action == "update") {
                                include "page/customers/update_customer.php";
                            }else if ($action == "delete") {
                                include "page/customers/delete_customer.php";
                            } else {
                                include "page/customers/customers.php";
                            }
                            break;
                        
                        case 'laporan':
                            include "page/laporan/laporan.php";
                            break;

                        default:
                            include "page/dashboard.php";
                            break;
                    }
                } else {
                    $title = "dashboard";
                    include "page/dashboard.php";
                }
                ?>
            </div>
            <?php
            include('layout/footer.php');
            ?>