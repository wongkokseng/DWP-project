<?php
session_start();

// Check if the form was submitted and the action is logout
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'logout') {
    if (isset($_SESSION['username'])) {
        // Unset 'username' session variable
        unset($_SESSION['username']);
        
        // Destroy the session
        session_destroy();
        
        // Redirect to the login page for users
        header("location: mainpage.html");
        exit();
    } elseif (isset($_SESSION['admin'])) {
        // Unset 'admin' session variable
        unset($_SESSION['admin']);
        
        // Destroy the session
        session_destroy();
        
        // Redirect to the admin login page for staff
        header("location: adminlogin.php");
        exit();
    } else {
        // If neither session variable is set, just destroy the session
        session_destroy();
        
        // Redirect to a default page
        header("location: mainpage.html");
        exit();
    }
}
?>

