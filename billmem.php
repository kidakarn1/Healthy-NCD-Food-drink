<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="image/icon.ico">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>สั่งซื่อสินค้า</title>

        <!-- Bootstrap -->

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dns_9.css" rel="stylesheet">

        <style type="text/css"></style>
    </head>
<body <?php
	 $print1=$_GET[p];
		if  ($print1=="1"){echo "onLoad='window.print()'";}
		?>>


        <?php
        @session_start();
        include("conn.php");
        include("menu.php");
//include("clogout.php");
        $sql = "select*from orderdns,product where order_id='$_SESSION[bill]' and orderdns.pro_id=product.pro_id";
        $res = mysqli_query($conn, $sql);
        $res6 = mysqli_query($conn, $sql);
        $row6 = mysqli_fetch_array($res6);

        $sql2 = "select sum(price_sum) as sumbill from orderdns where order_id='$_SESSION[bill]' ";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($res2);

        $sql3 = "select sum(order_number) as sumorderbill from orderdns where order_id='$_SESSION[bill]' ";
        $res3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_array($res3);


        $sql5 = "select*from member where mem_id='$_SESSION[mem_id]' ";
        $res5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_fetch_array($res5);

        $sql7 = "select*from member where mem_id='$_SESSION[mem_id]' ";
        $res7 = mysqli_query($conn, $sql7);
        $row7 = mysqli_fetch_array($res7);
        date_default_timezone_set("asia/bangkok");
        $datetime = date("y-m-d/h:i:s");
        ?>
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default ">

                    <center><h3><u>ใบเสร็จ</u></h3></center>
                    <center>

                        <table class="table table-striped table-condensed table-hover">
                            <tr><th colspan="4" ><img src="image/dns.gif" width="50" height="50">DINNERSHOP ที่อยู่ 828 หมู่บ้านตะวันออก ต.บ้านบึง อ.บ้านบึง จ.ชลบุรี<br>วันที่<?php echo "  " . $datetime ?></th>
                                <th><br>เลขที่<?php echo $row6[order_id]; ?></th>
                            </tr>

                            <tr>
                                <th>ลำดับ</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                                <th>ราคา</th>
                                <th>ราคารวม</th>
                            </tr>
                            <?php
                            $i = 1;
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <th><?php echo $i++; ?></th>
                                    <th><?php echo $row[pro_name]; ?></th>
                                    <th><?php echo $row[order_number]; ?></th>
                                    <th><?php echo $row[price]; ?></th>
                                    <th><?php echo $row[price_sum]; ?></th>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th colspan="2">รวม</th>
                                <th colspan="2"><?php echo $row3[sumorderbill]; ?></th>
                                <?php if ($row2[sumbill] >= 500) { ?><th colspan="2"><?php
                                        echo $row2[sumbill] - ($row2[sumbill] * 10) / 100;
                                        echo"  ลด10%";
                                        ?></th><?php } ?>
                                <?php if ($row2[sumbill] < 500) { ?><th colspan="2"><?php echo $row2[sumbill]; ?></th><?php } ?>
                            </tr>



                        </table>
						  <a href="billmem.php?p=<?php echo"1";?>" class="btn btn-primary">ปริ้น</a>	
                    </center>

                </div><?php include("footer.php"); ?>

            </div>

        </div>
    </body>
</html>