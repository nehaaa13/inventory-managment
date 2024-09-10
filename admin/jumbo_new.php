<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Jumbo Entry</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="vendor/css/sb-admin-2.css" rel="stylesheet">
</head>
<style>
#main-content {
    width: 100%;
}

.top-date {
    width: 100%;
}

.table-responsive {
    height: 60%;
    overflow-x: auto;
}

thead {
    background-color: #f1f1f1;
    /* Change as needed */
    position: sticky;
    top: 0;
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}

input.form-control {
    padding: .275rem .45rem;
}
</style>

<!--  Config Connection -->
<?php include 'config.php'; ?>
<div class="container-fluid p-0">
    <div class="row">
        <div>
        <?php include "header.php"?>
        </div>
        <div class="d-flex">
            <div>
                <!-- Sidebar -->
                <?php include 'sidebar.php' ?>
                <!-- End of Sidebar -->
            </div>
            <div id="main-content">
                <main class="container pe-0">
                    <div class="row">
                        <div>
                            <h5 class="text-primary text-center">JUMBO NEW</h5>
                        </div>
                    </div>
                    <div class="row pb-0">
                        <div class="col-md-12">
                            <form method="POST" id="myForm" action="jumbo_new.php" name="form_data">
                                <div class="col-md-12">
                                    <input class="ps-3 pe-4 fw-bold text-center top-date" type="date" id="input-date"
                                        name="date" value="<?php echo date('Y-m-d'); ?>" onchange="filterTable()">
        
                                </div>
                                <div class="table-responsive mt-2 ">
                                    <table id="myTable" class="table-bordered">
                                        <thead class="bg-primary text-light position-sticky">
                                            <tr>
                                                <th class="text-center fs-7 ps-1 pe-1"><label for="">S.No. </label></th>
                                                <th class="text-center fs-7 ps-3 pe-4"><label for="">Jumbo no.</label>
                                                </th>
                                                <th class="text-center fs-7 ps-4 pe-4"><label for="">Type</label></th>
                                                <th class="text-center fs-7 ps-1 pe-2"><label for="">Core No.</label>
                                                </th>
                                                <th class="text-center fs-7 ps-1 pe-1"><label for="">Width</label></th>
                                                <th class="text-center fs-7 ps-2 pe-2"><label for="">Shift</label></th>
                                                <th class="text-center fs-7 "><label for="">In</label></th>
                                                <th class="text-center fs-7 "><label for="">Out</label></th>
                                                <th class="text-center fs-7 ps-2 pe-2"><label for="">Length</label></th>
                                                <th class="text-center fs-7 ps-1 pe-1"><label for="">G.weight</label>
                                                </th>
                                                <th class="text-center fs-7 ps-1 pe-1"><label for="">N.weight</label>
                                                </th>
                                                <th class="text-center fs-7 ps-1 pe-1"><label for="">Grade</label></th>
                                                <th class="text-center fs-7 ps-5 pe-5"><label for="">Remark</label></th>
                                                <!-- Add more columns here -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include 'config.php';

                                                // Fetch data from the database
                                                $sql = "SELECT * FROM bopprod";
                                                $result = mysqli_query($config, $sql);

                                                // Check if there are any rows returned
                                                if (mysqli_num_rows($result) > 0) {
                                                    $serialNumber = 1; // Initialize a counter variable
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";
                                                        echo "<td > " . $serialNumber . "</td>";
                                                        echo "<td> " . $row['sr_code']. "</td>";
                                                        echo "<td> " . $row['prd_code'] . "</td>";
                                                        echo "<td> " . $row['core'] . "</td>";
                                                        echo "<td > " . $row['width'] . "</td>";
                                                        echo "<td > " . $row['shift'] . "</td>";
                                                        // echo "<td class='ps-4 pe-4'> " . $row['in'] . "</td>";
                                                        // echo "<td class='ps-4 pe-4'> " . $row['out'] . "</td>";
                                                            $in = date("H:i", strtotime($row['in']));
                                                        echo "<td >" . $in . "</td>";
                                                            $out = date("H:i", strtotime($row['out']));
                                                        echo "<td >" . $out . "</td>";
                                                        echo "<td > " . $row['length'] . "</td>";
                                                        echo "<td > " . $row['gweight'] . "</td>";
                                                        echo "<td > " . $row['weight'] . "</td>";
                                                        echo "<td > " . $row['grade'] . "</td>";
                                                        echo "<td > " . $row['remark'] . "</td>";
                                                        echo "</tr>";
                                                        $serialNumber++; 
                                                            }
                                                        } else {
                                                            $serialNumber = 1;
                                                                echo "<tr><td class=''> " . $serialNumber . "</td><td colspan='12'><b>No data found</b></td></tr>";
                                                            $serialNumber++;
                                                            }
                                                ?>

                                            <tr>
                                                <?php echo "<td class=''> " . $serialNumber . "</td>"; ?>


                                                <!-- PHP FOR NEXT JUMBO NUMBER -->
                                                <?php 
                                                                    $sql_latest_jumbo = "SELECT sr_code FROM bopprod ORDER BY id DESC LIMIT 1";
                                                                    $result_latest_jumbo = mysqli_query($config, $sql_latest_jumbo);
                                                                    
                                                                    // Initialize the next jumbo number
                                                                    $next_jumbo = 1; // Default to 1 if no records are found
                                                                    
                                                                    if (mysqli_num_rows($result_latest_jumbo) > 0) {
                                                                        $row_latest_jumbo = mysqli_fetch_assoc($result_latest_jumbo);
                                                                        $latest_jumbo = intval($row_latest_jumbo['sr_code']);
                                                                        $next_jumbo = $latest_jumbo + 1; // Increment the latest sr_code number by 1
                                                                    }
                                                                    ?>

                                                <td><input type="number" name="sr_code" class="form-control jumbo-input"
                                                        id="jumboInput" value="<?php echo $next_jumbo; ?>" required>
                                                </td>

                                                <td>
                                                    <select name="type" class="pt-2 pb-2 jumbo-input" required>

                                                        <!-- Deleted class="form-control from above line -->
                                                        <?php
                                                    $sql = "SELECT DISTINCT prd_code FROM product_tbl";
                                                    $result = mysqli_query($config, $sql);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value='" . $row['prd_code'] . "'>" . $row['prd_code'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option>No options found</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </td>
                                                </select>
                                                <td><input type="number" name="core" class="form-control jumbo-input"
                                                        required></td>
                                                <td><input type="number" name="width" class="form-control jumbo-input" title="Limit should be 3000-3500" required min="3000" max="3500"></td>
                                                <td>
                                                    <select name="shift" class="py-2 px-1 jumbo-input" required>
                                                        <!-- <option value="">Select...</option> -->
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                    <!-- <input type="text" name="custom_shift"
                                                        class="form-control jumbo-input" pattern="[A-Za-z]+"
                                                        title="Only alphabetic characters allowed" disabled> -->
                                                </td>
                                                <td><input type="time" name="in" class="form-control jumbo-input"
                                                        step="60" required></td>
                                                <td><input type="time" name="out" class="form-control jumbo-input"
                                                        step="60" required></td>
                                                <td><input type="number" name="length" class="form-control jumbo-input"
                                                        required></td>
                                                <td><input type="number" name="gweight" class="form-control jumbo-input"
                                                        step="0.01" min="0.00" max="9999.99" required></td>
                                                <td><input type="number" name="nweight" class="form-control jumbo-input"
                                                        step="0.01" min="0.00" max="9999.99" required></td>
                                                <td><input type="text" name="grade" class="form-control jumbo-input"
                                                        pattern="[A-Z]+" title="Capital letters allowed" required></td>
                                                <td><input type="text" name="remark" class="form-control jumbo-input"
                                                        pattern="[A-Z]+" title="Capital letters allowed" ></td>
                                                <!-- Add more columns here -->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success"
                                    style="margin:10px">Submit</button>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
