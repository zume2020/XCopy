<?php
    ob_start();
    session_start();
    require_once 'connect.php';
    // if session is not set this will redirect to login page
    if( !isset($_SESSION['userName']) ) {
        header("Location: login.php");
        exit;
    }else $userName = $_SESSION['userName'];
// if (isset($_GET['params']))
// {
//     $params = explode( "/", $_GET['params'] );
//     print_r($params);
//     echo("YUP!");
// }

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>xCopy</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/bootstrap-material-design.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">



<style>
@font-face {
  font-family: "Noto Sans Malayalam";
  src: url("assets/fonts/NotoSansMalayalam.ttf") format("truetype");
}

* {
  box-sizing: border-box;
}

body {
  height: 100%;
  width: 100%;
  padding: 0;
  margin: 0;
}

.dashboard {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  min-width: 150px;
  min-height: 100px;

}

.column {
  display: flex;
  flex-direction: row;
  flex-grow: 1;
  flex-wrap: wrap;
}

.item {
  padding:10px;
  margin: 2px;
  flex-grow: 1;
  min-height: 93px;
  background-color: #5BC0DE;
  font-family:Noto Sans Malayalam;
  font-size: 18px;
  font-weight: 600;
  text-align: right;
  vertical-align: middle;
  box-shadow: 0 .4rem .8rem -.1rem rgba(0,32,128,.1),0 0 0 1px #f0f2f7;
  border-radius: 2px;
  cursor: pointer;
}
.item > a{
  text-decoration: none;
}
.item:hover{
    background-color: #00a7cb;
    transition: 0.5s;
    color: #eaeaea;
}

.small.item {
  min-width: 305px;
}

#br {
  display: flex;
  flex-direction: row;
  flex-grow: 1;
  flex-wrap: wrap;
  min-height: 100px;
}

#br > section {
  flex-grow: 1;
}


</style>
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




<style type="text/css">

ul li {
    list-style-type: none;
}
.collection {
  padding: 0;
  margin: 0.5rem 0 1rem 0;
  border: 1px solid #e0e0e0;
  border-radius: 2px;
  overflow: hidden;
  position: relative;
}

.collection .collection-item {
  background-color: #fff;
  line-height: 1.5rem;
  padding: 10px 20px;
  margin: 0;
  border-bottom: 1px solid #e0e0e0;
}

.collection .collection-item.avatar {
  min-height: 84px;
  padding-left: 0px;
  position: relative;
}

.collection .collection-item.avatar .circle {
  position: absolute;
  width: 42px;
  height: 42px;
  overflow: hidden;
  left: 15px;
  display: inline-block;
  vertical-align: middle;
}

.collection .collection-item.avatar i.circle {
  font-size: 18px;
  line-height: 42px;
  color: #fff;
  background-color: #999;
  text-align: center;
}

.collection .collection-item.avatar .title {
  font-size: 16px;
}

.collection .collection-item.avatar p {
  margin: 0;
}

.collection .collection-item.avatar .secondary-content {
  position: absolute;
  top: 16px;
  right: 16px;
}

.collection .collection-item:last-child {
  border-bottom: none;
}

.collection .collection-item.active {
  background-color: #ff4081;
  color: white;
}

.collection .collection-item.active .secondary-content {
  color: #fff;
}

.collection a.collection-item {
  display: block;
  -webkit-transition: 0.25s;
  -moz-transition: 0.25s;
  -o-transition: 0.25s;
  -ms-transition: 0.25s;
  transition: 0.25s;
  color: #ff4081;
}

.collection a.collection-item:not(.active):hover {
  background-color: #ddd;
}

.collection.with-header .collection-header {
  background-color: #fff;
  border-bottom: 1px solid #e0e0e0;
  padding: 10px 20px;
}

.secondary-content {
  float: right;
  color: #ff4081;
}

.collapsible .collection {
  margin: 0;
  border: none;
}

#work-collections 
p.collections-title {
  font-size: 1.0rem;
  padding: 0;
  margin: 0;
  font-weight: 500;
}

#work-collections 
p.collections-content {
  font-size: 0.9rem;
  padding: 0;
  margin: 0;
  font-weight: 400;
}


</style>

<div class="row">
  <h2 style="color: #878787;margin-left: 14px;">Exams</h2>
<div class="col-sm-12 col-md-12">
  
  <ul id="issues-collection" class="collection">
      <li class="collection-item">
          <span class="collection-header" style="  font-size: 20px; font-weight: 500; margin-bottom: 5px;">Topics</span>
          <p class="text-muted">Recommended</p>
      </li>



<?php


    $res = mysqli_query($link,"SELECT * FROM `exam` ");
    $row = mysqli_fetch_array($res);
    $name = $row['name'];


?>
      <li class="collection-item">
        <div class="row">
          <div class="col-sm-7">
            <p class="collections-title"><strong><?php echo "#".$exam ?></strong><?php echo " ".$name ?></p>
            <p class="collections-content">Mock Series</p>
          </div>

          <div class="col-sm-3">
            <span class="text-muted pull-right" style="margin-top: 5px; font-size: 12px;">
              <?php echo $disp . "/5"; ?>
            </span>
            <div class="progress" style="margin-top: 25px;">
              <div class="progress-bar progress-bar-info" role="progressbar"  style="width:<?php echo $perc; ?>"></div>   
            </div>
          </div>

          <div class="col-sm-2">
            <a href="mock?mock=<?php echo $exam ?>" class="btn btn-info"><i class="fa fa-arrow-right"></i></a>                                              
          </div>
        </div>
      </li>




  </ul>
</div>
</div>







</div>


  </div>
</div>
    
    <script src="assets/js/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  <div>
    <?php
      if (isset($_SESSION['quiz'])) {
        echo "<a href='quiz'>resume Quiz</a>";
      }
    ?>
  </div>
</body>
</html>
<?php ob_end_flush(); ?>