<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="image/icon.ico">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ยินดีต้อนรับสู่DINNERSHOP</title>

        <!-- Bootstrap -->

        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/dns_9.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">


        </style>
    </head>
 <body>
        <?php
        include "menu.php";
        @session_start();
        include("../conn.php");
        ?> 
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">
                    <div class="panel-heading"><center><h4>เพิ่มข้อมูล แบบประเมินร้าน</h4></center></div>
                    <div class="three panel-body">
                        <br>

<?php 
include("../conn.php");
$sql="select * from flavour";
$res=mysqli_query($conn,$sql);
$row=mysqli_num_rows($res);
$num_id=$row+1;
?>
<form method="post" action="pcAddflavour.php">


	<div class="col-md-offset-5">ลำดับ :<input type="text" name="num_id"></div><br>
	<div class="col-md-offset-5">ชื่อเรื่อง   :<input type="text" name="title"></div><br>
	<input class="btn btn-success col-md-offset-5 col-md-2 col-xs-12 col-sm-12 "type="submit"value="บันทึกข้อมูล">
	</tr>
</form>
</div>
</div>
<br>
<?php include("../footer.php")   ?>
</div>
</div>
</div>

