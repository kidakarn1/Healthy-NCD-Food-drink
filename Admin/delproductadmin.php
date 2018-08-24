<script LANGUAGE="JavaScript">
function confirmDelete(TEXT,URL) {
if (window.confirm('Delete '+TEXT+' ?')) { window.open(URL,"_top"); }
}
// End -->
</script>
<?php
include("../conn.php");
$id=$_GET['id'];
$sql="delete from food where food_id=$id";
$res=mysqli_query($conn,$sql);
if($res){
echo"ลบสำเร็จ";
	header("location: insert_product.php");
}
else{
echo"error ???";
}

?>