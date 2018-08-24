<?php
@SESSION_START();
include("../conn.php");
if ($_SESSION[user] == "") {
    header("location: ../index.php");
}
?>
<?php
if ($_SESSION[user] != ""and $_SESSION[status] == "Driver" or $_SESSION[status] == "Admin") {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <LINK REL="SHORTCUT ICON" HREF="../image/icon.ico">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <title>อัฟเดชโปรโมชั่น</title>

            <!-- Bootstrap -->

            <link href="../css/bootstrap.css" rel="stylesheet">
            <link href="../css/bootstrap.min.css" rel="stylesheet">

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body>
            <?php
            include "menu.php";
            @SESSION_START();
            include("../conn.php");
            ?>
            <?php
            $sql1 = "select*from user,car where user.username='" . $_SESSION[user] . "'
			and user.user_id=car.car_id";
            $res1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($res1);
            $car_id = $row1[car_id];
            ?>
            <div class='container'>
                <div class="navbar-inverse">
                    <br>
                    <div class="three panel panel-default ">



                        <br>
                        <?php
                        $spt = 0 + $_GET[sp];

                        $sql5 = "select* from orderdns,product where  orderdns.pro_id=product.pro_id and orderdns.car_id= $car_id and orderdns.order_status='กำลังดำเนินการจัดส่ง'order by order_id ASC limit $spt,10";
                        $res5 = mysqli_query($conn, $sql5);
                        ?>
                        <div class="table-responsive">
                            <table class="table">

                                <tr>
                                    <?php echo $car_id; ?>
                                    <th colspan="0" bgcolor="#ffcc33"><center>รหัสการสั่ง</th>
                                    <th colspan="0" bgcolor="#ffcc33"><center>รหัสผู้สั่ง</th>
                                        <th colspan="0" bgcolor="#ffcc33"><center>ชื่อสินค้า</th>
                                            <th colspan="0" bgcolor="#ffcc33"><center>จำนวน</th>
                                                <th colspan="0" bgcolor="#ffcc33"><center>ยอดรวม</th>
                                                    <th colspan="0" bgcolor="#ffcc33"><center>ที่อยู่</th>
                                                        <th colspan="0" bgcolor="#ffcc33"><center>วันที่สั่งซื้อ</th>
                                                            <th colspan="2" bgcolor="#ffcc33"><center>สถานะ</th>
                                                                <th bgcolor="#ffcc33"><center>ลบ</th>
                                                                    </tr>


                                                                    <?php
                                                                    while ($row5 = mysqli_fetch_array($res5)) {
                                                                        ?>

                                                                    </center>
                                                                    <th><center><?php echo $row5[order_id]; ?></center></th>

                                                                    <th><center><a href="name_order.php?id=<?php echo $row5[mem_id]; ?>"><font color="#0000ff"><?php echo $row5[mem_id]; ?></font></a></center></th>
                                                                    <th><center><?php echo $row5[pro_name] . $row5[Description]; ?></center></th>
                                                                    <th><center><?php echo $row5[order_number] ?></center></th>
                                                                    <th bgcolor="#ffffff"><center><?php echo $row5[price_sum] ?></center></th>
                                                                    <th bgcolor="#ffffff"><center><?php echo $row5[orderAdd] ?></center></th>
                                                                    <th bgcolor="#ffffff"><center><?php echo $row5[order_date] ?></center></th>
                                                                    <td bgcolor="#ffffff"><center><font color="red"><?php echo $row5[order_status] ?></font></center></td>
                                                                    <td bgcolor="#ffffff"></center>

                                                               

                                                                </td>
                                                                <td><a href="delorder.php?id=<?php echo $row5[order_id] ?>"><font color="#0000ff"><center>ลบ&nbsp;&nbsp;<img src="../image/delete.png"width="20"height="20"></center></font></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <?php
                                                                    //$_SESSION[order_id] = $row5[order_id];
                                                                }
                                                                ?>
                                                                </table>

                                                            <center>
                                                                <font color="#000000">หน้า</font>
                                                                <?php
                                                                $sqlp = "select* from orderdns";
                                                                $resp = mysqli_query($conn, $sqlp);
                                                                $rowp = mysqli_num_rows($resp);
                                                                $page = $rowp % 10;
                                                                $pages = $rowp / 10;
                                                                $p = 0;
                                                                if ($page > 0) {
                                                                    $pages = ($rowp / 10) + 1;
                                                                }

                                                                for ($i = 1; $i <= $pages; $i++) {
                                                                    ?>
                                                                    <a href="select_sale.php?sp=<?php echo $p ?>"><font color="#000000"><?php echo $i ?></font></a>
                                                                    <?php
                                                                    $p+=10;
                                                                }
                                                                ?>
                                                                <br>
                                                            </center>
                                                            <br>
                                                            </div>
                                                            </div>


                                                            <?php
                                                            include("../footer.php");
                                                        }
                                                        ?>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </body>
                                                        </html>