<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="image/icon.ico">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ยินดีต้อนรับสู่DINNERSHOP</title>

        <!-- Bootstrap -->

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dns_9.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">


        </style>
    </head>
	 <body>

	 
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h4>เพิ่มข้อมูล</h4></center></div>
                    <div class="three panel-body">

                        <br>
  
  <?php 
include("conn.php");

  $sql = "select* from evaluation";
  $res=mysqli_query($conn,$sql);
  ?>
<table class="table table-striped table-condensed table-hover">
<center><img src="image/1123.png" height="80"width="90"></center>
<center><a href="formAddevaluation.php">เพิ่มข้อมูล</a></center>
<tr>
	<th class=" danger">หัวข้อ</th>
	<th class=" danger">คำถาม</th>
	<th class=" danger">แก้ไข</th>
	<th class=" danger">ลบ</th>

</tr>
  <?php
  while($row=mysqli_fetch_assoc($res)){
	 // echo $row[ID]." - ".$row[Name]." - ".$row[Pic]."<br/>";
?>

<tr>
	<td class=" success"><?php echo $row[eva_id] ?></td>
	<td class=" success"><?php echo $row[title] ?></td>
	<td class=" success"><a href="formEditevaluation.php?id=<?php echo $row[eva_id] ?>"><font  color="#000000"><img src="image/eDIT.png"width="20"height="20">แก้ไข</a></td>
	<td class=" success"><a href="delevaluation.php?id=<?php echo $row[eva_id] ?>"><font  color="#000000"><img src="image/delete.png"width="20"height="20">ลบ</font></a></td>
	
</tr>
<?php
  }
  
  
  ?>
</table>

</div>
</div>
<br>
</div>
</div>
</div>
