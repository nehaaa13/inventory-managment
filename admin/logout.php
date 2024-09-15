<?php
include "../config.php";
session_start();

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if (isset($_SESSION['user_data'])) {
    if (isset($_SESSION['user_data'][1])) {
        $username = $_SESSION['user_data'][1];
    } else {
        // Handle error, maybe redirect or show an error message
        $username = '';  // Set a fallback value
    }

    // Check if login history ID is set
    if (isset($_SESSION['login_history_id'])) {
        $loginHistoryID = $_SESSION['login_history_id'];
    } else {
        // Handle error, maybe redirect or show an error message
        $loginHistoryID = 0;  // Set a fallback value
    }

    // Ensure both username and login history ID are valid
    if ($loginHistoryID > 0 && !empty($username)) {
        $query = "UPDATE user_login_history SET logout_time = current_timestamp() WHERE id = ? AND username = ?";
        $stmt = $config->prepare($query);
        $stmt->bind_param('is', $loginHistoryID, $username);
        $stmt->execute();
    } else {
        echo "Invalid login history ID or username.";
    }

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
