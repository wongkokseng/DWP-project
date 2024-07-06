<?php
session_start();

// initializing variables
$username = "";
$staff_username = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'accounts');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Debugging output
  echo "Register User:<br>";
  echo "Username: " . $username . "<br>";
  echo "Phone Number: " . $phone_number . "<br>";
  echo "Password 1: " . $password_1 . "<br>";
  echo "Password 2: " . $password_2 . "<br>";

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($phone_number)) { array_push($errors, "Phone number is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($password_2)) { array_push($errors, "Please write the password again to confirm password"); }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
  if (!preg_match('/^\d{7,15}$/', $phone_number)) {
    array_push($errors, "Phone number must be 9 to 15 digits long");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM customer WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

    $query = "INSERT INTO customer (username, phone_number, password) 
              VALUES('$username', '$phone_number', '$password')";
    mysqli_query($db, $query);

    echo "Query: " . $query . "<br>";

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: mainpage.php');
    exit();
  } else {
    echo "Errors: <br>";
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // Debugging output
  echo "Login User:<br>";
  echo "Username: " . $username . "<br>";
  echo "Password: " . $password . "<br>";

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM customer WHERE username='$username' AND password='$password' AND status='active'";
    $results = mysqli_query($db, $query);

    echo "Query: " . $query . "<br>";

    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: mainpage.php');
      exit();
    } else {
      array_push($errors, "Wrong username/password combination.");
    }
  } else {
    echo "Errors: <br>";
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}

// LOGIN STAFF
if (isset($_POST['login_staff'])) {
  $staff_username = mysqli_real_escape_string($db, $_POST['staff_username']);
  $staff_password = mysqli_real_escape_string($db, $_POST['staff_password']);

  // Debugging output
  echo "Login Staff:<br>";
  echo "Staff Username: " . $staff_username . "<br>";
  echo "Staff Password: " . $staff_password . "<br>";

  if (empty($staff_username)) {
    array_push($errors, "Username is required");
  }
  if (empty($staff_password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $staff_password = md5($staff_password);
    $query = "SELECT * FROM staff WHERE staff_username='$staff_username' AND staff_password='$staff_password' AND staff_status='active'";
    $results = mysqli_query($db, $query);

    echo "Query: " . $query . "<br>";

    if (mysqli_num_rows($results) == 1) {
      $_SESSION['admin'] = $staff_username;
      $_SESSION['success'] = "You are now logged in";
      header('location: admin.php');
      exit();
    } else {
      array_push($errors, "Wrong username/password combination.");
    }
  } else {
    echo "Errors: <br>";
    foreach ($errors as $error) {
      echo $error . "<br>";
    }
  }
}

?>

