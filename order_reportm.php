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

                    <div class="panel-heading"><center><h4>รายงานสรุปยอดขาย</h4></center></div>
                    <div class="three panel-body">

                        <br>

<?php
include("conn.php");
//include("clogout.php");
date_default_timezone_set("asia/bangkok");
 $order=date('y-m-01').'<br>';
 $order_bm=date('y-m-31',strtotime("+1 Month"));

    $sql ="select* from orderdns,product where orderdns.order_date between '$order' and '$order_bm' and orderdns.pro_id=product.pro_id   order by order_id asc";
	$res=mysqli_query($conn,$sql);
	$sql2="select sum(price_sum) as ordersum from orderdns where orderdns.order_date between '$order' and '$order_bm' ";
	$res2=mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_array($res2);

	$order_m=date("m");?>
	<center>
	ประจำเดือน <?php echo $order_m;?>


<table class="table table-striped table-condensed table-hover">
<tr>
<th class=" danger"><b>เลขที่</th>
<th class=" danger"><b>รายการ</th>
<th class=" danger"><b>จำนวน</th>
<th class=" danger"><b>ราคา</th>
<th class=" danger"><b>รวมเงิน</th>
<th class=" danger"><b>หมายยเหตุ</th>
</tr>
<?php while($row=mysqli_fetch_assoc($res)){?>
<?php  $sum=$row[order_number]*$row[price];?>
<th class=" success"><?php echo $row[order_id];?></th>
<th class=" success"><?php echo $row[pro_name];?></th>
<th class=" success"><?php echo $row[order_number];?></th>
<th class=" success"><?php echo $row[price];?></th>
<th class=" success"><?php echo $sum;?></th>
<th class=" success"></th>

</tr>
<?php } ?>
<tr>
<th colspan="8" bgcolor="#ffff99">ยอดขายที่ขายออกไป <?php echo $row2[ordersum];?></th>
</tr>
</table>
</center>

</div>
</div>
<br>
</div>
</div>
</div>
