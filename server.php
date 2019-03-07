<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registeration');

// REGISTER USER
if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);



  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }


  // first check the database to make sure a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user)
	  { 
  // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // register user if there are no errors in the form
  
  if (count($errors) == 0) {
  	//$password = md5($password_1);
	//changing this encryption
	
	//$salted = "jbdciueguy37939822922".$password."jjsjsjs111222";
	//$hashed=hash('sha256'.$salted);
	
	
	$salt='jxnejwknxkwmk11113444'.$password_1.'3en2je32undu223233ss';
	$hashed=hash('sha256',$salt);
	
	//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$hashed')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index1.php');
  }
}



if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_2  = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password_2)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password); 
	
	$salt='jxnejwknxkwmk11113444'.$password_2.'3en2je32undu223233ss';
	$hashed=hash('sha256',$salt);
	
	$query = "SELECT * FROM users WHERE 
			  username='$username' AND password='$hashed'";
  	
	$results = mysqli_query($db, $query);
  	
	if (mysqli_num_rows($results) == 1) 
	{
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index1.php');
  	}
	else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>