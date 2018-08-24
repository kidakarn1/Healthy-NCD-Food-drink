<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="image/icon.ico">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>สั่งซื่อสินค้า</title>

        <!-- Bootstrap -->

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dns_9.css" rel="stylesheet">

        <style type="text/css">

            body {
                background-image: url(image/ui.jpg);
                background-attachment:fixed;
            }

           
        </style>
    </head>
    <body> 
         <?php
                    include("menu.php");
                    include("conn.php");
                    ?>
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default ">
                   



                    <?php
                    $id = $_POST[id];
                    $product = $_POST[hiddenField];
                    $name = $_POST[hiddenField3];
                    $number = $_POST[number];
                    $price = $_POST[hiddenField2];
                    $allnumber = $number * $price;
                    ?>
<?php 
@SESSION_START();
include("conn.php");
date_default_timezone_set("asia/bangkok");
$order_date=date("h:i:s");
 $sql9 = "select*from user,orderdns,member where user.username='" . $_SESSION[user] . "' and member.mem_id=user.user_id and member.mem_id=orderdns.mem_id" ;
  $res9=mysqli_query($conn,$sql9);
  $row9=mysqli_fetch_array($res9);

 $sql10 = "select*from orderdns where order_status='กำลังดำเนินการจัดทำ'" ;
  $res10=mysqli_query($conn,$sql10);
  $row10=mysqli_num_rows($res10);
   $sql11 = "select*from orderdns where order_status='กำลังดำเนินการจัดทำ'" ;
  $res11=mysqli_query($conn,$sql11);
  $row11=mysqli_fetch_array($res11);
  
   $sumtime=($row9[distance]*2)+($row10*5);//$row9[distance]คือระยะทางของuser*2 คือ1กิโลเมตรใช้เวลาเดินทาง3นาที $row10คือจำนวนแถวที่มีสถานะ กำลังดำเนินการ มีทั้งหมดกี่แถว*5คือ เวลาในการทำ 5 นาทีต่อ 1 สินค้า แล้วนำทั้ง2มาบวกกัน
  
   $timeday=strtotime($order_date);

$Receptiontime=$order_date+$sumtime;
?>
                    <br>
                    <br>
                    <center>
                        <h2>สั่งซื้อเสร็จสิ้น กรุณารอรับสินค้าที่ปลายทางพร้อมทั้งชำระเงิน<?php echo " ".$_SESSION[ordersum]." "; ?></h2>
						<h2>อีก<?php echo  $sumtime;?>นาที สินค้าจะถึงคุณ</h2>
						<h2>จะได้รับของเวลา<font color="#ff0000"><?php echo $_SESSION[timeday]=date("H:i:s", mktime(date("H"), date("i")+$sumtime, date("s")+0))."
";?></font></h2>
                        <h2>ขอบคุณครับ</h2><br>
                        <img src="image/tio.gif" width="350"><br>
                        <br>
                        
                        <a href="insertflavour.php">
                            <h2><center><font color="blue">>>> แบบสอบถาม</font></center></h2></a>
                        <h2><a href="billmem.php"><center><font color="blue">>>> ใบเสร็จ</font></center></a> </h2>
                    </center>
<br>
                </div>
                <?php include("footer.php") ?>
            </div>

        </div>
    </body>
</html>
