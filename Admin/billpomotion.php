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

                    <div class="panel-heading"><center><h4>ใบเสร็จ</h4></center></div>
                    <div class="three panel-body">

                        <br>
<?php 
include("../conn.php");
date_default_timezone_set("asia/bangkok");
$datetime=date("y-m-d/h:i:s");

 $sql4="select*from mempromotion,member where mempromotion.mem_id='$_SESSION[idmem]' and mempromotion.mem_id=member.mem_id";
$res4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_array($res4);
 ?>
<html>
 <head>
  <title>  </title>
 <body>
 </head>


<table class="table table-striped ">

<tr>
	<th class=" bg-success col-md-offset-5">รหัสลูกค้า<center></center></th>
	<th class=" bg-success col-md-offset-5"><center><?php echo $_SESSION[idmem];?></center></th>
</tr>
<tr>
	<th class=" bg-success col-md-offset-5">ชื่อลูกค้า<center></center></th>
	<th class=" bg-success col-md-offset-5"><center><?php echo $row4[fname].$row4[lname];?></center></th>
</tr>
<tr>
	<th class=" bg-success col-md-offset-5">ตัดแต้ม<center></center></th>
	<th class=" bg-success col-md-offset-5"><center>200</center></th>
</tr>
<tr>
	<th class=" bg-success col-md-offset-5">แต้มสมาชิกคงเหลือ<center></center></th>
	<th class=" bg-success col-md-offset-5"><center><?php echo $row4[mem_Sum];?></center></th>
</tr>
<tr>
	<th class=" bg-success col-md-offset-5">วันที่ส่งสิทธิ์<center></center></th>
	<th class=" bg-success col-md-offset-5"><center><?php echo $datetime;?></center></th>
</tr>
<tr>
	<th class=" bg-success col-md-offset-5">ลายเซ็น<center></center></th>
	<th class=" bg-success col-md-offset-5"><center></center></th>
</tr>
</table>
<center><a href="mempromo.php"><font color="#000000"><div class="btn btn-warning col-md-offset-5 col-md-2 col-xs-12 col-sm-12 ">กลับหน้ารายชื่อ</div></font></center>
<br>

</div>
</div>
<br>
<?php include("../footer.php")   ?>
</div>
</div>
</div>

 </body>
</html>