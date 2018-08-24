<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
ul.v_menu{ /* กำหนดขอบเขตของเมนู */
list-style:none;
margin:0px;
padding:0px;
font-family:tahoma, "Microsoft Sans Serif", Vanessa;
font-size:12px;
}
ul.v_menu > li{ /* กำหนดรูปแบบให้กับเมนูหลัก */
display:block;
width:130px;
height:30px;
text-indent:5px;
background-color:;
border:0px  inset;
float:left;
text-align:center;
}
ul.v_menu > li:hover{ /* กำหนดรูปแบบให้กับเมนูเมื่อมีเมาส์อยู่เหนือ */
display:block;
width:130px;
height:30px;
text-indent:5px;
background-color:#ff3300;
border:1px #006600 inset;
float:left;
text-align:center; 
}
ul.v_menu > li > a,ul.v_menu > li > ul > li > a{ /* กำหนดรูปแบบให้กับลิ้งค์ */
text-decoration:none;
color:#ffffff;
line-height:20px;
}
ul.v_menu > li > ul{
display:none;
list-style:none;
margin:0px;
padding:0px;
}
ul.v_menu > li:hover > ul {
display:block;
width:130px;
}  
ul.v_menu > li > ul > li{ /* กำหนดรูปแบบให้กับเมนูย่อย */
display:block;
width:130px;
height:20px;
text-indent:5px;
background-color:#660000;
border:1px #ffffff solid;/*สีเส้น*/
float:left;
text-align:center;
}
ul.v_menu > li > ul > li:hover{ /* กำหนดรูปแบบให้กับเมนูย่อยเมื่อเมาส์อยู่เหนือ */
display:block;
width:130px;
height:20px;
text-indent:5px;
background-color:#ff0000;
border:1px #F4F4F4 solid;
float:left;
text-align:center;
}
</style>
</head>

<body>
<?php 
if ($_SESSION[status]=="Admin"){?>
<ul class="v_menu">
<li><a href="menuadmin.php"><b>หน้าแรก</b></a>
</li>
<li><a href="#"><b>จัดการสมาชิก</b></a>
<ul>
<li><a href="member.php"><b>รายชื่อสมาชิก</b></a></li> 
<li><a href="insertadmin.php"><b>เพิ่มพนักงาน</b></a></li> 
</ul>

<li><a href="sale.php"><b>รายการสั่งซื้อ</b></a></li> 

<li><a href="#"><b>สินค้า</b></a>
<ul>
<li><a href="cproduct.php"><b>เช็คสินค้า</b></a></li> 
<li><a href="insert.php"><b>เพิ่มสินค้า</b></a></li> 

</ul>

<li><a href="#"><b>รายงาน</b></a>
<ul>
<li><a href="rememday.php"><b>ข้อมูลสมาชิกประจำวัน</b></a></li> 
<li><a href="recat.php"><b>ประเภทสินค้า</b></a></li>
<li><a href="bestprom.php"><b>สินค้าขายดีประจำเดือน</b></a></li>
<li><a href="mempromo.php"><b>ผู้ได้รับสิทธิโปรโมชั่น</b></a></li>
<li><a href="Orders_Report.php"><b>ยอดขายประจำวัน</b></a></li>
<li><a href="order_reportm.php"><b>ยอดขายประจำเดือน</b></a></li>
<li><a href="insertadminevaluation.php"><b>แบบประเมิน ร้าน</b></a></li>
<li><a href="insertadminflavour.php"><b>แบบประเมิน สินค้า</b></a></li>
<li><a href="webbord3admin.php"><b>เว็บบรอด</b></a></li>

</ul>

</li> 
</ul>
<?php
} ?>

<?php if ($_SESSION[status]=="Staff"){?>
<ul class="v_menu">

<li><a href="#"><b>สินค้า</b></a>
<ul>
<li><a href="cproduct.php"><b>เช็คสินค้า</b></a></li> 
<li><a href="insert.php"><b>เพิ่มสินค้า</b></a></li> 
</ul>
</li>
<li><a href="sale.php"><b>รายการสั่งซื้อ</b></a></li> 
</ul>
<?php
} ?>


</body>
</html>