<?php
    ob_start();
    session_start();
    //error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
    require_once 'connect.php';

    // if session is not set this will redirect to login page
    if( !isset($_SESSION['userName']) ) {
        header("Location: login");
        exit;
    }else $userName = $_SESSION['userName'];
 $id =  $_GET['id'];



?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>tasks</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<style>
.btn-floating-container {
    right: 80px;
    bottom: 80px;
    position: fixed;
    z-index: 99;
}

.btn-floating {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2), 0 1px 1px 0 rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(245, 245, 245, 0.075);
    text-align: center;
    padding: 0px;
    font-size: 24px;
    background-color: green;
   
} 
@media (max-width: 768px) {
.btn-floating-container {
    right: 40px;
    bottom: 40px;
  }
}
</style>
</head>
<body>

<a href="logout.php?logout">Sign Out</a></li>


    <div id="wrapper">

    <div class="container">


    <div class="btn-floating-container">
    <button class="btn-floating btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-plus " aria-hidden="true"></i></button>
    </div>

<?php
$result = mysqli_query($link, "SELECT `name`, `pirce` FROM `topics` WHERE `id`='".$id."'");
$row = $result->fetch_assoc();
echo "<h3>".$row['name']."</h3>";
echo "<h4>Rs".$row['pirce']."</h5>";  

?>

        <table  class="table table-condensed table-bordered table-hover table-striped">
           <thead>
              <tr>
                 <th>#id</th>
                 <th>name</th>
              </tr>
           </thead>
           <tbody>

            <?php

$sql =  "SELECT "
      . " users.id,users.name "
      . " FROM "
      . " task_reg "
      . " JOIN users ON users.id = task_reg.use_id "
      . " JOIN topics ON topics.id = task_reg.top_id "
      . " WHERE "
      . " topics.id=". $id;

//echo($sql);
        $result = mysqli_query($link, $sql);
        $num_rows = mysqli_num_rows($result);

            if($result)if ($result->num_rows ) {
                while($row = $result->fetch_array()) {

                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td><input type='checkbox'></td>";
                echo "<td><input type='text'></td>";

                echo "</tr>";
                }
            }
            ?>

           </tbody>
        </table> 

        </div>
        </div>
    
                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">


                <form class="form-horizontal" action="users-ins.php" method="POST">    
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">New</h4>
                        </div>
                    <div class="modal-body">


                      </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>

                </form>

                      </div>
                    </div>
                  </div>



    </div>
    </div>
    
    <script src="assets/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>




