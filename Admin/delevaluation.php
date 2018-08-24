<?php
include("../conn.php");

$eva_id=$_GET[id];
$sql="delete from evaluation where eva_id=$eva_id";

$res =mysqli_query($conn,$sql);
if($res){
	echo "ลบสำเร็จ";
	header("location: insertadminevaluation.php");
}
else{
	echo "error ?????";
}
?>