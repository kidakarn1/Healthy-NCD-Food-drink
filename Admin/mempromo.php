       <?php   @SESSION_START();
	   include("../conn.php");
if($_SESSION[user]=="" or $_SESSION[status]!="Admin"){
header("location: ../index.php");
}
?>
<?php
if($_SESSION[user]!=""and $_SESSION[status]=="Admin"){
       ?>
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
<body <?php
	 $print1=$_GET[p];
		if  ($print1=="1"){echo "onLoad='window.print()'";}
		?>>
        <?php
        include "menu.php";
        @session_start();
        include("../conn.php");
        ?>

	 
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h4>สรุปรายชื่อผู้รับสิทธิโปรโมชั่น</h4></center></div>
                    <div class="three panel-body">

                        <br>

<?php 
include("../conn.php");
//include("clogout.php");
$sql="select*from mempromotion,member where mempromotion.mem_id=member.mem_id and mempromotion.	mem_Sum>=200 ";
$res=mysqli_query($conn,$sql);

 ?>

  <center><table class="table table-striped table-condensed table-hover">
  <tr>
  <td class=" danger"><b>ชื่อ</td>
  <td class=" danger"><b>จำนวนยอดการสั่งซื้อ</td>
  <td class=" danger"><b>ยอดราคาการสั่งซื้อ</td>
  <td class=" danger"><b>รับโปรโมชั่น</td>
  <tr>
  <?php while($row=mysqli_fetch_array($res)){
 ?>
   <tr>
  <td class=" success"><?php echo $row[fname]."  ".$row[lname];?></td>
  <td class=" success"><?php echo $row[mem_Num];?></td>
  <td class=" success"><?php echo $row[mem_Sum];?></td>
  <td class=" success"><a href="randd.php?idmem=<?php echo $row[mem_id];?>">รับโปรโมชั่น</a></td>
  <tr>
  <?php }?>
  </table>
  <a href="mempromo.php?p=<?php echo"1";?>" class="btn btn-primary">ปริ้น</a>	
  </center>


  </div>
</div>
<br>
<?php include("../footer.php")   ?>
</div>
</div>

<?php }?>