<?php 
  session_start(); 
  if (!isset($_SESSION['admin'])) {
  	header('location: mainpage.html');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Customer</title>
    <link rel="stylesheet" href="view pages style.css"/>
</head>
<body>
<div class="navbar">
        <div class="logo">
            <a href="admin.php">Admin Panel - Flash Food Delivery</a>
        </div>
        <ul>
            <li><a href="view order.php">Orders</a></li>
            <li><a href="view customer.php">Customers</a></li>
            <li><a href="view_staff.php">Staff</a></li>
            <div class="dropdown">
                <button class="dropbtn">
                    <img src="images/default profile.png" alt="Profile Picture">
                    <?php echo $_SESSION['admin']; ?>
                </button>
                <div class="dropdown-content">
                    
                    <form method="POST" action="logout.php" style="margin: 0;">
                        <input type="hidden" name="action" value="logout">
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </div>
            </div>
        </ul>
    </div>
    <h1>Customer List</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Acc_ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "root", "", "accounts");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id'];
                    $status = $_POST['status'];
                    $update_sql = "UPDATE customer SET status='$status' WHERE Acc_ID=$id";
                    $conn->query($update_sql);
                }

                $sql = "SELECT * FROM customer";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Acc_ID"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td>";
                        echo "<form method='post' action=''>";
                        echo "<input type='hidden' name='id' value='" . $row["Acc_ID"] . "'>";
                        echo "<select name='status'>";
                        echo "<option value='active'" . ($row["status"] == "active" ? " selected" : "") . ">active</option>";
                        echo "<option value='inactive'" . ($row["status"] == "inactive" ? " selected" : "") . ">inactive</option>";
                        echo "</select>";
                        echo "<input type='submit' value='Update'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
