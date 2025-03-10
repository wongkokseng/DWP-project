<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">Flash Food Delivery</div>
        <div class="navbar-links">
            <a href="mainpage.php">Home Page</a>
            <a href="About Us.php">About Us</a>
            <a href="Contact Us.php">Contact Us</a>
            <div class="dropdown">
                <button class="dropbtn">
                    <img src="images/default profile.png" alt="Profile Picture">
                    <?php echo $_SESSION['username']; ?>
                </button>
                <div class="dropdown-content">
                    <a href="view_profile.php">View Profile</a>
                    <form method="POST" action="logout.php" style="margin: 0;">
                        <input type="hidden" name="action" value="logout">
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <header>
            <h1>Choose your food</h1>
            <div class="iconCart">
                <img src="images/icon.png">
                <div class="totalQuantity">0</div>
            </div>
        </header>

        <div class="listProduct">
            <div class="item">
                <img src="images/asam laksa.webp" alt="">
                <h2>CoPilot / Black / Automatic</h2>
                <div class="price">RM5.30</div>
                <button>Add To Cart</button>
                <a href="product details.php">View Product Details</a>
            </div>
        </div>
    </div>

    <div class="cart">
        <h2>CART</h2>
        <div class="listCart">
            <div class="item">
                <img src="images/banana leaf rice.jpg">
                <div class="content">
                    <div class="name">CoPilot / Black / Automatic</div>
                    <div class="price">RM5.20</div>
                </div>
                <div class="quantity">
                    <button>-</button>
                    <span class="value">3</span>
                    <button>+</button>
                </div>
            </div>
        </div>
        <div class="buttons">
            <div class="close">CLOSE</div>
            <div class="checkout">
                <a href="checkout.php">CHECKOUT</a>
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>