 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "xcopy";


// Create connection
$link = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?> 