<?php include 'config.php' ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <style>
    input {
        width: 60%;
    }

    #utm-width {
        width: 25%;
    }

    #utd-width {
        width: 25%
    }

    #input-date {
        width: 95%;
    }

    #sidebar {
        width: 20%;
    }

    #main-content {
        width: 100%;
    }

    #just {
        height: 35px;
    }

    #area {
        height: 20px;
    }

    #belowTableHeight {
        height: 200px;
    }

    #below-input {
        border: none;
    }

    .bg-blue {
        background-color: #6491e3 !important;
    }

    .time-field,
    #utdTotal {
        border: none;
    }

    .totalLine {
        font-weight: 700;
    }

    /* Hide number input arrows */
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
}

input[type=number] {
    -moz-appearance: textfield; /* Firefox */
}

    </style>
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
                                    Base Line Add View
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <!-- 1st Form -->
                            <form action="" method="POST">
                                <div class="container">

                                </div>
                                <div class="row">
                                    <div class="">
                                        <label for="">DATE:</label>
                                        <input class="ps-3 pe-4 fw-bold text-center top-date" type="date"
                                            id="input-date" name="date" value="<?php echo date('Y-m-d'); ?>"
                                            onchange="filterTable()">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="table-responsive table-hover">
                                            <table class="table">
                                                <thead class="bg-blue text-light">
                                                    <th>Time Description</th>
                                                    <th id="utd-width">Used time of date</th>
                                                    <th>Time of %</th>
                                                    <th id="utm-width">Used time of Month</th>
                                                    <th>Time of %</th>
                                                </thead>

                                                <tr>
                                                    <td class="bg-blue text-light px-1 text-left  fs-6"><label
                                                            for="">Plant Utilisation
                                                            Time:</label>
                                                    </td>
                                                    <td>
                                                    <input type="number" id="reportPut" name="plant_util" data-related="top1" oninput="calculatePercentage(this)" min="0">

                                                    </td>
                                                    <td>
                                                        <input type="text" class="time-field" id="top1" name="top1"
                                                            required readonly>
                                                    </td>
                                                    <?php
                                                        // Example PHP code to get the total sum and count
                                                        $month = date('Y-m'); // Assuming you want to fetch for the current month
                                                        $query = "SELECT SUM(plant_util) as total_plant_util, COUNT(CASE WHEN plant_util > 0 THEN 1 END) as count_plant_util 
                                                                FROM time2 
                                                                WHERE DATE_FORMAT(manual_date, '%Y-%m') = '$month'";

                                                        $result = $config->query($query);
                                                        $row = $result->fetch_assoc();

                                                        $totalPlantUtil = $row['total_plant_util'];
                                                        $countPlantUtil = $row['count_plant_util'];

                                                        if ($countPlantUtil > 0) {
                                                            $utmPlantUtil = ($totalPlantUtil / ($countPlantUtil * 1440)) * 100;
                                                            $formattedUtmPlantUtil = number_format($utmPlantUtil, 2); // Format to 2 decimal places
                                                        } else {
                                                            $formattedUtmPlantUtil = "0.00"; // Default to 0.00 if there are no entries
                                                        }
                                                        ?>
                                                    <td><input type="text" id="" name="utm_plant_util" readonly></td>
                                                    <td><input type="text" id="" name="top_plant_util" readonly></td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td class=" bg-blue text-light px-1 text-left  fs-6"><label
                                                            for="">Non-availability of
                                                            Power:</label>
                                                    </td>
                                                    <td>
                                                        <input type="number" id="reportPower" name="na_power"
                                                            data-related="top2" oninput="calculatePercentage(this)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="time-field" id="top2" name="top2"
                                                            required readonly>
                                                    </td>
                                                    <?php
                                                        // Example PHP code to get the total sum and count
                                                        $month = date('Y-m'); // Assuming you want to fetch for the current month
                                                        $query = "SELECT SUM(na_power) as total_na_power, COUNT(CASE WHEN na_power > 0 THEN 1 END) as count_na_power 
                                                                FROM time2 
                                                                WHERE DATE_FORMAT(manual_date, '%Y-%m') = '$month'";

                                                        $result = $config->query($query);
                                                        $row = $result->fetch_assoc();

                                                        $totalNaPower = $row['total_na_power'];
                                                        $countNaPower = $row['count_na_power'];

                                                        if ($countNaPower > 0) {
                                                            $utmNaPower = number_format(($totalNaPower / ($countNaPower * 1440)) * 100, 2);
                                                            // $formattedUtmResult = number_format($utmResult, 2); // Format to 2 decimal places
                                                        } else {
                                                            $utmNaPower = "0.00"; // Default to 0.00 if there are no entries
                                                        }
                                                        ?>
                                                    <td><input type="text" id="" name="utm_na_power" readonly></td>
                                                    <td><input type="text" id="" name="top_na_power" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class=" bg-blue text-light px-1 text-left  fs-6"><label
                                                            for="">Electrical
                                                            Maintenance:</label>
                                                    </td>
                                                    <td>
                                                        <input type="number" id="reportElectrical" name="elec_main"
                                                            data-related="top3" oninput="calculatePercentage(this)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="time-field" id="top3" name="top3"
                                                            required readonly>
                                                    </td>
                                                    <?php
                                                        // Example PHP code to get the total sum and count
                                                        $month = date('Y-m'); // Assuming you want to fetch for the current month
                                                        $query = "SELECT SUM(elec_main) as total_elec_main, COUNT(CASE WHEN elec_main > 0 THEN 1 END) as count_elec_main 
                                                                FROM time2 
                                                                WHERE DATE_FORMAT(manual_date, '%Y-%m') = '$month'";

                                                        $result = $config->query($query);
                                                        $row = $result->fetch_assoc();

                                                        $totalElecMain = $row['total_elec_main'];
                                                        $countElecMain = $row['count_elec_main'];

                                                        if ($countElecMain > 0) {
                                                            $utmElecMain = number_format(($totalElecMain / ($countElecMain * 1440)) * 100, 2);
                                                            // $formattedUtmResult = number_format($utmResult, 2); // Format to 2 decimal places
                                                        } else {
                                                            $utmElecMain = "0.00"; // Default to 0.00 if there are no entries
                                                        }
                                                        ?>
                                                    <td><input type="text" id="" name="utm_elec_main" readonly></td>
                                                    <td><input type="text" id="" name="top_elec_main" readonly></td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td class=" bg-blue text-light px-1 text-left  fs-6"><label
                                                            for="">Mechanical
                                                            Maintenance:</label>
                                                    </td>
                                                    <td>
                                                        <input type="number" id="reportMechanical" name="mech_main"
                                                            data-related="top4" oninput="calculatePercentage(this)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="time-field" id="top4" name="top4"
                                                            required readonly>
                                                    </td>
                                                    <?php
                                                        // Example PHP code to get the total sum and count
                                                        $month = date('Y-m'); // Assuming you want to fetch for the current month
                                                        $query = "SELECT SUM(mech_main) as total_mech_main, COUNT(CASE WHEN mech_main > 0 THEN 1 END) as count_mech_main 
                                                                FROM time2 
                                                                WHERE DATE_FORMAT(manual_date, '%Y-%m') = '$month'";

                                                        $result = $config->query($query);
                                                        $row = $result->fetch_assoc();

                                                        $totalMechMain = $row['total_mech_main'];
                                                        $countMechMain = $row['count_mech_main'];

                                                        if ($countMechMain > 0) {
                                                            $utmMechMain = number_format(($totalMechMain / ($countMechMain * 1440)) * 100, 2);
                                                            // $formattedUtmResult = number_format($utmResult, 2); // Format to 2 decimal places
                                                        } else {
                                                            $utmMechMain = "0.00"; // Default to 0.00 if there are no entries
                                                        }
                                                        ?>
                                                    <td><input type="text" id="" name="utm_mech_main" readonly></td>
                                                    <td><input type="text" id="" name="top_mech_main" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class=" bg-blue text-light px-1 text-left  fs-6"><label
                                                            for="">Process Requirement</label>
                                                    </td>
                                                    <td>
                                                        <input type="number" id="reportProReq" name="proc_req"
                                                            data-related="top5" oninput="calculatePercentage(this)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="time-field" id="top5" name="top5"
                                                            required readonly>
                                                    </td>
                                                    <?php
                                                        // Example PHP code to get the total sum and count
                                                        $month = date('Y-m'); // Assuming you want to fetch for the current month
                                                        $query = "SELECT SUM(proc_req) as total_proc_req, COUNT(CASE WHEN proc_req > 0 THEN 1 END) as count_proc_req 
                                                                FROM time2 
                                                                WHERE DATE_FORMAT(manual_date, '%Y-%m') = '$month'";

                                                        $result = $config->query($query);
                                                        $row = $result->fetch_assoc();

                                                        $totalProReq = $row['total_proc_req'];
                                                        $countProReq = $row['count_proc_req'];

                                                        if ($countProReq > 0) {
                                                            $utmProcReq = number_format(($totalProReq / ($countProReq * 1440)) * 100, 2);
                                                            // $formattedUtmResult = number_format($utmResult, 2); // Format to 2 decimal places
                                                        } else {
                                                            $utmProcReq = "0.00"; // Default to 0.00 if there are no entries
                                                        }
                                                        ?>
                                                    <td><input type="text" id="" name="utm_proc_req" readonly></td>
                                                    <td><input type="text" id="" name="top_proc_req" readonly></td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td class=" bg-blue text-light px-1 text-left  fs-6"><label
                                                            for="">Planned Shutdown:</label></td>
                                                    <td>
                                                        <input type="number" id="reportShutdown" name="plan_shut"
                                                            data-related="top6" oninput="calculatePercentage(this)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="time-field" id="top6" name="top6"
                                                            required readonly>
                                                    </td>
                                                    <?php
                                                        // Example PHP code to get the total sum and count
                                                        $month = date('Y-m'); // Assuming you want to fetch for the current month
                                                        $query = "SELECT SUM(plan_shut) as total_plan_shut, COUNT(CASE WHEN plan_shut > 0 THEN 1 END) as count_plan_shut 
                                                                FROM time2 
                                                                WHERE DATE_FORMAT(manual_date, '%Y-%m') = '$month'";

                                                        $result = $config->query($query);
                                                        $row = $result->fetch_assoc();

                                                        $totalPlantShut = $row['total_plan_shut'];
                                                        $countPlantShut = $row['count_plan_shut'];

                                                        if ($countPlantShut > 0) {
                                                            $utmPlantShut = number_format(($totalPlantShut / ($countPlantShut * 1440)) * 100, 2);
                                                            // $formattedUtmResult = number_format($utmResult, 2); // Format to 2 decimal places
                                                        } else {
                                                            $utmPlantShut = "0.00"; // Default to 0.00 if there are no entries
                                                        }
                                                        ?>
                                                    <td><input type="text" id="" name="utm_plan_shut" readonly></td>
                                                    <td><input type="text" id="" name="top_plan_shut" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class=" bg-blue text-light px-1 text-left  fs-6"><label
                                                            for="">Other/Miscellaneous:</label></td>
                                                    <td>
                                                        <input type="number" id="reportOther" name="other_misc"
                                                            data-related="top7" oninput="calculatePercentage(this)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="time-field" id="top7" name="top7"
                                                            required readonly>
                                                    </td>
                                                    <?php
                                                        // Example PHP code to get the total sum and count
                                                        $month = date('Y-m'); // Assuming you want to fetch for the current month
                                                        $query = "SELECT SUM(other_misc) as total_other_misc, COUNT(CASE WHEN other_misc > 0 THEN 1 END) as count_other_misc 
                                                                FROM time2 
                                                                WHERE DATE_FORMAT(manual_date, '%Y-%m') = '$month'";

                                                        $result = $config->query($query);
                                                        $row = $result->fetch_assoc();

                                                        $totalOtherMisc = $row['total_other_misc'];
                                                        $countOtherMisc = $row['count_other_misc'];

                                                        if ($countOtherMisc > 0) {
                                                            $utmOtherMisc = number_format(($totalOtherMisc / ($countOtherMisc * 1440)) * 100, 2);
                                                            // $formattedUtmResult = number_format($utmResult, 2); // Format to 2 decimal places
                                                        } else {
                                                            $utmOtherMisc = "0.00"; // Default to 0.00 if there are no entries
                                                        }
                                                        ?>
                                                    <td><input type="text" id="" name="utm_other_misc" readonly></td>
                                                    <td><input type="text" id="" name="top_other_misc" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td class=" bg-blue text-light px-1 text-left  fs-6"><label
                                                            for="">Non-Space PUT:</label></td>
                                                    <td>
                                                        <input type="number" id="reportNonSpace" name="non_space"
                                                            data-related="top8" oninput="calculatePercentage(this)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="time-field" id="top8" name="top8"
                                                            required readonly>
                                                    </td>
                                                    <?php
                                                        // Example PHP code to get the total sum and count
                                                        $month = date('Y-m'); // Assuming you want to fetch for the current month
                                                        $query = "SELECT SUM(non_space) as total_non_space, COUNT(CASE WHEN non_space > 0 THEN 1 END) as count_non_space 
                                                                FROM time2 
                                                                WHERE DATE_FORMAT(manual_date, '%Y-%m') = '$month'";

                                                        $result = $config->query($query);
                                                        $row = $result->fetch_assoc();

                                                        $totalNonSpace = $row['total_non_space'];
                                                        $countNonSpace = $row['count_non_space'];

                                                        if ($countNonSpace > 0) {
                                                            $utmNonSpace = number_format(($totalNonSpace / ($countNonSpace * 1440)) * 100, 2);
                                                            // $formattedUtmResult = number_format($utmResult, 2); // Format to 2 decimal places
                                                        } else {
                                                            $utmNonSpace = "0.00"; // Default to 0.00 if there are no entries
                                                        }
                                                        ?>
                                                    <td><input type="text" id="" name="utm_non_space" readonly></td>
                                                    <td><input type="text" id="" name="top_non_space" readonly></td>
                                                </tr>
                                                <tr class="totalLine">
                                                    <td
                                                        class="fw-bold text-center fs-4 bg-blue text-light px-1 text-left  fs-6">
                                                        <label for="">Total:</label>
                                                    </td>
                                                    <td>
                                                        <input class="fw-bold" type="number" id="utdTotal"
                                                            name="utdTotal" data-related="top9"
                                                            onchange="calculatePercentage(this)" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="time-field" id="top9" name="top9"
                                                            required readonly>
                                                    </td>
                                                    <?php
                                                    $utmTotal = ($totalPlantUtil + $totalNaPower + $totalElecMain + $totalMechMain + $totalProReq + $totalPlantShut +
                                                    $totalOtherMisc + $totalNonSpace);
                                                    $topTotal = ($formattedUtmPlantUtil + $utmNaPower + $utmElecMain + $utmMechMain + $utmProcReq + $utmPlantShut +
                                                    $utmOtherMisc + $utmNonSpace);
                                                    ?>
                                                    <td><input type="text" id="" name="utm_total"
                                                            value='<?php echo $utmTotal; ?>' readonly></td>
                                                    <td><input type="text" id="" name="top2"
                                                            value='<?php echo $topTotal; ?>%' readonly></td>
                                                </tr>
                                                <!-- Add more rows for additional form fields -->
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="table-responsive table-hover">
                                            <table class="table">
                                                <div class="bg-blue " id="just"></div>
                                                <tr class="bg-light">
                                                    <td class="text-left text-light fs-6 bg-blue"><label for="">No. of
                                                            Shift in
                                                            Operation:</label>
                                                    </td>
                                                    <td class=""><input type="text" id="" name="sop"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left text-light fs-6 bg-blue"><label for="">LINE
                                                            LUMPS:</label>
                                                    </td>
                                                    <td class=""><input type="text" id="" name="line_lumps">
                                                    </td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td class="text-left text-light fs-6 bg-blue"><label for="">RPG
                                                            Prod. (Erema):</label>
                                                    </td>
                                                    <td class=""><input type="text" id="" name="rgp_pro"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left text-light fs-6 bg-blue"><label
                                                            for="">Remark-1:</label>
                                                    </td>
                                                    <td class=""><textarea name="rmk1" id="area" cols="30"
                                                            rows="10"></textarea>
                                                    </td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <td class="text-left text-light fs-6 bg-blue"><label
                                                            for="">Remark-2:</label>
                                                    </td>
                                                    <td class=""><textarea name="rmk2" id="area" cols="30"
                                                            rows="10"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left text-light fs-6 bg-blue"><label
                                                            for="">Remark-3:</label></td>
                                                    <td class=""><textarea name="rmk3" id="area" cols="30"
                                                            rows="10"></textarea>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="data-table">
                                        <thead class="thead bg-blue text-light">
                                            <tr>
                                                <th>Product</th>
                                                <th>Jumbo</th>
                                                <th>Scrap</th>
                                                <th>Gross </th>
                                                <th>Width </th>
                                                <th>PUT</th>
                                                <th>POWER FAIL</th>
                                                <th>ELE.MAIN.</th>
                                                <th>MECH MAIN.</th>
                                                <th>PROC REQ.</th>
                                                <th>PLANNED SHUTDOWN</th>
                                                <th>OTHER</th>
                                                <th>NON SPACE PUT</th>
                                                <th>SPEED</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="type" class="pt-2 pb-2" required>

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
                                                <td><input type="number" name="jumbo" class="form-control" required>
                                                </td>
                                                <td><input type="number" name="scrap" class="form-control" required>
                                                </td>
                                                <td><input type="number" name="gross" class="form-control">
                                                </td>
                                                <td><input type="number" name="width" class="form-control">
                                                </td>
                                                <td><input type="number" name="put" class="form-control"></td>
                                                <td><input type="number" name="power_fail" class="form-control"></td>
                                                <td><input type="number" name="elec" class="form-control"></td>
                                                <td><input type="number" name="mech" class="form-control"></td>
                                                <td><input type="number" name="process_req" class="form-control"></td>
                                                <td><input type="number" name="plan_shutdown" class="form-control"></td>
                                                <td><input type="number" name="other" class="form-control">
                                                </td>
                                                <td><input type="number" name="ns_put" class="form-control">
                                                </td>
                                                <td><input type="number" name="speed" class="form-control">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-warning text-light" onclick="addRow()">Add
                                    row</button>
                                <button type="submit" class="btn btn-success text-light" name="submit">Submit</button>
                            </form>
                        </div>

                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- Code for submition of upper table-->
