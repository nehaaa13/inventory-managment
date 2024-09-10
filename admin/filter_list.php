<style>
.width-total {
    margin-left: 45%;
}
</style>
<table id="table" class="table  table-bordered">
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

$dateFilter = '';
if (isset($_GET['date']) && !empty($_GET['date'])) {
    $dateFilter = $_GET['date'];
}

// Fetch data from the database
$sql = "SELECT * FROM jumbo_entry";
if ($dateFilter) {
    $sql .= " WHERE manual_date = '$dateFilter'";
}
$sql .= " ORDER BY type, date";
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
                echo "<tr><td colspan='12'>
                <div class='width-total'><b>Width Wise Total</b> = {$typeWidthTotal}, {$rollCount} rolls</div></td></tr>";
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
        echo "<td> " . $row['manual_date'] . "</td>";
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
        <div class='width-total'><b>Width Wise Total</b> = {$typeWidthTotal}, {$rollCount} rolls</div></td></tr>";
        $typeWiseTotal += $typeWidthTotal;
        echo "<tr><td colspan='12'>
        <div class='width-total'><b>Type Wise Total</b> = {$typeWiseTotal}</div></td></tr>";
    }
} else {
    echo "<tr><td colspan='12'><b>No data found</b></td></tr>";
}
?>
    </tbody>
</table>