<!-- Form Submission -->
<?php 
if (isset($_POST['submit'])) {
    // Handle form submission
    $manual_date = isset($_POST['date']) ? $_POST['date'] : '';
    $jumbo = isset($_POST['sr_code']) ? $_POST['sr_code'] : '';
    // $type = isset($_POST['type']) ? $_POST['type'] : '';
    $type = isset($_POST['type']) ? mysqli_real_escape_string($config, $_POST['type']) : '';
    $core = isset($_POST['core']) ? $_POST['core'] : '';
    $width = isset($_POST['width']) ? $_POST['width'] : '';
    $shift = isset($_POST['shift']) ? $_POST['shift'] : '';
    $in = isset($_POST['in']) ? $_POST['in'] : '';
    $out = isset($_POST['out']) ? $_POST['out'] : '';
    $length = isset($_POST['length']) ? $_POST['length'] : '';
    $gweight = isset($_POST['gweight']) ? $_POST['gweight'] : '';
    $nweight = isset($_POST['nweight']) ? $_POST['nweight'] : '';
    $grade = isset($_POST['grade']) ? $_POST['grade'] : '';
    $remark = isset($_POST['remark']) ? $_POST['remark'] : '';

    $sql_check = "SELECT * FROM bopprod WHERE sr_code = '$sr_code'";
    $result_check = mysqli_query($config, $sql_check);
    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('Jumbo entry already exists')</script>";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO `bopprod`(`manual_date`,`sr_code`,`prd_code`,`core`,`width`,`shift`,`in`,`out`,`length`,`gweight`,`nweight`,`grade`,`remark`) VALUES('$manual_date','$sr_code','$type','$core','$width','$shift','$in','$out','$length','$gweight','$nweight','$grade','$remark')";
        if (mysqli_query($config, $sql)) {
            // Data inserted successfully, redirect to another page
            echo "<script>window.location.reload();</script>";
            // header("Location: admin/jumbo_new.php");
            exit(); // Make sure to exit after the redirect to prevent further execution
        } else {
            echo "<script>alert('Error occurred')</script>";
        }
    }
    
}
?>

<?php include 'footer.php'?>
<script>
function filterTable() {
    var selectedDate = document.getElementById('input-date').value;

    // Fetch data from the database based on the selected date
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("myTable").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "filter_jumbo.php?date=" + selectedDate, true);
    xhr.send();
}
</script>
