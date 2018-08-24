<?php
include("conn.php");
$id=$_GET[id];
$qid=$_GET[qid];
$sql="delete from web_answer where ask_id='$id'";
$res=mysqli_query($conn,$sql);
if($res){
echo"ลบสำเร็จ";
	header("location: Webboard.php?id=$qid");
}
else{
	echo $sql;
echo"error ???";
}

?>