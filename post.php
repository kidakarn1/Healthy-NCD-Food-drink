  <?php include("conn.php");
$fname=isset($_POST['fname'])?$_POST['fname']:'';
$sql="insert into user values('123','$fname','','')";
if ($res=mysqli_query($conn,$sql)){
	echo "สำเร็จ";
}
  ?>
  


