
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
$sql="update staff set
fname='$_SESSION[fname]',
lname='$_SESSION[lname]',
address='$_SESSION[address]',
telephone='$_SESSION[phone]',
sex='$sex',
education='$education',
Salary='$Salary',
staff_Startdate='$staff_Startdate'
where staff_id='$id'";
if ($res=mysqli_query($conn,$sql)){
echo"บันทึก สำเร็จ";
header("location: select_staff.php");
}
else {
echo"บันทึกไม่สำเร็จ.....?????";
echo $sql;
}
?>