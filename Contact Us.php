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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactus.css"/>
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
    <div class="contact">
        <div class="container">
            <div class="contact-form">
                <h1>Contact <span>Us</span></h1>
                <p>If you have any inquiries or feedback, feel free to contact us via the following methods. We're here to help!</p>
                <form action="#" method="POST">
                    <h2>Hotline</h2>
                    <p>Our hotline is 012-3456789, you can contact us via phone call or whatsapp for any technical issues or to discuss important matters.</p>
                    <h2>Customer Support Email</h2> 
                    <p>Our email is flashdelivery@gmail.com, you may contact us via email to feedback or ask any question related to our business.</p>  
                </form>
                <a href="mainpage.php" class="back-home">Back Home</a> 
            </div>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.7436995704697!2d102.27353867496792!3d2.249493497730698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1e56b9710cf4b%3A0x66b6b12b75469278!2z6ams5YWt55Sy5aSa5aqS5L2T5aSn5a2m!5e0!3m2!1szh-CN!2smy!4v1718349675886!5m2!1szh-CN!2smy" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</body>
</html>
