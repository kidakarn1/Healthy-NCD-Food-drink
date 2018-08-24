<?php 
include("../conn.php");
date_default_timezone_set("asia/bangkok");
$date_register = date ("Y-m-d",strtotime("+1 days"));
$date_out= date('Y-m_d',strtotime("+7 days"));
$id=$_GET['id'];
$sql="update user set status='User' where user_id='$id'";
$sql1="update member set register_date='$date_register', expired_date='$date_out' where mem_id='$id'";



if ($res=mysqli_query($conn,$sql) and $res=mysqli_query($conn,$sql1)){;
echo "แก้ไขสำเร็จ";
header("location: select_waiting_for_approval.php");
}
else{
	
	echo "แก้ไขไม่สำเร็จ";
	echo $sql;
}
?>