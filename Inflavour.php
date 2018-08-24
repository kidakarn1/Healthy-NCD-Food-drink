<?php
@SESSION_START();
include("conn.php");
?>
<?php
$mem_id=$_SESSION[mem_id];
$Title=$_POST[1];
$Title1=$_POST[2];
$Title2=$_POST[3];
$Title3=$_POST[4];
$Title4=$_POST[5];

if($_POST[5]==""){header("location: insertflavour.php?a=1");}
else if($_POST[4]==""){header("location: insertflavour.php?a=2");}
else if($_POST[3]==""){header("location: insertflavour.php?a=3");}
else if($_POST[2]==""){header("location: insertflavour.php?a=4");}
else if($_POST[1]==""){header("location: insertflavour.php?a=5");}

else{

$sql="insert into flavour_form values('DEFAULT',
'$mem_id','1','$Title')";
$sql1="insert into flavour_form values('DEFAULT',
'$mem_id','2','$Title1')";
$sql2="insert into flavour_form values('DEFAULT',
'$mem_id','3','$Title2')";
$sql3="insert into flavour_form values('DEFAULT',
'$mem_id','4','$Title3')";
$sql4="insert into flavour_form values('DEFAULT',
'$mem_id','5','$Title4')";
$res=mysqli_query($conn,$sql);
$res1=mysqli_query($conn,$sql1);
$res2=mysqli_query($conn,$sql2);
$res3=mysqli_query($conn,$sql3);
$res4=mysqli_query($conn,$sql4);

}
if($res&&$res1&&$res2&&$res3&&$res4){
header("location: finish_order.php");
}


?>
