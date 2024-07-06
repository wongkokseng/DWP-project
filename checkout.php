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
    <meta http-equiv="X-UA Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
<div class="container">
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
    <div class="checkoutLayout">
        
        
        <div class="returnCart">
            <a href="mainpage.php">keep shopping</a>
            <h1>List Product in Cart</h1>
            <div class="list">

                <div class="item">
                    <img src="asam laksa.webp">
                    <div class="info">
                        <div class="name">asam laksa</div>
                        <div class="price">RM5.3</div>
                    </div>
                    <div class="quantity">5</div>
                    <div class="returnPrice">RM26</div>
                </div>

            </div>
        </div>

        <div class="right">
            <h1>Checkout</h1>

            <div class="form">
        
            <div class="return">
                <div class="row">
                    <div>Total Quantity</div>
                    <div class="totalQuantity">70</div>
                </div>
                <div class="row">
                    <div>Total Price</div>
                    <div class="totalPrice">RM500</div>
                </div>
            </div>
            <a href="payment_form.php" class="buttonCheckout">PROCEED TO CHECKOUT</a>
        </div>
            
    </div>
</div>


<script src="checkout.js"></script>

</body>
</html>