<?php 
include("../conn.php");

$eva_id=$_POST[id];
$id=$_POST[eva_id];
$title=$_POST[title];

$sql="update evaluation set
title='$title' where eva_id='$id' ";
echo $sql;
if($res=mysqli_query($conn,$sql)){
	echo "insert สำเร็จ";
	header("location: insertadminevaluation.php");
}
else{
	echo"insert error????";
}
?>