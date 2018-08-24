
  
  <?php 
include("../conn.php");

  $sql = "select* from flavour";
  $res=mysqli_query($conn,$sql);
  ?>


  
  <!-- <?php include("ooadmin.php");
  ?> -->


<table class="table table-striped table-condensed table-hover">
<center><img src="../image/1123.png" height="100"></center>
<center><a href="formAddflavour.php"><b>เพิ่มข้อมูล</a></center>


<tr>
	<th class=" danger"><b>หัวข้อ</th>
	<th class=" danger"><b>คำถาม</th>
	<th class=" danger"><b>แก้ไข</th>
	<th class=" danger"><b>ลบ</th>

</tr>
  <?php
  while($row=mysqli_fetch_assoc($res)){
	 // echo $row[ID]." - ".$row[Name]." - ".$row[Pic]."<br/>";
?>

<tr>
	<td class=" success"><?php echo $row[num_id] ?></td>
	<td class=" success"><?php echo $row[title] ?></td>
	<td class=" success"><a href="formEditflavour.php?id=<?php echo $row[num_id]; ?>"><font color="#000000"><img src="../image/eDIT.png"width="20"height="20">แก้ไข</font></a></td>
	<td class=" success"><a href="delflavour.php?id=<?php echo $row[num_id]; ?>"><font color="#000000"><img src="../image/delete.png"width="20"height="20">ลบ</font></a></td>
	
</tr>
<?php }?>
</table>


