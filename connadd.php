<?php 
@SESSION_START();
include("conn.php");
$shop=$_POST[shop];
$distance=$_POST[distance];
$name=$_POST[name];
$telephone=$_POST[telephone];
$_SESSION[price_user]=$price_user=$_POST[price_user];
if($_SESSION[user]!=""){
	 $sql19 = "select*from user,member where user.username='" . $_SESSION[user] . "'
			and member.mem_id=user.user_id" ;
$res19=mysqli_query($conn,$sql19);
$row19=mysqli_fetch_array($res19);
}

if($_POST[fromorderre]!=''){
$fromorder=$_POST[fromorderre];}

else{$fromorder=$_POST[fromorder];}

$_SESSION[confirmaddress]=$fromorder;
$_SESSION[distance]=$distance;
$_SESSION[name]=$name;//SESSION นี้คือ คนที่ไม่ได้ login
$_SESSION[telephone_free]=$telephone;//SESSION นี้คือ คนที่ไม่ได้ login
header("location: Confirm.php");
?>