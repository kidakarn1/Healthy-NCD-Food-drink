<?php 
@SESSION_START();
include("conn.php");
      date_default_timezone_set("asia/bangkok");
$datetime=date("d-m-y / h:i");
//$id_webboard=$_POST[id_webboard];			
$web_title=$_POST[board_title];
//$web_Description=$_POST[web_Description];
$mem_id=$_POST[mem_id];
//$web_date=$_POST[date_time"];
$board_description=$_POST[board_description];

//echo "d= ".$board_description." t= ".$web_title;
//exit();
if ($web_title==null  ){
	header("location: webbord3.php");
	exit();
}

$sql="INSERT INTO web_board 
VALUES (NULL, 
'$web_title',
'$_SESSION[mem_id]',
'$datetime',
'$board_description'
)";
//echo $sql;
$res=mysqli_query($conn,$sql);
if($res){
echo"บันทึกสำเร็จ";
header("location: Webboard.php");
}
else {
echo"บันทึกไม่สำเร็จ.....?????";
echo $sql;
}

?>
	