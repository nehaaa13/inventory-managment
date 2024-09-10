<style>
    .navbar{
        background-color: #6491e3;
    }
</style>
<?php 
include "config.php";

session_start();
if (!isset($_SESSION['user_data'])){
   header("location:http://localhost/jkm/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="vendor/css/sb-admin-2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>



<body id="page-top">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar static-top shadow">
                    <a class="" href="index.php">
                    <img src="../jkmLogo.jpg"
                        style="width:60px; height:60px; border-radius:50%; border:2px solid orange"></img>
                    </a>
                    <h2 class="text-light mt-3 ms-2">JKM Ventures Private Limited</h2>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="fas fa-search fa-fw"></i> </a>
                            <!-- Dropdown - Messages -->
                           <div class="dropdown-menu dropdown-menu-right p-3 shadow  +animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button"> <i
                                                    class="fas fa-search fa-sm"></i> </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - User Information -->

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span
                                    class="mr-2 d-none d-lg-inline text-light-600 small">
                                    <?php
                                          if (isset($_SESSION['user_data'])){
                                             echo $_SESSION['user_data']['1'];
                                             unset($_SESSION['error']);
                                          }
                                    ?>

                                </span> <img class="img-profile rounded-circle" src="vendor/img/undraw_profile.svg">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.php"> <i
                                        class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile </a>
                                <a class="dropdown-item" href="#"> <i
                                        class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"> <i
                                        class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" name="logout-btn"></i>Logout </a>
                            </div>
                </nav>
                </li>
                </ul>
                </nav>
                <!-- End header -->
                <script src="logout.js"></script>


</body>

</html>