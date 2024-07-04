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
    <title>payment form</title>
    <link rel="stylesheet" href="payment form style.css">
</head>
<body>
<div class="container">
    <form action="">
        <div class="row">
            <div class="column">
                <h3 class="title">Billing Address</h3>
                <div class="input-box">
                     <span>Full name :</span>
                     <input type="text" placeholder="Name" required>
                </div>
                <div class="input-box">
                    <span>Email :</span>
                    <input type="email" placeholder="example@gmail.com" required>
               </div>
               <div class="input-box">
                <span>Address :</span>
                <input type="text" placeholder="Your address" required>
               </div>
               <label for="city" class="input-label">City :</label>
                 <select id="City" class="city-list" name="city" aria-placeholder="Select your city" required>
                     <option value="" selected disabled>Choose</option>
                     <option value="kuala_lumpur">Kuala Lumpur</option>
                     <option value="george_town">George Town</option>
                     <option value="ipoh">Ipoh</option>
                     <option value="johor_bahru">Johor Bahru</option>
                     <option value="malacca">Malacca City</option>
                     <option value="alor_setar">Alor Setar</option>
                     <option value="kuantan">Kuantan</option>
                     <option value="kuching">Kuching</option>
                     <option value="kota_kinabalu">Kota Kinabalu</option>
                     <option value="shah_alam">Shah Alam</option>
                     <option value="seremban">Seremban</option>
                     <option value="kuala_terengganu">Kuala Terengganu</option>
                     <option value="kangar">Kangar</option>
                     <option value="putrajaya">Putrajaya</option>
                     <option value="labuan">Labuan</option>
                     <option value="sandakan">Sandakan</option>
                     <option value="sibu">Sibu</option>
                     <option value="miri">Miri</option>
                     <option value="taiping">Taiping</option>
                     <option value="bintulu">Bintulu</option>
                     <option value="batu_pahat">Batu Pahat</option>
                     <option value="muar">Muar</option>
                     <option value="kota_bharu">Kota Bharu</option>
                     <option value="ampang_jaya">Ampang Jaya</option>
                     <option value="kajang">Kajang</option>
                     <option value="ampang">Ampang</option>
                     <option value="kluang">Kluang</option>
                     <option value="kuala_pilah">Kuala Pilah</option>
                     <option value="port_dickson">Port Dickson</option>
                     <option value="kangar">Kangar</option>
                     <option value="raub">Raub</option>
                     <option value="temerloh">Temerloh</option>
                     <option value="tawau">Tawau</option>
                     <option value="lahad_datu">Lahad Datu</option>
                     <option value="kemaman">Kemaman</option>
                </select>
                <div class="flex">
                    <div class="input-box">
                        <span>state :</span>
                        <input type="text" placeholder="Segamat" required>
                    </div>
                    <div class="input-box">
                        <span>Zip code :</span>
                        <input type="text" placeholder="12345" required>
                    </div>
                </div>
            </div>
            <div class="column">
                <h3 class="title">Payment</h3>
                <div class="input-box">
                    <span>Cards accepted :</span>
                    <img src="images/cards.jpeg" alt="cards">
                </div>
                <div class="input-box">
                    <span>Cardholder Name :</span>
                    <input type="text" placeholder="Name" required>
                </div>
                <div class="input-box">
                    <span>Card Number :</span>
                    <input type="text" placeholder="1234 1234 1234 1234" required>
                </div>
                <div class="input-box">
                    <span>Exp date :</span>
                    <input type="text" placeholder="DD/MM" required>
                </div>
                <div class="flex">
                    <div class="input-box">
                        <span>CVV :</span>
                        <input type="text" placeholder="123" required>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="submitbtn"><b>Submit</b></button>
    </form>
</div>
</body>   
</html>