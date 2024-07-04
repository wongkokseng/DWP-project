<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <script>
        function openmainpage() {
            window.location.href='mainpage.html';
        }
        function openlogin(){
            window.location.href='login.php';
        }
    </script>
</head>
<body>
    <form>
        <?php include('errors.php')?>
        <h3>Register Account</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" name="username">

        <label for="phone_number">Phone Number</label>
        <input type="text" placeholder="Phone Number" name="phone_number">
        
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password_1">

        <label for="password">Confirm Password</label>
        <input type="password" placeholder="Write the password again" name="password_2">

        <button type="submit" name="reg_user">Register</button>
        <div class="social">
            <div onclick="openmainpage()">Main Page</div>
            <div onclick="openlogin()">Login</div>
        </div>
        <p>If you encounter any difficulties,please contact our <a href="contactus.html">customer support</a>.</p>
    </form>
</body>
</html>
