<?php
session_start();
$username = $_SESSION['username'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardholder_name = $_POST['cardholder_name'];
    $billing_address = $_POST['billing_address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $card_number = $_POST['card_number'];
    $exp_date = $_POST['exp_date'];
    $cvv = $_POST['cvv'];
    $delivery_address = $_POST['delivery_address'];
    $order_description = $_POST['order_description'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'accounts');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert order data into the database
    $sql = "INSERT INTO `order` (customer_name, order_description, Customer_Address) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('sss', $username, $order_description, $delivery_address);

        if ($stmt->execute()) {
            echo "Order placed successfully!";
            // Redirect to mainpage.php after successful execution
            header("Location: mainpage.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
