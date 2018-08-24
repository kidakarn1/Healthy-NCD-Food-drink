<?php
include("../conn.php");
$id=$_GET[id];
$sql="delete from staff where staff_id=$id";
$res=mysqli_query($conn,$sql);

$sql1="delete from user where user_id=$id";
$res1=mysqli_query($conn,$sql1);
if($res and $res1){
echo"ลบสำเร็จ";
	header("location: select_staff.php");
}
else{
echo"error ???";
}

?>