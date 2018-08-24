<center>
<h1>Up Load File</h1>
</center>
<p>
<hr size=1>
<?php
$rootdir = "upimage"; 
//กำหนด directory สำหรับเก็บ file ที่จะ upload เข้าไป
$limitfile=10000000000; 
//กำหนด ขนาด file ที่อนุญาติให้โหลดเข้ามาเก็บได้ (ต่อ 1 file) หน่วยเป็น byte
$a="$rootdir/".$_FILES["file"]["name"] ;
echo $a;

		copy($_FILES["file"]["tmp_name"],$a); 
		echo " ได้รับไฟล์แล้ว ชื่อ ".$_FILES['file']['name']." ขนาด ".$_FILES['file']['size']/ 1024 . " Kb<br>";




?>

<img src="<?php echo $a?>" >
<?php 
@SESSION_START();
include("conn.php");
      date_default_timezone_set("asia/bangkok");
$datetime=date("d-m-y / h:i");
//$id_webboard=$_POST[id_webboard];			
//$web_title=$_POST[board_title];
//$web_Description=$_POST[web_Description];
//$mem_id=$_POST[mem_id];
//$web_date=$_POST[date_time"];
//$board_description=$_POST[board_description];
$Description=$_POST[Description];
$name=$_POST[fname];
$datetime1=$_POST[datetime];
$image=$_FILES['file']['name'];
//echo "d= ".$board_description." t= ".$web_title;
//exit();
	if($image==''){
		$image='1.jpg';
}
$sql="INSERT INTO upimage 
VALUES (NULL, 
'$_SESSION[mem_id]',
'$Description',
'$image',
'$datetime1'
)";
//echo $sql;
$res=mysqli_query($conn,$sql);
if($res){
echo"บันทึกสำเร็จ";
header("location: atmosphere.php");
}
else {
echo"บันทึกไม่สำเร็จ.....?????";
echo $sql;
}

?>
	