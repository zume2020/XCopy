<?php
	ob_start();
	session_start();
	require_once 'connect.php';
	
	//it will never let you open login page if session is set
	if (!empty($_SESSION['userId'])) {
		header("Location: index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title>login - CManager</title>


</head>
<body>



<small>Free and Unlimited Resources</small>

<div class="body">
<div class="msg">SignIn</div>
<form action="checklogin.php" method="POST">


<input type="email" class="form-control" name="email" placeholder="Email Address" required="" value="" autocomplete="off">
<br>
<input type="password" class="form-control" name="pass" minlength="6" placeholder="Password" required="" autocomplete="off">
<br>

<button class="btn btn-block btn-lg bg-pink waves-effect" name="btn-login">LOG IN</button>

<br>

<a href="signup.php">You dont have a membership?</a>

</form>


</body>

</html>