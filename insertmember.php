<?php
    include "config.php";
    conndb();

    $province_id = $_POST['province'];
    $amphur_id = $_POST['amphur'];
    $district_id = $_POST['district'];

    $sql_1 = "SELECT * FROM province WHERE PROVINCE_ID = '$province_id' ";
    $result_1 = mysql_query($sql_1);
    $row_1 = mysql_fetch_array($result_1);
    $province_name = $row_1['PROVINCE_NAME'];

    $sql_2 = "SELECT * FROM amphur WHERE AMPHUR_ID = '$amphur_id' ";
    $result_2 = mysql_query($sql_2);
    $row_2 = mysql_fetch_array($result_2);
    $amphur_name = $row_2['AMPHUR_NAME'];

    $sql_3 = "SELECT * FROM district WHERE DISTRICT_ID = '$district_id' ";
    $result_3 = mysql_query($sql_3);
    $row_3 = mysql_fetch_array($result_3);
    $district_name = $row_3['DISTRICT_NAME'];
?>
<?php
@SESSION_START();
include("conn.php");
date_default_timezone_set("asia/bangkok");
$datetime=date("yhis");
$_SESSION['date1']=$regis_date=date("y-m-d");
$ex_date=date('Y-m-d',strtotime("+1 year"));
$date_out= date('Y-m_d',strtotime("+7 days"));
$daterow4=$datetime;

?>
<?php
 $id=$_POST['id'];
 $_SESSION['lname']=$_POST['lastname'];
 $_SESSION['fname']=$_POST['firstname'];
 $_SESSION['username']=$_POST['username'];
 $_SESSION['password']=$_POST['password'];
 $_SESSION['age']=$_POST['age'];
 $_SESSION['sex']=$_POST['sex'];
 $_SESSION['number_home']=$_POST['number_home'];
 $_SESSION['mooban']=$_POST['mooban'];
 $_SESSION['Road']=$_POST['Road'];
 $_SESSION['tumbon']=$_POST['tumbon'];
 $_SESSION['email']=$_POST['email'];
 $_SESSION['aumpher']=$_POST['aumpher'];
 $_SESSION['province']=$_POST['province'];
 $_SESSION['postalcode']=$_POST['postalcode'];
 $_SESSION['phone']=$_POST['phone'];
 $_SESSION['emial']=$_POST['emial'];
 $_SESSION['line']=$_POST['line'];
 $_SESSION['Blood']=$_POST['Blood'];
 $_SESSION['education']=$_POST['education'];
 $_SESSION['career']=$_POST['career'];
 $_SESSION['brithday']=$_POST['brithday'];
 $_SESSION['duration']=$_POST['duration'];
  $disease=$_POST['disease'];
  $_SESSION['disease']=$disease1 = implode (",", $disease);
 // var_dump($disease1);
 // print_r($_POST);
 //  echo  $_SESSION['disease'];
 // exit();
 $_SESSION['Previous_symptoms']=$_POST['Previous_symptoms'];
 $_SESSION['Recent_symptoms']=$_POST['Recent_symptoms'];
 $_SESSION['supplementary_food']=$_POST['supplementary_food'];

//$status=$_POST[status];
$numcaptcha_md5=$_SESSION['numcaptcha_md5'];
$str=$_POST['str'];
//exit ();
    if(md5($str)!=$numcaptcha_md5){ 
	header("location: index.php?e=str");
	}
	if($image==''){
		$image='default.png';
}
$sql9="select * from user where username = $_SESSION[phone]";
$res9=mysqli_query($conn,$sql9);
$row9=mysqli_fetch_array($res9);
if($_SESSION[phone]== $row9[username]){
?>
<meta http-equiv="refresh" content="0; url=index.php?phone=<?php echo "5";?>" />
<?php
}
 if(md5($str)==$numcaptcha_md5 and $_SESSION[phone]!= $row9[username])
 {$sql="insert into member values(
'$daterow4',
'',
'$_SESSION[fname]',
'$_SESSION[lname]',
'$_SESSION[age]',
'$_SESSION[sex]',
'$_SESSION[number_home]',
'$_SESSION[mooban]',
'$_SESSION[Road]',
'$district_name',
'$amphur_name',
'$province_name',
'$_SESSION[postalcode]',
'$_SESSION[phone]',
'$_SESSION[email]',
'$_SESSION[Blood]',
'$_SESSION[education]',
'$_SESSION[career]',
'$_SESSION[disease]',
'$_SESSION[duration]',
'$_SESSION[Previous_symptoms]',
'$_SESSION[Recent_symptoms]',
'$_SESSION[supplementary_food]',
'$_SESSION[line]',
'$_SESSION[brithday]',
''
)";
$res=mysqli_query($conn,$sql); 

$phonmd5=md5($_SESSION[phone]);
echo $sql1="insert into user values(
'$daterow4',
'$_SESSION[phone]',
'$phonmd5',
'Pending'
)";
$res1=mysqli_query($conn,$sql1);
}
 if($res and $res1){
echo"update สำเร็จ";
header("location: finismember.php");
}
else{
echo"บันทึกไม่สำเร็จ.....?????";
echo $sql;
}
//echo $sex;
?>