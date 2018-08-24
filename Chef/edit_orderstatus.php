<?php
include("../conn.php");
$status=$_POST[status];
$orderid=$_POST[order_id];
echo $sql="update orderdns set order_status='$status' where order_id='$orderid' ";
$res=mysqli_query($conn,$sql);
header("location: homechef.php");
?>