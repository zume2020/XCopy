<?php
	ob_start();
	session_start();
	require_once 'connect.php';
	
	//it will never let you open signup page if session is set
	if (!empty($_SESSION['userName'])) {
		header("Location: index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title>Signup - CManager</title>


</head>
<body>



<small>Free and Unlimited Resources</small>

<div class="body">
<div class="msg">Sign Up</div>

<div class="form-line">
<input type="email" class="form-control" name="email" placeholder="Email Address" required="" value="" autocomplete="off">
<br>
<input type="password" class="form-control" name="pass" minlength="6" placeholder="Password" required="" autocomplete="off">

<br>

<button name="btn-signup">Create</button>

<br>

<a href="login.php">Already have a membership?</a>

</form>


</body>

</html>
