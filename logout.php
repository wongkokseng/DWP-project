<?php
session_start();

// Check if the form was submitted and the action is logout
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'logout') {
    // Destroy the session and redirect to the login page
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
    exit();
}
?>
