<?php
session_start();
include("conn.php");
?>

<?php
$id=$_POST[id];

$password=md5($_POST[password]);

echo $sql1="update user set 
password='$password'
where user_id='$id'
";
$res1=mysqli_query($conn,$sql1);
if ($res1){
echo"update สำเร็จ";
header("location: home.php");

}
else {
echo $sql;
echo"บันทึกไม่สำเร็จ.....?????";
}
?>




