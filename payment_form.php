<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit();
  }

  $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="payment form style.css">
    <script src="payment_form.js"></script>
</head>
<body>
<div class="container">
    <form method="POST" action="process_order.php">
        <!-- Billing Address Section -->
        <div class="row">
            <div class="column">
                <h3 class="title">Billing Details</h3>
                <div class="input-box">
                    <span>Cardholder name :</span>
                    <input type="text" name="full_name" placeholder="Name" required>
                </div>
                <div class="input-box">
                    <span>Address :</span>
                    <input type="text" name="billing_address" placeholder="Your address" required>
                </div>
                <div class="input-box">
                    <span>City :</span>
                    <input type="text" name="city" placeholder="Segamat" required>
                </div>
                <div class="input-box">
                    <span>State :</span>
                    <input type="text" name="state" placeholder="Johor" required>
                </div>
                <div class="input-box">
                    <span>Zip code :</span>
                    <input type="text" name="zip_code" placeholder="12345" required>
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <span>Cards accepted :</span>
                    <img src="images/cards.jpeg" alt="cards">
                </div>
                <div class="input-box">
                    <span>Card Number :</span>
                    <input type="text" name="card_number" placeholder="1234 1234 1234 1234" required>
                </div>
                <div class="input-box">
                    <span>Exp date :</span>
                    <input type="text" name="exp_date" placeholder="MM/YY" required>
                </div>
                <div class="flex">
                    <div class="input-box">
                        <span>CVV :</span>
                        <input type="text" name="cvv" placeholder="123" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-box">
                <span>Delivery Address :</span>
                <input type="text" name="delivery_address" placeholder="Delivery Address" required>
            </div>
        </div>
        <input type="hidden" name="order_description" id="order_description">
        <input type="hidden" name="customer_name" id="customer_name">
        <button type="button" class="submitbtn" onclick="submitForm()"><b>Submit</b></button>
    </form>
</div>
</body>   
</html>
