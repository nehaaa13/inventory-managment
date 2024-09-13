<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumbo List</title>
    <style>
    #main-content {
        width: 100%;
    }

    .width-total {
        margin-left: 45%;
    }

    @media print {
        .print-button {
            display: none;
        }

        /* table {
                border: 1px solid black;
            } */

        th,
        td {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        /* Include the header in the print */
        .header {
            display: block;
        }

    }
    </style>
</head>

<body>
    <?php include 'config.php'; ?>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="header">
                <?php include "header.php"?>
            </div>
            <div class="d-flex">
                <div>
                    <!-- Sidebar -->
                    <?php include 'sidebar.php' ?>
                    <!-- End of Sidebar -->
                </div>
                <div id="main-content">
                    <main class="container">
                        <div class="row">
                            <h5 class="text-primary text-center mt-1 fw-bold">JUMBO ROLL STOCK </h5>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <h6 class="d-inline">As on Date:</h6>
                                <input class="ps-3 pe-4 mb-1 fw-bold text-center top-date" type="date" id="input-date"
                                    name="date" value="<?php echo date('Y-m-d'); ?>" onchange="filterByDate()">
                                <!-- Add Table -->
                                <table id="table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Type/Roll</th>
                                            <th>Date</th>
                                            <th>Jts</th>
                                            <th>Shift</th>
                                            <th>Core No.</th>
                                            <th>Width(mm)</th>
                                            <th>Length(mtr)</th>
                                            <th>Tm</th>
                                            <th>Tw</th>
                                            <th>Weight(kg)</th>
                                            <th>Grade</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    include 'config.php';

                                    // Fetch data from the database
                                    $sql = "SELECT * FROM jumbo_entry ORDER BY type, date";
                                    $result = mysqli_query($config, $sql);

                                    $currentType = '';
                                    $typeWidthTotal = 0;
                                    $rollCount = 0;
                                    $typeWiseTotal = 0;
                                    $totalRolls = 0;

                                    // Check if there are any rows returned
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($currentType != $row['type']) {
                                                if ($currentType != '') {
                                                    echo "<tr ><td colspan='12' >
                                                    <div class='width-total'><b>Width Wise Total</b> = {$typeWidthTotal}, {$rollCount} rolls</div>
                                                    </td></tr>";
                                                    $typeWiseTotal += $typeWidthTotal;
                                                    $typeWidthTotal = 0;
                                                    $rollCount = 0;
                                                }
                                                $currentType = $row['type'];
                                                echo "<tr><td colspan='1'><b>{$currentType}</b></td></tr>";
                                            }

                                            $typeWidthTotal += $row['nweight'];
                                            $rollCount++;
                                            $totalRolls++;

                                            echo "<tr>";
                                            echo "<td> " . $row['jumbo'] . "</td>";
                                            $date = new DateTime($row['manual_date']);
                                            echo "<td>" . $date->format('d-m-Y') . "</td>";
                                            // echo "<td> " . $row['manual_date'] . "</td>";
                                            echo "<td> </td>";
                                            echo "<td> " . $row['shift'] . "</td>";
                                            echo "<td> " . $row['core'] . "</td>";
                                            echo "<td> " . $row['width'] . "</td>";
                                            echo "<td> " . $row['length'] . "</td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td> " . $row['nweight'] . "</td>";
                                            echo "<td> " . $row['grade'] . "</td>";
                                            echo "<td> " . $row['remark'] . "</td>";
                                            echo "</tr>";
                                        }
                                        // Display the last totals
                                        if ($currentType != '') {
                                            echo "<tr><td colspan='12' >
                                            <div class='width-total'><b>Width Wise Total</b> = {$typeWidthTotal}, {$rollCount} rolls</div>
                                            </td></tr>";
                                            $typeWiseTotal += $typeWidthTotal;
                                            echo "<tr><td colspan='12'>
                                            <div class='width-total'><b>Type Wise Total</b> = {$typeWiseTotal}</div>
                                            </td></tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='12'><b>No data found</b></td></tr>";
                                    }
                                    ?>

                                    </tbody>
                                </table>
                                <!-- Print Button -->
                                <div class="print-button">
                                    <button class="btn btn-primary" onclick="printTable()">Print</button>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'?>
</body>

</html>

<script>
function printTable() {
    var extraSectionContents = document.querySelector('.header').innerHTML;
    var containerContents = document.querySelector('.container').innerHTML;

    var printContents = extraSectionContents + containerContents;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

function filterByDate() {
    var selectedDate = document.getElementById('input-date').value;

    // Fetch data from the database based on the selected date
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table").innerHTML = this.responseText;
        }
    };
    xhr.open("GET", "filter_list.php?date=" + selectedDate, true);
    xhr.send();
}
</script>