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

                    <div class="panel-heading"><center><h4>ลบหัวข้อกระทู้</h4></center></div>
                    <div class="three panel-body">

                        <br>

<?php
   //include("clogout.php");
 include("usernameadmin.php");
 //echo $_SESSION[mem_id];
 $sql1="select*from web_board ;";
$res1=mysqli_query($conn,$sql1);
?>


<form name="form1" method="post" action="">
   <table class="table table-striped table-condensed table-hover">
	 
	  <br ><tr>
	  <td class=" danger"><b><font color="#000000">ลำดับ</font></td>
      <td class=" danger"><b><font color="#000000">ชื่อหัวข้อ</font></td>
     <td class=" danger"><b><font color="#000000">ผู้ตั้งคำถาม</font></td>
     <td class=" danger"><b><font color="#000000">เวลาที่โพส</font></td>

      <?php 
	  if ($_SESSION[status]=="Admin"){?>
       <td class=" success"><font color="#000000">ลบ</font></td>
<?php }?>
     </tr>
 
   <?php $CO=0;
   while ($row1=mysqli_fetch_array($res1)){
	   $CO++;
	   ?>
	  <tr ba-color:#f8f8f8;>
	     <td class=" success"><?php echo $CO;?></td>
	     <td class=" success"><a href="webbord1.php?id=<?php echo $row1[web_id];?>"><font color="#330000"><?php echo $row1[web_title];?></font></a></td>
         <td class=" success"><?php echo getName($row1[mem_id]);?></td>
		 <td class=" success"><?php echo $row1[board_date];?></td>

	  <?php if ($_SESSION[status]=="Admin"){?>
		<td class=" success"><a href="deltitleadmin.php?id=<?php echo $row1[web_id];?>"><img src="image/delete.png"width="20"height="20"></a></td>
		 <?php }?>
     </tr>
   <?php }?>
  </table>
  </form>




<!-- 
  <?php include("ooadmin.php");
  ?> -->


<!-- 
   <form method="post" action="search.php">
   <input type="text" name="name_product">
   <input type="submit" value="ค้นหา">
</form>
 -->



<?php
//include("right.php");
function getName($id){
	global $conn;
	$sql="select * from member where mem_id='$id'";
	//echo $sql;
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
	return $row[fname];
}
?>


   </a>

</div>
</div>
<br>
</div>
</div>
</div>
