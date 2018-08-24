
<?php
include("conn.php");
//include("clogout.php");
$sql="select*from user,staff where user.username='$_SESSION[user]'
and staff.staff_id=user.user_id";

$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
	  ?>
	<!-- <table border="1">
	<tr>
	<td bgcolor="#ffcc66" align="right">ชื่อ:</td><td bgcolor="#ffffff"><?php echo $row[fname];?>&nbsp;<?php echo $row[lname];?></h4></td>
	</tr>
	<tr>
	<td bgcolor="#ffcc66">สถานะ:</td><td bgcolor="#ffffff"><?php echo $_SESSION[status]=$row[status];?></h4></td><br>
	</tr>
	</table> -->
<?php if($row[status]=="Admin") {?>
<a href="fromeditmember3.php?id=<?php echo $row[staff_id];?>">
<center><img src="image/eDIT.png" width="20">แก้ไขข้อมูล</a></center><br>
<?php } ?>
<!-- <form method="post" action="logout.php">
<center><input type="submit" value="ออกจากระบบ"></center>
</form> -->