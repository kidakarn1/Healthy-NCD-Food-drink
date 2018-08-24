<?php
@SESSION_START();
include("conn.php");
$usern=$_POST[username];
$_SESSION[password]=md5($_POST[pass]);
$_SESSION[strshuf];
$str=$_POST[str];
$numcaptcha_md5=$_SESSION['numcaptcha_md5'];
$sql="select*from user where username='$usern' and password='$_SESSION[password]'   ";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$_SESSION[mem_id]=$row[mem_id];
$status=$row[status];
$sta=$row[status];
 if ($row[status]=="staff"){
header("location: index.php");
}

else if ($row[status]=="Blacklist"){
	header("location: index.php?e=3");
}
else if ($row['status']=="Pending"){
	header("location: index.php?Pending=Pending");
}
else if(md5($str)!=$numcaptcha_md5){
	//header("location: index.php?e=str");
	?><meta http-equiv="refresh" content="0; url=index.php?e=str" /><?php
}

else if(mysqli_num_rows($res) and md5($str)==$numcaptcha_md5 and $sta=="Admin"){
 $_SESSION['user']=$usern;
 $_SESSION[status]=$sta;
	echo"สำเร็จ";?>
<meta http-equiv="refresh" content="0; url=Admin/homeadmin.php" />
<?php }


else if(mysqli_num_rows($res) and md5($str)==$numcaptcha_md5 and $sta=="Chef"){
 $_SESSION['user']=$usern;
 $_SESSION[status]=$sta;
	echo"สำเร็จ";?>
<meta http-equiv="refresh" content="0; url=Chef/homechef.php" />
<?php }


else if(mysqli_num_rows($res) and md5($str)==$numcaptcha_md5 and $sta=="Driver"){
 $_SESSION['user']=$usern;
 $_SESSION[status]=$sta;
	echo"สำเร็จ";?>
<meta http-equiv="refresh" content="0; url=Admin/re_car.php" />
<?php }





else if(mysqli_num_rows($res) and md5($str)==$numcaptcha_md5 and $sta=="Staff"){
 $_SESSION['user']=$usern;
 $_SESSION[status]=$sta;
	echo"สำเร็จ";?>
<meta http-equiv="refresh" content="0; url=Admin/homechef.php" />
<?php }


 else if(mysqli_num_rows($res) and md5($str)==$numcaptcha_md5){
 $_SESSION['user']=$usern;
 $sql1="select*from user,member where user.username=$usern
and member.mem_id=user.user_id";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($res1);
$_SESSION[mem_id]=$row1[mem_id];
$_SESSION[status]=$sta;
	echo"สำเร็จ";
	header("location: home.php");
}
else if(mysqli_num_rows($res)){
 $_SESSION['user']=$usern;
	echo"สำเร็จ";
	header("location: home.php");
}
	else if($usern!=$row[username]or $pass!=$row[password]){
	echo"ไม่เร็จ";
	header("location: index.php?e=1");
}

else{
	header("location: index.php?e=1");
}
 $sql1="select*from user,member where user.username='".$_SESSION[user]."'
and member.mem_id=user.user_id";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($res1);
$_SESSION[mem_id]=$row1[mem_id];
?>


