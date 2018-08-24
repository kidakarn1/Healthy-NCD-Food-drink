       <?php   @SESSION_START();
	   include("../conn.php");
if($_SESSION[user]=="" or $_SESSION[status]!="Admin"){
header("location: ../index.php");
}
?>
<?php
if($_SESSION[user]!=""and $_SESSION[status]=="Admin"){
       ?>
	   <html>
<head>
<title>ยินดีต้อนรับสู่ Dinnershop  </title>
<LINK REL="SHORTCUT ICON" HREF="../image/icon.ico">
<link href="../css/dns.css" rel="stylesheet" type="text/css" />
<style type="text/css">
  
body {
	background-image: url(image/ui.jpg);
	background-attachment:fixed;
}

a:link {
	color: #FFF;
}
a:visited {
	color: #FFF;
}
a:hover {
	color: #FF9;
}
a:active {
	color: #FF0;
}
</style>
</head>
<body onLoad="window.print()">   


<?php 
include("../conn.php");
$usernumber=$_GET[id];
$sql="select*from member where mem_id=$usernumber";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
?>


<div class="card1"><img src="../image/card.gif"height="220"></div>

<div class="card">
<table>
<tr>
<td><font size="2">รหัส<?php echo "  ". $row[mem_id]?></font></td>
</tr>
<tr>
<td><font size="2">ชื่อ<?php echo "  ". $row[fname]."   ".$row[lname]?></font></td>
</tr>
<tr>
<td><font size="2">วันที่สมัคร<?php echo "  ". $row[register_date] ?></font></td>
</tr>
<tr>
<td><font size="2">วันหมดอายุ<?php echo "  ". $row[expired_Date]?></font></td>
</tr>
</tr>
<tr>
<td><img src="barcode.php?text=<?php echo $row[mem_id];?>" /></td>
</tr>
</table>
</div>
<?php }?>