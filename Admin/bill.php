<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="../image/icon.ico">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ยินดีต้อนรับสู่DINNERSHOP</title>

        <!-- Bootstrap -->

        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">

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
        <?php
        include "menu.php";
        @session_start();
        include("../conn.php");
        ?>
        <?php
        $sql1 = "select*from user,member where user.username='" . $_SESSION[user] . "'
			and member.mem_id=user.user_id";
        $res1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($res1);
        $_SESSION[mem_id] = $row1[mem_id];
        $_SESSION[fname] = $row1[fname];
        $_SESSION[lname] = $row1[lname];
        ?>
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default ">



                    <br>
                    <?php
                    $bill = $_GET[id];
                    $sql = "select*from orderdns,product where order_id='$bill' and orderdns.pro_id=product.pro_id";
                    $res = mysqli_query($conn, $sql);
                    $res6 = mysqli_query($conn, $sql);
                    $row6 = mysqli_fetch_array($res6);

                    $sql2 = "select sum(price_sum) as sumbill from orderdns where order_id='$bill' ";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_array($res2);

                    $sql3 = "select sum(order_number) as sumorderbill from orderdns where order_id='$bill' ";
                    $res3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_array($res3);


                    $sql5 = "select*from member where mem_id='$row6[mem_id]' ";
                    $res5 = mysqli_query($conn, $sql5);
                    $row5 = mysqli_fetch_array($res5);

                    $sql7 = "select*from mempromotion where mem_id='$row6[mem_id]' ";
                    $res7 = mysqli_query($conn, $sql7);
                    $row7 = mysqli_fetch_array($res7);
                    date_default_timezone_set("asia/bangkok");
                    $datetime = date("y-m-d/h:i:s");
                    ?>
                    <table border="1">
                        <tr><th colspan="4" ><img src="../image/dns.gif" width="50" height="50">DINNERSHOP ที่อยู่ 828 หมู่บ้านตพวันออก ต.บ้านบึง อ.บ้านบึง จ.ชลบุรี<br>วันที่<?php echo "  " . $datetime ?></th></th>
                            <th>เลขที่<?php echo $row6[order_id]; ?></th>
                        </tr>
                        <tr>
                            <th colspan="5">ชื่อสมาชิก <?php echo "  " . $row5[fname] . "    " . $row5[lname] . "      "; ?>ที่อยู่<?php echo "  " . $row6[fromorder]; ?></th>
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
                            <th ><?php echo $row3[sumorderbill]; ?></th>
                            <?php if ($row2[sumbill] >= 500) { ?><th colspan="2"><?php echo $row2[sumbill] - ($row2[sumbill] * 10) / 100;
                            echo"  ลด10%"; ?></th><?php } ?>
                        <?php if ($row2[sumbill] < 500) { ?><th colspan="2"><?php echo $row2[sumbill]; ?></th><?php } ?>
                        </tr>
                            <?php if ($row6[promo_order] != 0) { ?>
                            <tr>
<?php } ?>
                        <tr>
                            <th colspan="5">ผู้ส่งสินค้า................................................... ผู้รับสินค้า...............................................................</th>
                        </tr>
                    </table>
                 
                </div>
           

<?php include("../footer.php") ?>
        </div>
 </div>


    </body>
</html>