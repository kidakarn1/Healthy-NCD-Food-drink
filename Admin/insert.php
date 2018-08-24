<html>
<head>
<title>ยินดีต้อนรับสู่ Dinnershop  </title>
<LINK REL="SHORTCUT ICON" HREF="image/icon.ico">
<link href="dns.css" rel="stylesheet" type="text/css" />
<style type="text/css">
  
body {
	background-image: url(image/ui.jpg);
	background-attachment:fixed;
}

a:link {
	color: #0000cc;
}
a:visited {
	color: #663300;
}
a:hover {
	color: #330000;
}
a:active {
	color:#000000s ;
}
</style>
</head>
<body>    
<div class="border_insert"></div>
<div class="kid"></div>
<div class="kidindex">
<div class="eng">
<?php
include("conn.php");
include("clogout.php");
include("usernameadmin.php");

?>
</div>

  <div class="insert">
<center><h3><u>รายชื่อสินค้า เครื่องดื่มร้อน</u></h3></center>
 <?php
    $sql1 = "select* from product where cat_id='1'";
	$res1=mysqli_query($conn,$sql1);
	?>
<table border="1">
<tr>
<th bgcolor="#ffcc66">รหัสสินค้า</th>
<th bgcolor="#ffcc66">รูป</th>
<th bgcolor="#ffcc66">ชื่อสินค้า</th>
<th bgcolor="#ffcc66">ราคาสินค้า</th>
<th bgcolor="#ffcc66">คำอธิบาย</th>
<th bgcolor="#ffcc66">ประเภทสินค้า</th>
<th bgcolor="#ffcc66">จำนวนสินค้า</th>
<th bgcolor="#ffcc66">แก้ไข</th>
<th bgcolor="#ffcc66">ลบ</th>
</tr>
    <?php
	while($row1=mysqli_fetch_array($res1)){
?>
<th><center><?php echo $row1[pro_id]?></center></th>
	<td><center><img src="img_products/<?php echo $row1["image"]?>" width="30" /></center></td>
	<th><center><?php echo $row1[pro_name];?></center></th>
	<th><center><?php echo $row1[price]?></center></th>
	<th><center><?php echo $row1[Description]?></center></th>
	<th><center><?php echo $row1[cat_id]?></center></th>
	<th><center><?php echo $row1[pro_number]?></center></th>
	<td><a href="fromeditproductadmin.php?id=<?php echo $row1[pro_id]?>"><font color="#000000"><img src="image/eDIT.png"width="20"height="20">แก้ไข</font></a></td>
	<td><a href="delproductadmin.php?id=<?php echo $row1[pro_id]?>"><font color="#000000"><img src="image/delete.png"width="20"height="20">ลบ</font></a></td>
</tr>
 <?php
	}
echo $_SESSION[imageproduct]=$row1[image];
	?>

	<tr>
	<td colspan="9" bgcolor="#ffcc66"><center><a href="insertproductadmin.php">เพิ่มข้อมูลสินค้า</a> <a href="insert.php">1</a> <a href="insert2.php">2</a> <a href="insert3.php">3</a> <a href="insert4.php">4</a> <a href="insert5.php">5</a></center></td>
	</tr>
	</table>

  <center>
  </div>
 
  <div class="menubarindex">
  <?php include("ooadmin.php");
  ?>
</div>

 <div class="newtable">
<?php
include("right.php");
?>
</div>





<div class="setdownindex_insert"><marquee>เปิด วันจันทร์-วันศุกร์ เปิดบริการ 17.00 นาฬิกา วันเสาร์-วันอาทิตย์ เปิดบริการ 10.00 นาฬิกา โทร:080-1009745,083-1101923</marquee></div>
   </a>

  </div>
 </div>
   </body>
   </html>
