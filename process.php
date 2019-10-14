<?php

////////////////////////////////////////////
//               safe code                //
////////////////////////////////////////////
//     $mysqli = new mysqli("server", "username", "password", "database_name");

//     // TODO - Check that connection was successful.

//     $unsafe_variable = $_POST["user-input"];

//     $stmt = $mysqli->prepare("INSERT INTO table (column) VALUES (?)");

//     // TODO check that $stmt creation succeeded

//     // "s" means the database expects a string
//     $stmt->bind_param("s", $unsafe_variable);

//     $stmt->execute();

//     $stmt->close();

//     $mysqli->close();
////////////////////////////////////////////
//               safe code                //
////////////////////////////////////////////
error_reporting( E_ALL );

require_once 'connect.php';

//Fetching Values from URL  
$usrid = $_POST['usrid'];
$topid = $_POST['topid'];
$cstat = $_POST['cstat'];




if (isset($cstat)) {

	if ($cstat=='ON') {
		$sql = "UPDATE `task_reg` SET `payment`='1' WHERE (`top_id`='".$topid."' AND `use_id`='".$usrid."') ";
	}elseif ($cstat=='OFF') {
		$sql = "UPDATE `task_reg` SET `payment`='0' WHERE (`top_id`='".$topid."' AND `use_id`='".$usrid."') ";
	}


		if(mysqli_query($link,$sql)){
			echo "Working good ".$sql;
		}else {
			echo "error";
			echo $sql." ". mysqli_error($link);
		}


}

// clossing connection
mysqli_close($link);
?>
