<?php
include("../conn.php");
$id=$_GET[id];
$sql="delete from `orderdns` where order_id=$id";
$res=mysqli_query($conn,$sql);
if($res){
echo"ลบสำเร็จ";
	header("location: homechef.php");
}
else{
echo"error ???";
}

?>