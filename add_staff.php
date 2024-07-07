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
    <title>Add Staff</title>
    <link rel="stylesheet" href="add staff.css"/>
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
    <div class="container">
        <h1>Add New Staff Member</h1>
        <form action="add staff process.php" method="post">
            <label for="staff_username">Username:</label>
            <input type="text" id="staff_username" name="staff_username" required>

            <label for="staff_password">Password:</label>
            <input type="password" id="staff_password" name="staff_password" required>

            <label for="staff_status">Status:</label>
            <select id="staff_status" name="staff_status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>

            <input type="submit" value="Add Staff">
        </form>
        <div class="back-link">
            <a href="view staff.php">Back to Staff List</a>
        </div>
    </div>
</body>
</html>

