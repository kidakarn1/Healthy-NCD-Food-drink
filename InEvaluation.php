<?php
SESSION_START();
include("conn.php");

?>
<?php
$mem_id=$_POST[mem_id];
$Title=$_POST[1];
$Title1=$_POST[2];
$Title2=$_POST[3];
$Title3=$_POST[4];
$Title4=$_POST[5];
$Date_time=$_POST[Date_time];

if($_POST[5]==""){header("location: insertevaluation.php?a=5");}
else if($_POST[4]==""){header("location: insertevaluation.php?a=4");}
else if($_POST[3]==""){header("location: insertevaluation.php?a=3");}
else if($_POST[2]==""){header("location: insertevaluation.php?a=2");}
else if($_POST[1]==""){header("location: insertevaluation.php?a=1");}

else{

$sql="insert into evaluation_form values('DEFAULT',
'$_SESSION[mem_id]','1','$Title','$Date_time')";
$sql1="insert into evaluation_form values('DEFAULT',
'$_SESSION[mem_id]','2','$Title1','$Date_time')";
$sql2="insert into evaluation_form values('DEFAULT',
'$_SESSION[mem_id]','3','$Title2','$Date_time')";
$sql3="insert into evaluation_form values('DEFAULT',
'$_SESSION[mem_id]','4','$Title3','$Date_time')";
$sql4="insert into evaluation_form values('DEFAULT',
'$_SESSION[mem_id]','5','$Title4','$Date_time')";
$res=mysqli_query($conn,$sql);
$res1=mysqli_query($conn,$sql1);
$res2=mysqli_query($conn,$sql2);
$res3=mysqli_query($conn,$sql3);
$res4=mysqli_query($conn,$sql4);

}
if($res&&$res1&&$res2&&$res3&&$res4){
header("location: home.php");
}


?>
