<?php
$servername = "sql104.epizy.com";
$username = "epiz_24211438";
$password = "PKXjOFmMl6";
$database = "epiz_24211438_optimus";

// Create connection
$link = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}else echo "connected";
?> 
