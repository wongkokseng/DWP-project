<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username']; // Ensure $_SESSION['username'] is correctly set
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

    // Get Acc_ID from customer table using username
    $acc_id_sql = "SELECT Acc_ID FROM customer WHERE username = ?";
    $acc_id_stmt = $conn->prepare($acc_id_sql);

    if ($acc_id_stmt) {
        $acc_id_stmt->bind_param('s', $username);
        $acc_id_stmt->execute();
        $acc_id_stmt->bind_result($acc_id);
        $acc_id_stmt->fetch();
        $acc_id_stmt->close();
    } else {
        echo "Error: " . $conn->error;
        $conn->close();
        exit();
    }

    // Insert order data into the database
    $sql = "INSERT INTO `order` (customer_name, order_description, Customer_Address) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('sss', $username, $order_description, $delivery_address);

        if ($stmt->execute()) {
            // Insert data into the transaction table
            $tran_sql = "INSERT INTO `transaction` (Acc_ID, cardholder_name, billing_address, city, state, zip_code, card_number, exp_date, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $tran_stmt = $conn->prepare($tran_sql);

            if ($tran_stmt) {
                $tran_stmt->bind_param('issssssss', $acc_id, $cardholder_name, $billing_address, $city, $state, $zip_code, $card_number, $exp_date, $cvv);

                if ($tran_stmt->execute()) {
                    echo "Order and transaction placed successfully!";
                    // Redirect to mainpage.php after successful execution
                    header("Location: mainpage.php");
                    exit();
                } else {
                    echo "Error: " . $tran_sql . "<br>" . $conn->error;
                }

                $tran_stmt->close();
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request"; // Add error handling for invalid requests
}
?>
