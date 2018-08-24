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
	    <body background='image/background-becomevendor.jpg'>


	 
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h4>รายงานข้อมูลสมาชิกประจำวัน</h4></center></div>
                    <div class="three panel-body">

                        <br>

<?php
include("conn.php");
//include("clogout.php");
$sql="select*from member where register_date=curdate()";
$res=mysqli_query($conn,$sql);


?>


<table class="table table-striped table-condensed table-hover">
<tr>
<td class=" danger"><center><b>ลำดับ</center></td>
<td class=" danger"><center><b>รหัสสมาชิก</center></td>
<td class=" danger"><center><b>ชื่อ</center></td>
<td class=" danger"><center><b>นามสกุล</center></td>
<td class=" danger"><center><b>วันที่สมัคร</center></td>
</tr>
</table>

<?php while($row=mysqli_fetch_array($res)){
$i++ ?>
<table class="table table-striped table-condensed table-hover">
<tr>
<td class=" success"><center><?php echo $i?></center></td>
<td class=" success"><center><?php echo $row[mem_id];?></center></td>
<td class=" success"><?php echo $row[fname];?></td>
<td class=" success"><?php echo $row[lname];?></td>
<td class=" success"><center><?php echo $row[register_date];?></center></td>
</tr>
<?php }?>
</table>

</div>
</div>
<br>
</div>
</div>
</div>

