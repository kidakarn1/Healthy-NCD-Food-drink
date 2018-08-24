<?php 
@session_start();
include("conn.php");
$pro_id=$_POST[idproduct];
$ordernumber=$_POST[ordernumber];

 $sql2="select*from product where pro_id='$pro_id'";
 $res2=mysqli_query($conn,$sql2);
 $row2=mysqli_fetch_array($res2);

 $sql3="select*from orderdns  where pro_id='$pro_id' and mem_id='$_SESSION[mem_id]' and order_id='' ";
 $res3=mysqli_query($conn,$sql3);
 $row3=mysqli_fetch_array($res3);



 $order_sum=$row2[price]*$ordernumber;


$sql="update orderdns set order_number='$ordernumber',price_sum='$order_sum' where pro_id='$pro_id' and mem_id='$_SESSION[mem_id]' and order_id=''";
$res=mysqli_query($conn,$sql);

 if($res){
header("location: proorder.php");
}
?>