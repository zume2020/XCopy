<?php
    ob_start();
    session_start();
    error_reporting(0);
    require_once 'connect.php';
    // if session is not set this will redirect to login page
    if( !isset($_SESSION['userName']) ) {
        header("Location: login");
        exit;
    }else $userName = $_SESSION['userName'];



if (isset($_GET['view'])) { //2 thavana defined

    $qView =  $_GET['view'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pscApp | Questions</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="bootstrap-material-design.min.css" type="text/css"  />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css"  />
<link rel="stylesheet" href="assets/css/animate.min.css" type="text/css"  />

<link rel="stylesheet" href="style.css" type="text/css" />
<style>
@font-face {
  font-family: "Lohit";
  src: url("NimbusSanL.ttf") format("truetype");
} 
.notif{
    right: 50px;
    top: 25px;
    width: 190px;
    min-height: 50px;
    color: #fff;
    position: fixed;
    border-radius: 2px;
    z-index: 10;
    padding: 10px;
    font-weight: 600;
    line-height: 1.8;
    display: none;
}
.notif-success {
    background-color: rgba(38,185,154,.88);
    border-color: rgba(38,185,154,.88);
}
.notif-error {
    background-color: rgba(231,76,60,.88);
    border-color: rgba(231,76,60,.88);
}
  .remp{
    margin-top: 21px;
    margin-bottom: 21px;
    padding: 10px;
    background-color: #fff;
    font-family: 'Lohit';
    border-left: 3px solid #0c0;
    border-top-left-radius: 2px;
    border-bottom-left-radius: 2px;

  }
  .question{
    font-size: 15px;
    color: #5c5c5c;
  }
  .answer{
    font-size: 12px;
    color: #848484;
    margin-left: 1px;
    margin-top: 2px;
  }
  .btn-bug {
    padding: 0;
    cursor: pointer;
    background: transparent;
    border: 0;
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #000000;
    opacity: 0.2;
    transition: 0.1s;
}

  .btn-bug:hover{
    opacity: 0.8;
    color: red;
    transition: 0.1s;
}

</style>
</head>
<body>

    <div id="msg" class="notif"></div>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index">pscApp</a>
        </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li><a href="current-affairs"><i class="fa fa-bullhorn"></i> News</a></li>
                    <li><a href="quiz"><i class="fa fa-puzzle-piece"></i> Quiz</a></li>
                    <li><a href="analytics"><i class="fa fa-line-chart"></i> Analytics</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                       <i class="fa fa-question"></i> Questions<span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="questions">Add Questions</a></li>
                        <li><a href="questions-view">View Questions</a></li>
                      </ul>
                    </li>
                    <li><a href="tags"><i class="fa fa-tags"></i> Tasgs</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-user"></i><?php echo " ".$userName ?><span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="logout.php?logout"> Sign Out</a></li>
                      </ul>
                    </li>
                </ul>
            </div>
      </div>
    </nav>

    <div id="wrapper">

    <div class="container">



        <div class="row">
            
<div class="col-lg-4">
    <ul class="breadcrumb">

        <?php
     
        if ($breadcrumb) {
            $active = 'active';
        }
        echo "<li><a href='q'>Questions</a></li>";
        echo "<li class='".$active."'>";
                $res=mysqli_query($link,"SELECT `tag` FROM `tags` WHERE id ='".$qView."' ");
                $row=mysqli_fetch_array($res);
                echo $row['tag'];
        echo "</li>";
        ?>

    </ul>
</div>

<div class="col-lg-4">
<?php


//pagination
$total_page         = 0;
$current_page       = 0;
$res_disp           = 10; //change for no of row display
$lo_lim             = 0;


    $lo_lim_post = $_POST['lo_lim_post'];
    $up_lim_post = $_POST['up_lim_post'];
    $reqstd_page = $_POST['paginx'];




    $sql = "SELECT * FROM tag_dir WHERE  `tag_id` = '".$qView."' ";
        $result = mysqli_query($link, $sql);
        $total_rows = mysqli_num_rows($result);



// echo($sql);
// echo mysqli_error($link);


$total_page_dec     = $total_rows/$res_disp;     //with decimal value
$total_page_dec_non = intval($total_page_dec);   //without decimal value

    if($total_page_dec>$total_page_dec_non){     // for assesment of complete result
        $total_page_intg = ($total_page_dec+1);
        $total_page=intval($total_page_intg);
    } else {
        $total_page = $total_page_dec_non;
    }

    if(isset($_POST['pre'])){
        $lo_lim=$lo_lim_post-$res_disp;
        if($lo_lim<0){
            $lo_lim=0;
        } else if($up_lim<0){
            $up_lim=0;
        }
    }

    if(isset($_POST['nex'])){
        $lo_lim=$lo_lim_post+$res_disp;
        if($lo_lim>$total_rows){
            $lo_lim=$lo_lim-$res_disp;
        } else if($up_lim>$res_disp){
            $up_lim=$res_disp;
        }
    }

    if(isset($_POST['paginx']) && $_POST['paginx']!='' ){
        $lo_lim = $res_disp*($reqstd_page-1);
    }
    
    if($up_lim!=0){
    $var_paginator =" LIMIT $lo_lim , $up_lim";
    }else{
        $var_paginator =" LIMIT $lo_lim , $res_disp";
    }

    $current_page=($lo_lim+$res_disp)/$res_disp;

    // echo "<br>total_rows   : ".$total_rows;
    // echo "<br>total_page   : ".$total_page;
    // echo "<br>current_page : ".$current_page;
    // echo "<br>reqstd_page  : ".$reqstd_page;




 if (isset($_GET['view'])) {

    $qView = $_GET['view'];

    $breadcrumb = true;

    $sql = "SELECT "
        . "questions.q_id "
        . "FROM "
        . "tag_dir "
        . "JOIN questions ON questions.q_id = tag_dir.q_id "
        . "JOIN tags ON tags.id = tag_dir.tag_id "
        . "WHERE "
        . "tags.id = '".$qView."' " 
        //. "ORDER BY RAND() "
        . "$var_paginator";

        $queryRecords = mysqli_query($link, $sql);
   //echo $sql;
} else {
 $sql = "SELECT * FROM `questions` ORDER BY RAND() LIMIT 0,50";
 $queryRecords = mysqli_query($link, $sql);
 $breadcrumb = false;
}





foreach ($queryRecords as $res) {

$sql = "SELECT "
    . "questions.ques,questions.ans FROM questions "
    . "WHERE questions.q_id = '".$res['q_id']."'";

//echo $sql;
$labelType = array('success','info','danger','warning','primary','default');

    $result = mysqli_query($link, $sql);
    $num_rows = mysqli_num_rows($result);
        if($result)if ($result->num_rows ) {
            while($row = $result->fetch_array()) {

                echo "<div class='col-lg-12 remp'>";
                echo "<div class='question'>";
                echo "<button type='button' class='btn-bug' id='".$res["q_id"]."'><i class='fa fa-bug'></i></button>";
                echo $row["ques"];
                echo "</div>";
                echo "<div class='answer'>".$row["ans"]."</div>";
                echo "</div>\n";

            }
        }
}



    // echo "displaying ". $res_disp." results from ".($lo_lim+1)."<sup>th</sup> row<br>";
    // echo $sql . "<br>";

    echo "<form action='' method='post'>";

    echo "<ul class='pagination pagination-sm'>";
    echo "<li><input type='submit' name='pre' value='«'></li>";

    for($i=1; $i<=$total_page; $i++ ){

//echo $i."-".$current_page;

            if($i==$current_page){
                $active = " class='active' data='$i $current_page' ";
            }

        if (abs($i-$current_page)<=3) {


        echo"<li".$active."><input type='submit' name='paginx' value='$i'></li>\n";

        }
    }


    echo "<li><input type='submit' name='nex' value='»'></li>";
    echo "</ul>";
    echo "<input type='hidden' value='$lo_lim' name='lo_lim_post'>";
    echo "</form>";



// close connection
mysqli_close($link);
?>
</div>



        </div>
    
        </div>

    </div>

    <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    ////BUG REPORTER////
    $('.btn-bug').on('click', function() {
        data = {};
        data['bugReg'] = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "server.php",
            cache:false,  
            data: data,
            dataType: "json",
            success: function(response)
            {
                if(response.msg) {
                    $("#msg").show();
                    $("#msg").addClass('notif-success animated fadeInRight').html(response.msg);
                    $("#msg").delay(5000).fadeOut(100);
                }
            }
        });
    });
});
</script>
</body>
</html>