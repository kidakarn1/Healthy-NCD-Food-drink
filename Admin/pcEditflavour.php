<?php 
include("../conn.php");

$num_id=$_POST[id];
$id=$_POST[num_id];
$title=$_POST[title];

$sql="update flavour set
title='$title' where num_id='$id' ";
echo $sql;
if($res=mysqli_query($conn,$sql)){
	echo "insert สำเร็จ";
	header("location: insertadminflavour.php");
}
else{
	echo"insert error????";
}
?>