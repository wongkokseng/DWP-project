<?php include ('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Account</title>
    <link rel="stylesheet" href="login.css">
    <script>
        function openmainpage() {
            window.location.href='MainPage.html';
        }
        function openregister(){
            window.location.href='register.php';
        }
    </script>
</head>
<body>
    <div class="background">
        <div class="shape"><img src="https://img.freepik.com/premium-vector/food-delivery-calligraphy-hand-lettering-handwritten-logotype-takeaway-service-vector-template-typography-poster-logo-design-banner-flyer-tag-etc_656810-2806.jpg" style="height: 200px;"></div>
        <div class="shape"><img src="https://th.bing.com/th/id/OIP.IB8GuX3D2m1QO8Kt-4AKAgHaHa?w=1920&h=1920&rs=1&pid=ImgDetMain" style="height: 200px;"></div>
    </div>
    <form>
        <?php include("errors.php")?>
        <h3 style="font-family: 'Times New Roman', Times, serif;">Login Here</h3>

        <label for="username" style="font-family: 'Times New Roman', Times, serif;">Username</label>
        <input type="text" placeholder="Your name" name="username">

        <label for="password" style="font-family: 'Times New Roman', Times, serif;">Password</label>
        <input type="password" placeholder="Password" name="password">

        <button style="font-family: 'Times New Roman', Times, serif;" type="submit" name="login_user">Log In</button>
        <div class="social">
          <div class="go" onclick="openmainpage()"><i class="fab fa-google"></i> Main Page</div>
          <div class="fb" onclick="openregister()"><i class="fab fa-facebook"></i> Register</div>
        </div>
    </form>
</body>
</html>
