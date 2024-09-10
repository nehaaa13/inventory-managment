<?php include 'config.php' ?>
<html lang="en">
<style>
    .bg-blue {
        background-color: #6491e3 !important;
    }
    .container{
        border: 2px solid skyblue;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?php include "header.php"?>
            <div class="d-flex">
                <div>
                    <!-- Sidebar -->
                    <?php include 'sidebar.php' ?>
                    <!-- End of Sidebar -->
    <main class="container">
        <div class="row">
        <!-- HEADING -->
            <div>
                <h5 class="text-center mb-4 mt-2 text-uppercase text-shadow text-primary text-decoration-underline">Slitting Rolls View</h5>
            </div>
       </div>
    
    <div class="row">
    <!-- 1st Form -->
        <form action="" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <label for="">DATE:</label>
                        <input class="ps-3 pe-4 fw-bold text-center" type="date" id="input-date" name="date">
                    </div>
                        <div class="col-4">
                            <label for="">Shift :</label>
                            <select name="shift" class="py-1 px-5 jumbo-input" required>
                                <!-- <option value="">Select...</option> -->
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="G">G</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Slitter Code :</label>
                                <select name="shift" class="py-1 px-5 jumbo-input" required>
                                    <!-- <option value="">Select...</option> -->
                                    <option value="P1">P1</option>
                                    <option value="S1">S1</option>
                                    <option value="S4">S4</option>
                                    <option value="A1">A1</option>
                                </select>
                        </div>
                        <div class="col-4">
                                <label for="">Operator Code   :</label>
                                <select name="shift" class="py-1 px-5 jumbo-input" required>
                                    <!-- <option value="">Select...</option> -->
                                    <option value="LH">LH</option>
                                    <option value="ST">ST</option>
                                    <option value="BC">BC</option>
                                    <option value="DN">DN</option>
                                </select>
                        </div>


                    </div>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>

        </form>
        </main>


</body>
<html>