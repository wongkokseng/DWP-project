<?php 
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staff_username = $_POST['staff_username'];
    $staff_password = password_hash($_POST['staff_password'], PASSWORD_BCRYPT); // Hash the password for security
    $staff_status = $_POST['staff_status'];

    $sql = "INSERT INTO staff (staff_username, staff_password, staff_status) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $staff_username, $staff_password, $staff_status);

    if ($stmt->execute()) {
        echo "New staff member added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: view_staff.php");
    exit();
}
?>