
<?php
include("../conn.php");
$image=$_POST[image];
$pro_name=$_POST[pro_name];
$pro_Description=$_POST[pro_Description];
$pro_Dateon=$_POST[pro_Dateon];
$pro_Dateend=$_POST[pro_Dateend];

$image2=$_POST[image2];
$pro_name2=$_POST[pro_name2];
$pro_Description2=$_POST[pro_Description2];
$pro_Dateon2=$_POST[pro_Dateon2];
$pro_Dateend2=$_POST[pro_Dateend2];


$image3=$_POST[image3];
$pro_name3=$_POST[pro_name3];
$pro_Description3=$_POST[pro_Description3];
$pro_Dateon3=$_POST[pro_Dateon3];
$pro_Dateend3=$_POST[pro_Dateend3];

$image4=$_POST[image4];
$pro_name4=$_POST[pro_name4];
$pro_Description4=$_POST[pro_Description4];
$pro_Dateon4=$_POST[pro_Dateon4];
$pro_Dateend4=$_POST[pro_Dateend4];

$image5=$_POST[image5];
$pro_name5=$_POST[pro_name5];
$pro_Description5=$_POST[pro_Description5];
$pro_Dateon5=$_POST[pro_Dateon5];
$pro_Dateend5=$_POST[pro_Dateend5];

//if($_FILES['file']['name']==""){$image=$_SESSION[imagemember];}
$sql3="update promotion set 
promotion_name='$pro_name',
description='$pro_Description',
image='$image',
promotion_Dateon='$pro_Dateon',
promotion_Dateoff='$pro_Dateend'
where promotion_id='1'";

$sql4="update promotion set 
promotion_name='$pro_name2',
description='$pro_Description2',
image='$image2',
promotion_Dateon='$pro_Dateon2',
promotion_Dateoff='$pro_Dateend2'
where promotion_id='2'";

$sql5="update promotion set 
promotion_name='$pro_name3',
description='$pro_Description3',
image='$image3',
promotion_Dateon='$pro_Dateon3',
promotion_Dateoff='$pro_Dateend3'
where promotion_id='3'";


$sql7="update promotion set 
promotion_name='$pro_name4',
description='$pro_Description4',
image='$image4',
promotion_Dateon='$pro_Dateon4',
promotion_Dateoff='$pro_Dateend4'
where promotion_id='4'";


$sql8="update promotion set 
promotion_name='$pro_name5',
description='$pro_Description5',
image='$image5',
promotion_Dateon='$pro_Dateon5',
promotion_Dateoff='$pro_Dateend5'
where promotion_id='5'";

if ($res3=mysqli_query($conn,$sql3) and $res4=mysqli_query($conn,$sql4) and $res5=mysqli_query($conn,$sql5) and $res7=mysqli_query($conn,$sql7) and $res8=mysqli_query($conn,$sql8)){
echo"update สำเร็จ";
header("location: homeadmin.php");

}
else {
echo"บันทึกไม่สำเร็จ.....?????";
echo $sql3;
}
?>




