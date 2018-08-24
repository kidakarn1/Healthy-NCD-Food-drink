<?php 
SESSION_START();
include("conn.php");
include("clogout.php"); 
date_default_timezone_set("asia/bangkok");
$datetime=date("d-m-y / h:i");
		
$board_description=$_POST[board_description];
$board_answer=$_POST[web_id];
$name=$_POST[mem_id];
$id=$_POST[id];
echo $name;
//echo $board_description;
$sql4="select*from web_answer";
$res4=mysqli_query($conn,$sql4);
$row4=mysqli_num_rows($res4);
echo $sql;
$sql="INSERT INTO web_answer VALUES (
'',
'".$_SESSION[web_id]."',
'".$board_description."',
'".$_SESSION[mem_id]."',
'".$datetime."')";
//echo $sql;
$res=mysqli_query($conn,$sql);
if($res){
echo"บันทึกสำเร็จ";
header("location: Webboard.php?id=$id");
}
else {
echo"บันทึกไม่สำเร็จ.....?????";
echo $sql;
//echo $sql;
}

?>
	