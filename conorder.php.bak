<?php 
@SESSION_START();
include("conn.php");
$distance=$_POST[distance];
	 $sql19 = "select*from user,member where user.username='" . $_SESSION[user] . "'
			and member.mem_id=user.user_id" ;
$res19=mysqli_query($conn,$sql19);
$row19=mysqli_fetch_array($res19);
if($_POST[fromorderre]!=''){
$fromorder=$_POST[fromorderre];}
else{$fromorder=$_POST[fromorder];}
 
	$sql2="select*from orderdns ";
	$res2=mysqli_query($conn,$sql2);
	$row2=mysqli_num_rows($res2);
$bill_id=$row2;
	$_SESSION[bill]=$bill_id;
date_default_timezone_set("asia/bangkok");
$order_date=date("y-m-d/h:i:s");


echo $sql="update orderdns set order_id='$bill_id',orderAdd='$_SESSION[confirmaddress]',order_date='$order_date',order_status='กำลังดำเนินการจัดทำ',distance='$_SESSION[distance]',name='$_SESSION[name]',telephone='$_SESSION[telephone_free]' where order_id='' and mem_id='$_SESSION[mem_id]'  ";
$res=mysqli_query($conn,$sql);

$sql4="select sum(order_number) as userorder from orderdns where mem_id='$_SESSION[mem_id]' and order_id!='' ";
$res4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_array($res4);

$sql5="select sum(price_sum) as usersum from orderdns where mem_id='$_SESSION[mem_id]' and order_id!='' ";
$res5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_array($res5);

	
 if($res){
	 echo $_SESSION[mem_id];
	echo $sql3="update mempromotion set mem_Num='$row4[userorder]',mem_Sum='$row5[usersum]' where mem_id='$_SESSION[mem_id]' ";
	$res3=mysqli_query($conn,$sql3);
header("location: finish_order.php");
}


?>