<?php
if (isset($_POST['submit'])) {
    // Include database configuration
    include 'config.php';

    // Sanitize and assign variables for time2 table
    $manual_date = mysqli_real_escape_string($config, $_POST['date']);
    $plant_util = isset($_POST['plant_util']) ? mysqli_real_escape_string($config, $_POST['plant_util']) : '';
    $na_power = isset($_POST['na_power']) ? mysqli_real_escape_string($config, $_POST['na_power']) : '';
    $elec_main = isset($_POST['elec_main']) ? mysqli_real_escape_string($config, $_POST['elec_main']) : '';
    $mech_main = isset($_POST['mech_main']) ? mysqli_real_escape_string($config, $_POST['mech_main']) : '';
    $proc_req = isset($_POST['proc_req']) ? mysqli_real_escape_string($config, $_POST['proc_req']) : '';
    $plan_shut = isset($_POST['plan_shut']) ? mysqli_real_escape_string($config, $_POST['plan_shut']) : '';
    $other_misc = isset($_POST['other_misc']) ? mysqli_real_escape_string($config, $_POST['other_misc']) : '';
    $non_space = isset($_POST['non_space']) ? mysqli_real_escape_string($config, $_POST['non_space']) : '';
    $sop = mysqli_real_escape_string($config, $_POST['sop']);
    $line_lumps = mysqli_real_escape_string($config, $_POST['line_lumps']);
    $rgp_pro = mysqli_real_escape_string($config, $_POST['rgp_pro']);
    $rmk1 = mysqli_real_escape_string($config, $_POST['rmk1']);
    $rmk2 = mysqli_real_escape_string($config, $_POST['rmk2']);
    $rmk3 = mysqli_real_escape_string($config, $_POST['rmk3']);

    // Sanitize and assign variables for prod2 table
    $type = isset($_POST['type']) ? mysqli_real_escape_string($config, $_POST['type']) : '';
    $jumbo = isset($_POST['jumbo']) ? mysqli_real_escape_string($config, $_POST['jumbo']) : '';
    $scrap = isset($_POST['scrap']) ? mysqli_real_escape_string($config, $_POST['scrap']) : '';
    $gross = isset($_POST['gross']) ? mysqli_real_escape_string($config, $_POST['gross']) : '';
    $width = isset($_POST['width']) ? mysqli_real_escape_string($config, $_POST['width']) : '';
    $put = isset($_POST['put']) ? mysqli_real_escape_string($config, $_POST['put']) : '';
    $power_fail = isset($_POST['power_fail']) ? mysqli_real_escape_string($config, $_POST['power_fail']) : '';
    $elec = isset($_POST['elec']) ? mysqli_real_escape_string($config, $_POST['elec']) : '';
    $mech = isset($_POST['mech']) ? mysqli_real_escape_string($config, $_POST['mech']) : '';
    $process_req = isset($_POST['process_req']) ? mysqli_real_escape_string($config, $_POST['process_req']) : '';
    $plan_shutdown = isset($_POST['plan_shutdown']) ? mysqli_real_escape_string($config, $_POST['plan_shutdown']) : '';
    $other = isset($_POST['other']) ? mysqli_real_escape_string($config, $_POST['other']) : '';
    $ns_put = isset($_POST['ns_put']) ? mysqli_real_escape_string($config, $_POST['ns_put']) : '';
    $speed = isset($_POST['speed']) ? mysqli_real_escape_string($config, $_POST['speed']) : '';

    // Insert data into time2 table
    $sql1 = "INSERT INTO time2 (manual_date, plant_util, na_power, elec_main, mech_main, proc_req, plan_shut, other_misc, non_space, sop, line_lumps, rgp_pro, rmk1, rmk2, rmk3)
            VALUES ('$manual_date', '$plant_util', '$na_power', '$elec_main', '$mech_main', '$proc_req', '$plan_shut', '$other_misc', '$non_space', '$sop', '$line_lumps', '$rgp_pro', '$rmk1', '$rmk2', '$rmk3')";

    // Insert data into prod2 table
    $sql2 = "INSERT INTO prod2 (manual_date, type, jumbo, scrap, gross, width, put, power_fail, elec, mech, process_req, plan_shutdown, other, ns_put, speed)
            VALUES ('$manual_date', '$type', '$jumbo', '$scrap', '$gross', '$width', '$put', '$power_fail', '$elec', '$mech', '$process_req', '$plan_shutdown', '$other', '$ns_put', '$speed')";

    // Execute both queries
    if (mysqli_query($config, $sql1) && mysqli_query($config, $sql2)) {
        // If successful, redirect to a success page to avoid form resubmission
        echo "<script>alert('Data has been inserted')</script>";
            // header("Location: admin/jumbo_new.php");
            // exit(); // Make sure to exit after the redirect to prevent further execution
        }
        elseif ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          } else {
            echo "<script>alert('Error occurred')</script>";
    }
}
?>

