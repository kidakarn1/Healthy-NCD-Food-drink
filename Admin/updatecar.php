
<?php 
@SESSION_START();
include("../conn.php");?>

<?php
date_default_timezone_set("asia/bangkok");

?>
<?php
$id=$_POST[car_id1];
$order_id=$_POST[order_id];
$_SESSION[lname]=$_POST[lname];
$status=$_POST[status];
?>
<?php
  
$sql="update car set
status='$status'
where car_id='$id'";
$res=mysqli_query($conn,$sql);      
  if ($status=="ไม่ว่าง"){
$sql2="update orderdns set
car_id='$id',
order_status='กำลังดำเนินการจัดส่ง'    
where order_id='$order_id'";
$res2=mysqli_query($conn,$sql2);
  }
if ($res){
echo"บันทึก สำเร็จ";
echo $sql;

echo $sql2;
//echo $sql;
header("location: finish_order.php");
//header("location: finish_order.php");
}
else {
echo"บันทึกไม่สำเร็จ.....?????";
echo $sql;
}
?>