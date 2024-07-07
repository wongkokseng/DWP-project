<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include("view_profile_processing.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link rel="stylesheet" href="view_profile.css">

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
        <div class="profile-pic">
            <img src="images/default profile 2.webp" alt="Default Profile Picture">
        </div>
        <div class="profile-info">
            <h1>Profile Information</h1>
            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'success') {
                    echo "<p class='success'>Profile updated successfully.</p>";
                } elseif ($_GET['status'] == 'error') {
                    echo "<p class='error'>Error updating profile. Please try again.</p>";
                } elseif ($_GET['status'] == 'username_exists') {
                    echo "<p class='error'>Username already exists. Please choose a different username.</p>";
                }
            }
            ?>
            <form action="view_profile_processing.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user_data['username']); ?>" disabled>
                
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($user_data['phone_number']); ?>" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user_data['password']); ?>" required>
                
                <input type="submit" value="Update Profile">
            </form>
        </div>
    </div>
</body>
</html>


