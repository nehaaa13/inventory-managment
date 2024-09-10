<?php include 'config.php' ?>
<html lang="en">
<style>
.bg-blue {
    background-color: #6491e3 !important;
}

.container {
    border: 2px solid skyblue;
}

.input-size {
    width: 10%;
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
                </div>
                <div id="main-content">
                    <main class="container">
                        <div class="row">
                            <!-- HEADING -->
                            <div>
                                <h5
                                    class="text-center mb-4 mt-2 text-uppercase text-shadow text-primary text-decoration-underline">
                                    Slitting Rolls View
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <!-- 1st Form -->
                            <form action="" method="POST">
                                <div class="container">
                                    <div class="row text-left">
                                        <div class="col-3">
                                            <label for="">DATE:</label>
                                            <input class="ps-3 pe-4 fw-bold text-center top-date" type="date"
                                                id="input-date" name="date" value="<?php echo date('Y-m-d'); ?>"
                                                onchange="filterTable()">
                                            <!--<input class="ps-3 pe-4 fw-bold text-center" type="date" id="input-date"
                                            name="date">-->
                                        </div>
                                        <div class="col-3">
                                            <label class="fw-bold" for="">Shift :</label>
                                            <select name="shift" class="py-1 px-4 jumbo-input" required>
                                                <!-- <option value="">Select...</option> -->
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="G">G</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label class="fw-bold" for="">Slitter Code :</label>
                                            <select name="shift" class="py-1 px-4 jumbo-input" required>
                                                <!-- <option value="">Select...</option> -->
                                                <option value="P1">P1</option>
                                                <option value="S1">S1</option>
                                                <option value="S4">S4</option>
                                                <option value="A1">A1</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label class="fw-bold" for="">Operator Code :</label>
                                            <select name="shift" class="py-1 px-4 jumbo-input" required>
                                                <!-- <option value="">Select...</option> -->
                                                <option value="LH">LH</option>
                                                <option value="ST">ST</option>
                                                <option value="BC">BC</option>
                                                <option value="DN">DN</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row text-left">
                                            <!--<div class="">-->
                                            <div class="col-md-6">
                                            <label class="fw-bold" for="">Parent Roll No.:</label>
                                            <select name="type" class="py-1 px-6">
                                                <?php
                                                    $sql = "SELECT DISTINCT jumbo, type, width,length, nweight,grade FROM Jumbo_entry";
                                                    $result = mysqli_query($config, $sql);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='" . $row['jumbo'], $row['type'], $row['width'], $row['length'], $row['nweight'], $row['grade'] . "'>" . $row['jumbo'],' - ', $row['type'],' - ',$row['width'], ' - ', $row['length'], ' - ', $row['nweight'], ' - ', $row['grade'] . "</option>";
                                                            }
                                                            } else {
                                                                echo "<option>N o options found</option>";
                                                            }
                                                    ?>
                                            </select>
                                            </div>
                                            <div class="col-md-6">

                                                <label class="fw-bold" for="">ADD Roll No.:</label>
                                                <select name="type" class="py-1 px-4">
                                                    <?php
                                                $sql = "SELECT DISTINCT jumbo, type, width, length, nweight, grade FROM Jumbo_entry";
                                                $result = mysqli_query($config, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value='" . $row['jumbo'], $row['type'], $row['width'], $row['length'], $row['nweight'], $row['grade'] . "'>" . $row['jumbo'],' - ', $row['type'],' - ',$row['width'], ' - ',$row['length'], ' - ', $row['nweight'], ' - ', $row['grade'] . "</option>";
                                                        }
                                                        } else {
                                                            echo "<option>N o options found</option>";
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" ">
                                            <!--<div class="">-->
                                            <label class="fw-bold" for="">Program :</label>
                                            <input class="ps-3 pe-4 ext-left" type="text" id="input-text" name="text">
                                            <label class="fw-bold" for="">Input weight :</label>
                                            <input class="ps-3 pe-4 ext-left" type="text" id="input-text" name="text">
                                        </div>

                                    </div>
                                </div>
                               
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="data-table">
                                        <thead class="thead bg-blue text-light">
                                            <tr>
                                                <th>Product</th>
                                                <th>Sr_code</th>
                                                <th>Width</th>
                                                <th>width_In </th>
                                                <th>SN</th>
                                                <th>Joints</th>
                                                <th>Length</th>
                                                <th>Gweight</th>
                                                <th>core_wt</th>
                                                <th>Weight</th>
                                                <th>Grade</th>
                                                <th>Remark</th>
                                            </tr>
                                        </thead>
                                        <td><input type="text" name="product" class="form-control "></td>
                                        <td><input type="text" name="sr_code" class="form-control "></td>
                                        <td><input type="text" name="width" class="form-control "></td>
                                        <td><input type="text" name="width_in" class="form-control "></td>
                                        <td><input type="text" name="sn" class="form-control "></td>
                                        <td><input type="text" name="joints" class="form-control "></td>
                                        <td><input type="text" name="length" class="form-control "></td>
                                        <td><input type="text" name="gweight" class="form-control "></td>
                                        <td><input type="text" name="core_wt" class="form-control "></td>
                                        <td><input type="text" name="weight" class="form-control "></td>
                                        <td><input type="text" name="grade" class="form-control "></td>
                                        <td><input type="text" name="remark" class="form-control "></td>

                                    </table>
                                    <div class="row">
                                        <div class="col-md-7"></div>
                                        <div class="col-md-5">
                                            <label class="me-1 ms-5" for="">Total :</label><input type="text" id=" "
                                                name="trim">
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="fw-bold" for="">Trim :</label>
                                                <input class="input-size" type="text" id=" " name="trim">
                                                <label class="fw-bold" for="">Cut :</label>
                                                <input class="input-size" type="text" id=" " name="cut">
                                                <label class="fw-bold" for="">Other :</label>
                                                <input class="input-size" type="text" id=" " name="other">
                                                <label class="fw-bold" for="">Production Scrap :</label>
                                                <input class="input-size" type="text" id=" " name="pscrap">
                                                <label class="fw-bold" for="">Balance :</label>
                                                <input class="input-size" type="text" id="  " name="totscrap">
                                            </div>
                                        </div>


                                    </div>
                                    </select>
                                </div>
                                <tbody>


                        </div>

</body>