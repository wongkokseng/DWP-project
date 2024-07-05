<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit();
}

$username = $_SESSION['username'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$billing_address = $_POST['billing_address'];
$delivery_address = $_POST['delivery_address'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];
$city = $_POST['city'];
$cardholder_name = $_POST['cardholder_name'];
$card_number = $_POST['card_number'];
$exp_date = $_POST['exp_date'];
$cvv = $_POST['cvv'];
$order_description = $_POST['order_description'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'your_database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert order data into the database
$sql = "INSERT INTO `order` (customer_name, order_description, Customer_Address, order_status) VALUES (?, ?, ?, 'processing')";

$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $username, $order_description, $delivery_address);

if ($stmt->execute()) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>