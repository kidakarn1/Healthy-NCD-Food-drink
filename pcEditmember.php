<?php
session_start();
include("conn.php");
?>
<center>
<h1>Up Load File</h1>
<?php
$rootdir = "dwp"; 
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
$name=$_POST[fname];
$surname=$_POST[lname];
$image=$_FILES['file']['name'];
$sex=$_POST[sex];
$phone=$_POST[phone];
$facebook=$_POST[facebook];
$line=$_POST[line];
$address=$_POST[address];
echo$_SESSION[imagemember];

if($_FILES['file']['name']==""){$image=$_SESSION[imagemember];}
	


$sql="update member set 
address='".$address."',
telephone='".$phone."',
line_id='".$line."',
facebook='".$facebook."',
fname='".$name."',
lname='".$surname."',
image='".$image."',
sex='".$sex."'
where mem_id='$id'";

$res=mysqli_query($conn,$sql);

if ($res){
echo"update สำเร็จ";
header("location: home.php");

}
else {
echo $sql;
echo"บันทึกไม่สำเร็จ.....?????";
}
?>




