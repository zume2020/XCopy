<?php
<<<<<<< HEAD
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );

require_once 'connect.php';

=======

require_once 'connect.php';
//Fetching Values from URL  
>>>>>>> d309b2120f76341896dd275c7bbda60a2173d6bb
$usrid = $_POST['usrid'];
$topid = $_POST['topid'];
$cstat = $_POST['cstat'];

<<<<<<< HEAD

if (!empty($cstat)) {
=======
//Insert query 

if (isset($cstat AND !empty($cstat))) {
>>>>>>> d309b2120f76341896dd275c7bbda60a2173d6bb
	if ($cstat=='ON') {
		$sql = "UPDATE `task_reg` SET `payment`='1' WHERE (`top_id`='".$topid."' AND `use_id`='".$usrid."') ";
	}elseif ($cstat=='OFF') {
		$sql = "UPDATE `task_reg` SET `payment`='0' WHERE (`top_id`='".$topid."' AND `use_id`='".$usrid."') ";
	}
<<<<<<< HEAD


		if(mysqli_query($link,$sql)){
			echo "Working good ".$sql;
		}else {
			echo "error";
			echo $sql." ". mysqli_error($link);
		}
=======
>>>>>>> d309b2120f76341896dd275c7bbda60a2173d6bb
}




<<<<<<< HEAD

// clossing connection
mysqli_close($link);
?>
=======
if(mysqli_query($link,$sql)){
	echo "Working good";
}else {
	echo "error";
	echo $sql." ". mysqli_error($link);
}

// clossing connection
mysqli_close($link);
>>>>>>> d309b2120f76341896dd275c7bbda60a2173d6bb
