 <?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Kolkata');

$Server   = "localhost";
$UserName = "root";
$Password = "";
$Database = "XCopy";


// Create connection
$link = mysqli_connect($Server, $UserName, $Password, $Database);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

?> 