<?php include 'footer.php'?>

<script>
function calculatePercentage(element) {

    // To get the percentage onInput 

    const utdValue = parseFloat(element.value);
    const relatedFieldId = element.getAttribute('data-related');
    const relatedField = document.getElementById(relatedFieldId);
    const utdTotalInput = document.getElementById('utdTotal');

    if (!isNaN(utdValue)) {
        const percentage = (utdValue * 100) / 1440;
        relatedField.value = percentage.toFixed(2) + '%';
    } else {
        relatedField.value = '';
    }

    // TOTAL - Logic to add all used of time fields

    const utdInputs = document.querySelectorAll("input[id^='report']");

    let total = 0;
    utdInputs.forEach(utdInput => {
        const utdValue = parseFloat(utdInput.value);
        if (!isNaN(utdValue)) {
            total += utdValue;
        } else {
            utdTotal.value = '';
        }
    });
    // TOTAL LIMIT

    const maxLimit = 1440;
    let confirmShown = false; 

    if (total > maxLimit) {
        if (!confirmShown) {
            let proceed = confirm('Total value cannot exceed 1440. Wanna proceed?');
            if (proceed) {
                confirmShown = true; // Set flag to true after user confirms
            } else {
                confirmShown = false; // Reset the flag if the user clicks "No"
                return; // Exit the function if the user chooses not to proceed
            }
        }
    }

    // Time of % - Percentage calculation

    if (!isNaN(total)) {
        utdTotalInput.value = total.toFixed(2);
        document.getElementById('top9').value = ((total * 100) / 1440).toFixed(2) + '%';
    } else {
        utdTotalInput.value = '';
        document.getElementById('top9').value = '';
    }


}

