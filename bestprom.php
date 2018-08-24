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

                    <div class="panel-heading"><center><h4>รายงานสรุปสินค้าขายดีประจำเดือน</h4></center></div>
                    <div class="three panel-body">

                        <br>

<?php
include("conn.php");
//include("clogout.php");
date_default_timezone_set("asia/bangkok");
 $order=date('y-m-01').'<br>';
 $order_bm=date('y-m-31',strtotime("+1 Month"));
$sql="select*from orderdns,product where order_date between '$order' and '$order_bm' and orderdns.pro_id=product.pro_id group by orderdns.pro_id order by sum(order_number) desc";
$res=mysqli_query($conn,$sql);
?>

<center>
<table class="table table-striped table-condensed table-hover">
<tr>
<td class=" danger" ><center><b>รหัส</center></td>
<td class=" danger"><center><b>ชื่อ</center></td>
<td class=" danger"><center><b>รายระเอียด</center></td>
<td class=" danger"><center><b>รูป</center></td>
<td class=" danger"><center><b>ราคา</center></td>
<td class=" danger"><center><b>ยอดสั่งซื้อ</center></td>
</tr>
<?php while($row=mysqli_fetch_array($res)){
$sql2="select sum(order_number) as proorder from orderdns where order_date between '$order' and '$order_bm' and pro_id=$row[pro_id]  ";
$res2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($res2)
?>
<tr>
<td class=" success"><center><?php echo $row[pro_id];?></center></td>
<td class=" success"><center><?php echo $row[pro_name];?></center></td>
<td class=" success"><center><?php echo $row[Description];?></center></td>
<td class=" success"><center><img src="img_products/<?php echo $row[image];?>"width="20%" height="20%"></center></td>
<td class=" success"><center><?php echo $row[price];?></center></td>
<td class=" success"><center><?php echo $row2[proorder];?></center></td>
</tr>
<?php }?>
</table>
</center>



</div>
</div>
<br>
</div>
</div>
</div>