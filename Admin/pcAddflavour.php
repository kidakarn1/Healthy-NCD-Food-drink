<?php 
include("../conn.php");

$num_id=$_POST[num_id];
$title=$_POST[title];

$sql="insert into flavour values('$num_id','$title')";
echo $sql;
if($res=mysqli_query($conn,$sql)){
	echo "insert สำเร็จ";
	header("location: insertadminflavour.php");
}
else{
	echo"insert error????";
}
?>