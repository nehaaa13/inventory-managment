<?php
include "../config.php";

session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if (isset($_SESSION['user_data'])) {
    $username = $_SESSION['user_data'][1];

    // Retrieve the login history ID from the session
    $loginHistoryID = $_SESSION['login_history_id'];

    // Update the logout time in the database
    $query = "UPDATE user_login_history SET logout_time = current_timestamp() WHERE id = $loginHistoryID AND username = '$username'";
    $result1 = mysqli_query($config, $query);

    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("location: http://localhost/jkm/login.php");
    exit();
} else {
    // Redirect to the login page if the user is not logged in
    header("location: http://localhost/jkm/login.php");
    exit();
}
?>
