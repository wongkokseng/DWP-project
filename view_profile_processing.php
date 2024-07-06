<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit();
}

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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_phone_number = $_POST['phone_number'];
    $new_password = $_POST['password'];

    // Check if the new username already exists
    $check_sql = "SELECT * FROM customer WHERE username = ? AND username != ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $new_username, $user);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows == 0) {
        // Update the user's information
        $update_sql = "UPDATE customer SET username = ?, phone_number = ?, password = ? WHERE username = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssss", $new_username, $new_phone_number, $new_password, $user);
        
        if ($update_stmt->execute()) {
            $_SESSION['username'] = $new_username; // Update session username
            header("Location: view_profile.php?status=success");
            exit();
        } else {
            header("Location: view_profile.php?status=error");
            exit();
        }
    } else {
        header("Location: view_profile.php?status=username_exists");
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



