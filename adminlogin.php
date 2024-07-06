<?php include('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin login.css"/>
</head>
<body>
    <div class="container">
        <form class="login-form" method="post" action="adminlogin.php">
            <?php include('errors.php')?>
            <h2>Admin Login</h2>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="staff_username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="staff_password" required>
            </div>
            <button type="submit" name="login_staff">Login</button>
        </form>
    </div>
</body>
</html>
