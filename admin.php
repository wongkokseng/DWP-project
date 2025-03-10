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
    <title>Admin Page - Flash Food Delivery</title>
    <link rel="stylesheet" href="admin.css"/>
</head>
<body>
<header>
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
</header>

<main>
    <h1>Welcome to the Admin Panel</h1>
    <div class="admin-content">
        <p>Here, you can manage your orders, products and accounts.</p>
    </div>
</main>

</body>
</html>
