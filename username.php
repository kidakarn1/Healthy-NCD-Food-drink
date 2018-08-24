<?php
include("conn.php");
$sql="select*from user,member where user.username='$_SESSION[user]'
and member.mem_id=user.user_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$_SESSION[mem_id]=$row[mem_id];
	  ?>
	
	  <center><table border="1">
	  <tr>
	  <th><img src="dwp/<?php echo $row["image"]?>" width="110"  height="120"/></th><br><br>
	 </tr>
	 </table>
	  <?php echo $row[fname];?> <?php echo $row[lname];?></center>
<a href="fromeditmember1.php?id=<?php echo $row[mem_id]?>">
<center><img src="image/eDIT.png" width="20">แก้ไขข้อมูล</a></center><br>
<form method="post" action="logout.php">
<center><input type="submit" value="ออกจากระบบ"></center>
</form>
 </center>