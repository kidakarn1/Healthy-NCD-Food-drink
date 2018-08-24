<?php 
include("../conn.php");

$eva_id=$_POST[eva_id];
$title=$_POST[title];

$sql="insert into evaluation values('$eva_id','$title')";
echo $sql;
if($res=mysqli_query($conn,$sql)){
	echo "insert สำเร็จ";
	header("location: insertadminevaluation.php");
}
else{
	echo"insert error????";
}
?>