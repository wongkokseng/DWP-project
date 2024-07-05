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
    <title>Single Product Page Design</title>
    <link rel="stylesheet" href="product details style.css">
    <script>
        function openindex(){
            window.location.href='mainpage.php';
        }
    </script>
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
                    <a href="profile.php">View Profile</a>
                    <form method="POST" action="logout.php" style="margin: 0;">
                        <input type="hidden" name="action" value="logout">
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="main-wrap">
        <div class="product">
            <div class="image">
                <img src="" id="productImg" alt="">
            </div>
            <div class="product-details">
                <div class="details">
                    <h2 id="productName"></h2>
                    <h3 id="productPrice"></h3>
                    <p id="productDescription"></p>
                </div>
                <div class="sub-btn">
                    <button class="submit" onclick="openindex()">Back to Homepage</button>
                </div>
            </div>
        </div>
    </section>

    <script src="product details.js"></script>
</body>
</html>





