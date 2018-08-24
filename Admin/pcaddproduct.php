<center>
<h1>Up Load File</h1>
</center>
<p>
<hr size=1>
<?php
$rootdir = "../img_products"; 
//กำหนด directory สำหรับเก็บ file ที่จะ upload เข้าไป
$limitfile=10000000000; 
//กำหนด ขนาด file ที่อนุญาติให้โหลดเข้ามาเก็บได้ (ต่อ 1 file) หน่วยเป็น byte
$a="$rootdir/".$_FILES["file"]["name"] ;
echo $a;

		copy($_FILES["file"]["tmp_name"],$a); 
		echo " ได้รับไฟล์แล้ว ชื่อ ".$_FILES['file']['name']." ขนาด ".$_FILES['file']['size']/ 1024 . " Kb<br>";




?>

<img src="<?php echo $a?>" >
<!-- <meta http-equiv="refresh" content="2; URL=.">	 -->

<?php
include("../conn.php");
?>
<?php
$name=$_POST['name'];
$category_foods=$_POST['category_foods'];
$raw_material=$_POST['raw_material'];
$image=$_FILES['file']['name'];
$disease=$_POST['disease'];
$price=$_POST['price'];
$disease=$_POST['disease'];
$benefit=$_POST['benefit'];
$sql_dis="select * from food where food_id like '$disease%' order by food_id desc limit 1";
$res_dis=mysqli_query($conn,$sql_dis);
$row_dis=mysqli_fetch_assoc($res_dis);
// die(var_dump($row_dis));

if($row_dis['food_id']){
	$food_id=$row_dis['food_id']+1;
// $id=str_split($row_dis['food_id']);
// $f = $id[0];
// $s = "";
// foreach ($id as $key => $value) {
// 	if($key != 0)
// 		$s .= $value;
 }

// $i = 0;
// var_dump($id);
// for( ; $i< sizeof($id); $i++){
// 	if($i > 0)
// 		$s .= $id[$i];
// }

//  $food_id = $f.($s +1);
//  die($food_id.' ');
// }
else{
$food_id = $disease.'001';
}
// print_r($row_dis);
//nameต้องมาจากdatabase name='$name' $nameคือ ตัวแปรที่เราตั้งขึ้น $name=$_POST[name];
$sql="insert into food values(
'$food_id ',
'$name',
'$raw_material',
'$disease',
'$category_foods',
'$image',
'$price',
'$benefit'
)";
//echo $_FILES[file];
echo $sql;
if ($res=mysqli_query($conn,$sql)){
echo"update สำเร็จ";
header("location: insert_product.php");

}
else {
echo"บันทึกไม่สำเร็จ.....?????";
// echo $sql;
}

?>




