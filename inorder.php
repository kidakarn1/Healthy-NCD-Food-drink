<?php 
include("conn.php");
@SESSION_START();

date_default_timezone_set('asia/bangkok');
$date = date("Y-m-d");
$time = date("H:i:s");
$food_id = $_REQUEST['food_id'];
$price = $_REQUEST['price'];
$number = $_REQUEST['number'];
$total=$price*$number;
$sqlnub="select *from order_ncd";
$resnub=mysqli_query($conn,$sqlnub);
$nub = mysqli_num_rows($resnub);
$order_id=$nub+1;
$sql="insert into order_ncd values(
'$food_id',
'$order_id',
'$number',
'$total',
'{$_SESSION['mem_id']}',
'$date',
'กำลังจัดส่ง',
'1',
'$time',
'พิเศษ'
)";
if($res = mysqli_query($conn,$sql)){
echo $sql."<br>";
echo "สำเร็จ";
	}
?>