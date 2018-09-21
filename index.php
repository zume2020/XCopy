<?php
    ob_start();
    session_start();
    require_once 'connect.php';
    //if session is not set this will redirect to login page
    if( !isset($_SESSION['userName']) ) {
        header("Location: login.php");
        exit;
    }else $userName = $_SESSION['userName'];

if (isset($_GET['params']))
{
    $params = explode( "/", $_GET['params'] );
    print_r($params);
    echo("YUP!");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>xCopy</title>


</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <li><a href=""><i class="fa fa-home"></i> Home</a></li>
            <li><a href=""><i class="fa fa-user"></i> Account</a></li>
        </ul>
      </div>
    </nav>

<div id="wrapper">
	<div class="container">



<div class="row">

<div class="col-sm-12 col-md-12">
  
  <ul id="issues-collection" class="collection">
      <li class="collection-item">
        <span class="collection-header" style="  font-size: 20px; font-weight: 500; margin-bottom: 5px;">Topics</span>
        <p class="text-muted">new</p>
      </li>



<?php


    $res = mysqli_query($link,"SELECT * FROM `topics` ");

    if($res)if ($res->num_rows ) {


          while($row = $res->fetch_array()) {
echo "<div>";

    echo "<span class='testlink'>".$row["name"]."</span>";

    echo "<a href='task.php?id=".$row["id"]."' class='btn btn-primary' target='_blank'> Take Copy</a>";

echo "</div>";

        }

}
?>



</ul>

</div>


  </div>

    
    <script src="assets/js/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  <div>
  </div>
</body>
</html>

<?php ob_end_flush(); ?>