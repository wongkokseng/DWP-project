<?php 
  session_start(); 
  if (!isset($_SESSION['admin'])) {
  	header('location: mainpage.html');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="view product.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="#">Admin Panel - Flash Food Delivery</a>
        </div>
        <ul>
            <li><a href="#">Orders</a></li>
            <li><a href="view_products.html">Products</a></li>
            <li><a href="#">Customers</a></li>
            <li><a href="#">Staff</a></li>
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
        <div class="product-list" id="productList">
            <!-- Products will be displayed here -->
        </div>
        <a href="add_product.php" class="add-product-btn">Add New Product</a>
    </div>
    <script src="view product.js"></script>
</body>
</html>

