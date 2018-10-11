<?php

error_reporting( E_ALL );

require_once 'connect.php';

if (isset($_POST['mem'])) {


$mem = $_POST['mem'];


		$sql = "INSERT INTO `users` (`name`) VALUES ('".$mem."') ";



		if(mysqli_query($link,$sql)){
			echo "Working good ".$sql;
		}else {
			echo "error";
			echo $sql." ". mysqli_error($link);
		}
}else echo "error";



// clossing connection
mysqli_close($link);
?>