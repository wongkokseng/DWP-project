<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accounts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_SESSION['username'];

// Select user data
$sql = "SELECT * FROM customer WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();

// Initialize $check_stmt for later use
$check_stmt = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_phone_number = $_POST['phone_number'];
    $new_password = $_POST['password'];

    // Update the user's information
    $update_sql = "UPDATE customer SET phone_number = ? AND password = ? WHERE username = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sss", $new_phone_number, $new_password, $user);
        
    if ($update_stmt->execute()) {
    // Update session username if username is successfully updated
    header("Location: view_profile.php?status=success");
        exit();
    } else {
        header("Location: view_profile.php?status=error");
        exit();
    }
}

// Close statements and connection
$stmt->close();

// Check if $check_stmt is not null before closing
if ($check_stmt !== null) {
    $check_stmt->close();
}

$conn->close();
?>