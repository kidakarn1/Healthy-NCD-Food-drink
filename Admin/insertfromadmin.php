
<?php 
SESSION_START();
include("../conn.php");?>

<?php
date_default_timezone_set("asia/bangkok");
$datetime=date("yhis");

$regis_date=date("y-m-d");
$ex_date=date('Y-m-d',strtotime("+1 year"));

$daterow4=$datetime;
?>
<?php
$id=$_POST[id];
$id_card=$_POST[id_card];
$_SESSION[lname]=$_POST[lname];
$_SESSION[fname]=$_POST[fname];
$_SESSION[username]=$_POST[username];
$_SESSION[password]=$_POST[password];
echo $image=$_FILES['file']['name'];
$sex=$_POST[sex];
$_SESSION[phone]=$_POST[phone];
$_SESSION[facebook]=$_POST[facebook];
$_SESSION[line]=$_POST[line];
$_SESSION[address]=$_POST[address];
$status=$_POST[status];
$education=$_POST[education];
$Salary=$_POST[Salary];
$staff_Startdate=$_POST[staff_Startdate];
 $numcaptcha_md5=$_SESSION['numcaptcha_md5'];
$str=$_POST[str];
?>
<?php
$sql="insert into staff values(
'$daterow4',
'".$_SESSION[fname]."',
'".$_SESSION[lname]."',
'".$_SESSION[address]."',
'".$_SESSION[phone]."',
'".$sex."',
'".$education."',
'".$Salary."',
'".$staff_Startdate."'
)";

$password_md5=md5($_SESSION[password]);
$sql1="insert into user values(
'$daterow4',
'".$_SESSION['username']."',
'".$password_md5."',
'".$status."'
)";

if ($res=mysqli_query($conn,$sql) and $res1=mysqli_query($conn,$sql1) ){
echo"บันทึก สำเร็จ";
echo $sql;
echo $sql5;
header("location: select_staff.php");

}
else {
echo"บันทึกไม่สำเร็จ.....?????";
echo $sql;
}
?>