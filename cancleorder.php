<?php 
@session_start();
include("conn.php");
$pro_id=$_GET[pro_id];
$sql2="select*from product where pro_id='$pro_id' ";
$res2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($res2);

$sql3="select*from orderdns where pro_id='$pro_id' and mem_id='$_SESSION[mem_id]' and order_id=''  ";
$res3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_array($res3);

echo $pro_order=$row2[pro_number]+$row3[order_number];

$sql="delete from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' and pro_id='$pro_id' ";
$res=mysqli_query($conn,$sql);
if($res){
	$sql4="update product set pro_number='$pro_order' where pro_id='$pro_id' ";
	$res4=mysqli_query($conn,$sql4);
	header("location: proorder.php");
}
?>