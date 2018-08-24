<?php
include("../conn.php");

$num_id=$_GET[id];
$sql="delete from flavour where num_id=$num_id";

$res =mysqli_query($conn,$sql);
if($res){
	echo "ลบสำเร็จ";
	header("location: insertadminflavour.php");
}
else{
	echo "error ?????";
}
?>