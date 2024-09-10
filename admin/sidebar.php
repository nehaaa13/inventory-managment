<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sidebar</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="vendor/css/sb-admin-2.css" rel="stylesheet">
</head>

<style>
        /* Add CSS styles here */
        .dropdown-menu {
            position: absolute;
            z-index: 1000;
            display: none;
        }
        .dropdown-item{
            color: #6491e3 !important;
        }

        .nav-item:hover .dropdown-menu {
            display: block;
        }

        .nav-item {
            position: relative;
        }

        .nav-item:hover ~ .nav-item .dropdown-menu {
            top: 100%;
            left: 0;
        }
        .nav-link, .sidebar-brand{
            color: #6491e3 !important;
        }
    </style>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<body id="page-top">

    <div class="" >
        <ul class="navbar-nav bg-light sidebar sidebar-orange accordion ms-0" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15"></div>
                <div class="sidebar-brand-text mx-3">COMPANY </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle collapsed" href="" id="mastersDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"> <span class="fw-bold">Production</span> </a>
                <ul class="dropdown-menu" aria-labelledby="mastersDropdown">
                    <li><a class="dropdown-item sidebarList" href="report2.php">PRODUCTION REPORT </a></li>
                    <li><a class="dropdown-item sidebarList" href="jumbo_new1.php">JUMBO ENTRY</a></li>
                    <li><a class="dropdown-item sidebarList" href="jumbo_list.php">JUMBO STOCK</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">RAWMATERIAL STOCK</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">RAWMATERIAL RECEIVED</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">DATE WISE DOWNTIME</a></li>
                </ul>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle collapsed" href="" id="mastersDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"> <span class="fw-bold">Slitting</span> </a>
                <ul class="dropdown-menu" aria-labelledby="mastersDropdown">
                    <li><a class="dropdown-item sidebarList" href="slitprg.php">ROLLS ENTRY</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">SLITTING STOCK</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">ROLLS TRANSFER</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">ROLLS STATUS CHANGE</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">DATEWISE JUMBO RECEIVED</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">DATEWISE ROLLS ISSUED</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">READY TO DESPATCH</a></li>
                </ul>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle collapsed" href="" id="mastersDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"> <span class="fw-bold">Quality</span> </a>
                <ul class="dropdown-menu" aria-labelledby="mastersDropdown">
                    <li><a class="dropdown-item sidebarList" href="#">ROLL STATUS CHANGE</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">HOLD ROLL STOCK</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">QC SHIFT REPORT</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">MINIMUM STOCK</a></li>
                </ul>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle collapsed" href="" id="mastersDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"> <span class="fw-bold">Sale</span> </a>
                <ul class="dropdown-menu" aria-labelledby="mastersDropdown">
                    <li><a class="dropdown-item sidebarList" href="#">NEW ORDER</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">NEW PACKING LIST</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">NEW INVOICE</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">CURRENT STOCK</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">DATEWISE RECEIVED ROLLS</a></li>
                </ul>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle collapsed" href="" id="mastersDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"> <span class="fw-bold">Store</span> </a>
                <ul class="dropdown-menu" aria-labelledby="mastersDropdown">
                    <li><a class="dropdown-item sidebarList" href="#">MR Entry</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Plant Return MRN</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Issue Entry</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Returnable Gatepass</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Non-Returnable Gatepass</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">MRN Register</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Issue Register</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Stock</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Pending Indent</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Pending Order</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Minimum Stock Level</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Opening/Received/issue/closing</a></li>
                </ul>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link dropdown-toggle collapsed" href="" id="mastersDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"> <span class="fw-bold">Masters</span> </a>
                <ul class="dropdown-menu" aria-labelledby="mastersDropdown">
                    <li><a class="dropdown-item sidebarList" href="#">Item Master</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Unit Master</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Department Master</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">User Master</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Party Master</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">City Master</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">State Master</a></li>
                    <li><a class="dropdown-item sidebarList" href="#">Class Master</a></li>
                    <!-- Add more items as needed -->
                </ul>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0 sidebarList" id="sidebarToggle">
                </button>
            </div>
        </ul>
    </div>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your custom JavaScript -->
    <script>
    $(document).ready(function() {
        $("#sidebarToggle").on("click", function() {
            $("#accordionSidebar").toggleClass("toggled");
        });
    });
    </script>
</body>

</html>