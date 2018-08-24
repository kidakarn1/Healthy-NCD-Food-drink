<script LANGUAGE="JavaScript">
function confirmDelete(TEXT,URL) {
if (window.confirm('Delete '+TEXT+' ?')) { window.open(URL,"_top"); }
}
// End -->
</script>
<?php
include("../conn.php");
$id=$_GET['id'];
$sql="delete from member where mem_id='$id'";
$sql1="delete from user where user_id='$id'";
$res=mysqli_query($conn,$sql);
$res1=mysqli_query($conn,$sql1);
if($res and $res1){
echo"ลบสำเร็จ";
	header("location: select_waiting_for_approval.php");
}
else{
echo"error ???";
echo $sql;
echo $sql1;

}

?>