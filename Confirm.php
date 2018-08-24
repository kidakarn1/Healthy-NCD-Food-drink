<?php
include("conn.php");
include("menu.php");
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="image/icon.ico">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ยินดีต้อนรับสู่DINNERSHOP</title>

        <!-- Bootstrap -->

        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/dns_9.css" rel="stylesheet">	<script language="javascript" src="jquery-3.1.1.min.js"></script>  
        <script type="text/javascript">
            $(function () {

                $("#addre").click(function () {
                    $("#addre").show();
                    $("#addnew").hide();


                });
                $("#addnewf").click(function () {
                    $("#addnew").show();

                });

            });
        </script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">


        </style>
    </head>
    <body <?php
    $print1 = $_GET[p];
	$change=$_SESSION[price_user]-$_SESSION[ordersum];
    if ($print1 == "1") {
        echo "onLoad='window.print()'";
    }
    ?>>
            <?php
            @SESSION_START();
            include("conn.php");
            ?>

        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h4>รายงานสรุปยอดขาย</h4></center></div>
                    <div class="three panel-body">

                        <br>

                        <?php
                        @SESSION_START();
                        include("conn.php");
//include("clogout.php");

                        $id = $_POST[id];
                        if ($_SESSION[user] == "") {
                            $sql9 = "select*from orderdns,product where orderdns.order_id='" . $id . "'and orderdns.pro_id=product.pro_id";
                            $res9 = mysqli_query($conn, $sql9);
                        }
                        if ($_SESSION[user] != "") {
                            $sql9 = "select*from orderdns,member,product where orderdns.order_id='" . $id . "'
		and member.mem_id=orderdns.mem_id and orderdns.pro_id=product.pro_id";
                            $res9 = mysqli_query($conn, $sql9);
                        }


                        date_default_timezone_set("asia/bangkok");
                        $order_date = date("d-m-y");

                        $sql = "select* from orderdns,product where orderdns.pro_id=product.pro_id  and date(order_date)=curdate() order by order_id asc";
                        $res = mysqli_query($conn, $sql);
                        $sql2 = "select sum(price_sum) as ordersum from orderdns where date(order_date)=curdate() ";
                        $res2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_array($res2);

                        date_default_timezone_set("asia/bangkok");
                        $order_m = date("m");
                        ?>
                        <center>
                            ประจำวันที่  <?php echo $order_date; ?><br>
                        </center>

                        <table class="table table-striped table-condensed table-hover">
                            <tr>
                                <th><center><b>รายการ</b></center></th>
                            <th><center><b>จำนวน</b></center></th>
                            <th><center><b>ราคา</b></center></th>
                            <th><center><b>ราคารวม</b></center></th>

                            </tr>
                            <?php while ($row9 = mysqli_fetch_assoc($res9)) { ?>
                                <?php $sum = $row9[order_number] * $row9[price]; ?>
                                <th><?php echo $row9[pro_name]; ?></th>
                                <th><center><?php echo $row9[order_number]; ?></center></th>
                                <th><center><?php echo $row9[price]; ?></center></th>
                                <th><center><?php echo $row9[price_sum]; ?></center></th>


                                </tr>
                            <?php } ?>

                            <tr>
                                <th colspan="3">ยอดขายที่ขายออกไป</th>

                                <th><center><?php echo $_SESSION[ordersum]; ?></center></th>
                            </tr>
                        </table>
                        <form method="post" action="conorder.php">
                            <div class="form-group">
                                <?php if ($_SESSION[user] == "") { ?>
                                    <font color="blue"><b>ผู้สั่งคือ </b></font><?php echo $_SESSION[name]; ?>
                                <?php }
                                ?>
                                <?php if ($_SESSION[user] != "") { ?>
                                    <font color="blue"><b> ผู้สั่งคือ </b></font><?php echo $_SESSION[fname]; ?>
                                <?php }
                                ?>
                            </div>
                 
                            <label><font color="red">ปลายทางรับสินค้า</font></label>
                            <?php echo $_SESSION[confirmaddress]; ?> 


                            <div>
                                <label>ระยะห่างจากร้าน</label>
                                <?php echo $_SESSION[distance] . " " . "กิโลเมตร"; ?> 
                            </div>

						<div>
                                <label>เงินที่เตรียมไว้</label>
                                <?php echo $_SESSION[price_user] . " " . "บาท"; ?> 
                            </div>

							<div>
                                <label>เงินทอน</label>
                                <?php echo $change . " " . "บาท"; ?> 
                            </div>

                            <button type="submit" class="col-md-offset-3 col-md-1 col-xs-4 btn btn-sm btn-success"><font color="ffffff">ยืนยัการสั่งซื่อ</font></button>

                        </form>




                        <a  href="Confirm.php?p=<?php echo"1"; ?>" class="col-md-offset-1 col-md-1 col-xs-4 btn btn-sm btn-primary">ปริ้น</a>


                        <a  href="proorder.php" class="col-md-offset-1 col-md-1 col-xs-4 btn btn-sm btn-danger">ย้อนกลับ</a>



                    </div>


                </div><?php include("footer.php") ?>
            </div>
        </div>



    </body>
</html>
