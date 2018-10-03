<?php

require_once 'connect.php';
//Fetching Values from URL  
$usrid = $_POST['usrid'];
$topid = $_POST['topid'];
$cstat = $_POST['cstat'];

//Insert query 

if (isset($cstat AND !empty($cstat))) {
	if ($cstat=='ON') {
		$sql = "UPDATE `task_reg` SET `payment`='1' WHERE (`top_id`='".$topid."' AND `use_id`='".$usrid."') ";
	}elseif ($cstat=='OFF') {
		$sql = "UPDATE `task_reg` SET `payment`='0' WHERE (`top_id`='".$topid."' AND `use_id`='".$usrid."') ";
	}
}




if(mysqli_query($link,$sql)){
	echo "Working good";
}else {
	echo "error";
	echo $sql." ". mysqli_error($link);
}

// clossing connection
mysqli_close($link);