// Function for max 5 rows to be added

let maxRows = 5;
let currentRows = 1; // Start with 1 row

function addRow() {
    if (currentRows < maxRows) {
        let table = document.getElementById("data-table").getElementsByTagName('tbody')[0];
        let lastRow = table.rows[table.rows.length - 1];
        let newRow = lastRow.cloneNode(true);

        // Clear the values in the new row
        let inputs = newRow.getElementsByTagName('input');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        }

        let selects = newRow.getElementsByTagName('select');
        for (let i = 0; i < selects.length; i++) {
            selects[i].selectedIndex = 0;
        }

        table.appendChild(newRow);
        currentRows++;

        // Disable the button if max rows reached
        if (currentRows >= maxRows) {
            document.getElementById("addRowButton").disabled = true;
        }
    } else {
        alert('5 rows has been inserted.');
    }
}


// Using PHP to render the HTML
document.getElementsByName('utm_plant_util')[0].value = '<?php echo $totalPlantUtil ; ?>';
document.getElementsByName('top_plant_util')[0].value = '<?php echo $formattedUtmPlantUtil; ?>%';

document.getElementsByName('utm_na_power')[0].value = '<?php echo $totalNaPower; ?>';
document.getElementsByName('top_na_power')[0].value = '<?php echo $utmNaPower; ?>%';

document.getElementsByName('utm_elec_main')[0].value = '<?php echo $totalElecMain; ?>';
document.getElementsByName('top_elec_main')[0].value = '<?php echo $utmElecMain; ?>%';

document.getElementsByName('utm_mech_main')[0].value = '<?php echo $totalMechMain; ?>';
document.getElementsByName('top_mech_main')[0].value = '<?php echo $utmMechMain; ?>%';

document.getElementsByName('utm_proc_req')[0].value = '<?php echo $totalProReq; ?>';
document.getElementsByName('top_proc_req')[0].value = '<?php echo $utmProcReq; ?>%';

document.getElementsByName('utm_plan_shut')[0].value = '<?php echo $totalPlantShut; ?>';
document.getElementsByName('top_plan_shut')[0].value = '<?php echo $utmPlantShut; ?>%';

document.getElementsByName('utm_other_misc')[0].value = '<?php echo $totalOtherMisc; ?>';
document.getElementsByName('top_other_misc')[0].value = '<?php echo $utmOtherMisc; ?>%';

document.getElementsByName('utm_non_space')[0].value = '<?php echo $totalNonSpace; ?>';
document.getElementsByName('top_non_space')[0].value = '<?php echo $utmNonSpace; ?>%';
</script>