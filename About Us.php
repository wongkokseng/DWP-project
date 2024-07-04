<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
    <link rel="stylesheet" href="aboutus.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script>
        function openhomepage() {
            window.location.href='index.php';
        }
    </script>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">Flash Food Delivery</div>
        <div class="navbar-links">
            <a href="index.php">Home Page</a>
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
    <section class="about">
        <div class="main">
            <div class="about-text">
                <h1>About Us</h1>
                <h5>Food Delivery Services<span>Fast and Convenient</span></h5>
                <p>At Flash Food Delivery, we take great pride in quickly and conveniently delivering mouthwatering meals to your door. Our staff puts out a lot of effort to make sure you may enjoy the greatest dining experience without having to leave the comforts of your home. We can cater to your needs for breakfast, lunch, dinner, and snacks. Get it now to experience the difference!</p>
                <div class="socials">
                    <h5>Come find us here</h5>
                    <div class="social-icons">
                        <a href="https://www.instagram.com"><img src="socialimage/ig.jpeg" alt="Instagram"></a>
                        <a href="https://www.facebook.com"><img src="socialimage/facebook.jpeg" alt="Facebook"></a>
                        <a href="https://wa.me/1234567890"><img src="socialimage/WhatsApp.jpeg" alt="WhatsApp"></a>
                    </div>
                </div>
            </div>
            <div class="images-grid">
                <div class="image-container">
                    <img src="images/wong kok seng.jpg" alt="Wong Kok Seng" class="small-image">
                </div>
                <div class="image-container">
                    <img src="images/Ng dickwe.jpg" alt="Ng Dickwe" class="small-image">
                </div>
                <div class="image-container">
                    <img src="images/Brandon.jpg" alt="Brandon Tan Min Yao" class="small-image">
                </div>
                <div class="image-container">
                    <img src="images/yee han sen.jpg" alt="Yee Han Sen" class="small-image">
                </div>
            </div>
        </div>
        <button class="home" onclick="openhomepage()">Return to homepage</button>
    </section>
</body>
</html>
