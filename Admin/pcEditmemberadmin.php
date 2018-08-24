<?php
@SESSION_START();
include("../conn.php");
?>
<h1>Up Load File</h1>
<?php
$rootdir = "../dwp"; 
//กำหนด directory สำหรับเก็บ file ที่จะ upload เข้าไป
$limitfile=10000000000; 
//กำหนด ขนาด file ที่อนุญาติให้โหลดเข้ามาเก็บได้ (ต่อ 1 file) หน่วยเป็น byte
$a="$rootdir/".$_FILES["file"]["name"] ;
echo $a;

	if (empty($_FILES["file"]["size"])){
		echo "ไม่สามารถส่งไฟล์นี้ได้กรุณาตรวจสอบไฟล์ของท่านด้วยครับ";}
	else if($_FILES["file"]["size"]>$limitfile){
		echo "หวาๆๆๆ ไฟล์ใหญ่ไปน้าาาา";} 
	else {
		copy($_FILES["file"]["tmp_name"],$a); 
		echo " ได้รับไฟล์แล้ว ชื่อ ".$_FILES['file']['name']." ขนาด ".$_FILES['file']['size']/ 1024 . " Kb<br>";
	}
?>




<?php
$id=$_POST[id];
$fname=$_POST[fname];
$lname=$_POST[lname];
$username=$_POST[username];
$image=$_FILES['file']['name'];
$imagemem=$_POST[imagemem];
$sex=$_POST[sex];
$phone=$_POST[phone];
$facebook=$_POST[facebook];
$line=$_POST[line];
$home_number=$_POST[home_number];
$mooban=$_POST[mooban];
$Road=$_POST[Road];
$tumbon=$_POST[tumbon];
$aumpher=$_POST[aumpher];
$province=$_POST[province];
$postalcode=$_POST[postalcode];
$email=$_POST[email];
$status=$_POST[status];
echo$_SESSION[imagemember];
if($_POST[status]==''){$status=$_SESSION[statusmem];}

if($_FILES['file']['name']==""){$image=$_SESSION[imagemember];}
if($status==""){$status="User";}


$sql="update member set 
fname='$fname',
lname='$lname',
telephone='$phone',
sex='$sex',
line_id='$line',
email='$email',
home_number='$home_number',
mooban='$mooban',
Road='$Road',
tumbon='$tumbon',
aumpher='$aumpher',
province='$province',
postalcode='$postalcode'
where mem_id='$id'";

$res=mysqli_query($conn,$sql) ;
$sql1="update user set 
username='$username',
status='$status'
where user_id='$id'
";
$res1=mysqli_query($conn,$sql1);
if ($res and $res1 ){
echo"update สำเร็จ";
header("location: select_member.php");

}
else {
echo $sql;
echo"บันทึกไม่สำเร็จ.....?????";
}
?>




