<?php
	ob_start();
	session_start();
	require_once 'connect.php';
	
	//it will never let you open index(login) page if session is set
	if ( isset($_SESSION['userName'])!="" ) {
		header("Location: index.php");//?????
		exit;
	}

	$error = false;
	
	if( isset($_POST['btn-login']) ) {	

		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
			//////////////////////////////////////////////
			echo $passError;
		}

		// if there's no error, continue to login
		if (!$error) {
			
			$password = hash('sha256', $pass); // password hashing using SHA256
			
			$sql = "SELECT * FROM users WHERE mail='$email'";
			$res=mysqli_query($link,$sql);
			while($row=mysqli_fetch_array($res))
			{
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row


echo $password . "<br>" . $row['psw'];




			if( $count == 1 && $row['psw']==$password ) {
				$_SESSION['userName'] = $row['name'];
				$_SESSION['userId']   = $row['id'];




				header("Location: index.php");
			} else{
				echo mysqli_error($link);	
			} 
			}
			
				
		}else{
				echo "Incorrect Credentials, Try again...";
				//$_SESSION['inc_cre']=$errMSG;
				////$_POST['inc_cre']=$_SESSION['inc_cre'];			
		}
		
	} 

		//incorrect credentials
		//header("Location: index");
		echo $sql ." <br>count " .$count ."<br> userId>> ". $row['userId'] ."<br>usrepass>>".$row['psw'] ;
?>