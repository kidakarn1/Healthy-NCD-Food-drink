<?php
include("../conn.php");
$id=$_GET[id];
$sql="delete from web_board where web_id='$id'";
$res=mysqli_query($conn,$sql);
if($res){
echo"ลบสำเร็จ";
	header("location: WebboardAdmin.php");
}
else{
	echo $sql;
echo"error ???";
}

?>
