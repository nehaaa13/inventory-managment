<?php
include 'config.php';

$date = mysqli_real_escape_string($config, $_GET['date']);
$field = mysqli_real_escape_string($config, $_GET['field']);

$sql = "SELECT $field FROM time2 WHERE manual_date = '$date'";
$result = mysqli_query($config, $sql);

$data = [];
if ($row = mysqli_fetch_assoc($result)) {
    $data[$field] = $row[$field];
}

echo json_encode($data);
?>
