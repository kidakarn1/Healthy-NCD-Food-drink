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
        <style type="text/css">

          

            a:link {
                color: #FFF;
            }
            a:visited {
                color: #FFF;
            }
            a:hover {
                color: #FF9;
            }
            a:active {
                color: #FF0;
            }
        </style>
    </head>
        <body background='image/background-becomevendor.jpg'>
  

        <?php
		@SESSION_START();
        include("conn.php");
        include("menu.php");
        SESSION_START();
        ?>
        <?php
        $id = $_GET[id];
        if ($id == 5) {
            echo "<h2>กรุณาล็อกอิน</h2>";
        }
        ?>


        <?php
        if ($_SESSION[user] != "") {

            $sql = "select*from user,member where user.username='$_SESSION[user]'
and member.mem_id=user.user_id";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $_SESSION[mem_id] = $row[mem_id];
            ?>
            <div class="container">
                <div class="navbar-inverse"><br>
                    <div class="three panel panel-default ">
                        <center>

                            <img src="dwp/<?php echo $row["image"] ?>" width="110"  height="120"/><br>


                            <?php echo $row[fname]; ?>&nbsp;&nbsp;<?php echo $row[lname]; ?><br>

                        </center>
                        <br>





                        <?php
                        $sql2 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
                        $res2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_num_rows($res2);
                        ?>
                        <div class="panel-heading">
                            <font color = "#000000">ตะกร้าสินค้า</font><a href="proorder.php"><img src="image/zz.png"width="50"height="50">&nbsp;&nbsp;<font color = "#000000">จำนวน&nbsp;<?php echo $row2 ?></font></a>
                        </div>
                    <?php }//ปิดปีกกา ค่าไม่ว่าง?>


                    <?php
                    if ($_SESSION[user] == "") {
                        ?>
                        <?php echo $_SESSION[user]; ?>
                        <center><form method="post"action="login.php"></center>
                        username:<input type="text" name="username"><br><br>
                        password:<input type="password" name="pass"><br>
                        <center><pre><input type="submit"value="เข้าสู่ระบบ"></pre></center>
                        <center><a href="register.php"> <h3>สมัครสมาชิก</h3></a></center>
                    <?php }
                    ?>





                    <?php
                    $spt = 0 + $_GET[sp];
                    $sql4 = "select*from orderdns,product where mem_id='$_SESSION[mem_id]' and orderdns.order_id!='' and orderdns.pro_id=product.pro_id limit $spt,4";
                    $res4 = mysqli_query($conn, $sql4);

                    $sql2 = "select*from member,mempromotion where member.mem_id='$_SESSION[mem_id]' 
and member.mem_id=mempromotion.mem_id";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_array($res2);
                    ?>

                    <table class="table table-striped table-condensed table-hover">
                        <tr>
                            <th bgcolor="#ffff99"><center><h5><b>ชื่อ</b></h5></center></th>
                        <th bgcolor="#ffff99"><center><h5><b>รูป</b></h5></center></th>
                        <th bgcolor="#ffff99"><center><h5><b>ราคา</b></h5></center></th>
                        <th bgcolor="#ffff99"><center><h5><b>จำนวน</b></h5></center></th>
                        <th bgcolor="#ffff99"><center><h5><b>ราคารวม</b></h5></center></th>
                        <th bgcolor="#ffff99"><center><h5><b>วันที่</b></h5></center></th>
                        </tr>
                        <?php while ($row4 = mysqli_fetch_array($res4)) { ?>
                            <tr>
                                <th><center><h5><?php echo $row4[pro_name] . " " . $row4 [Description] ?></h5></center></th>
                            <th><center><h5><img src="img_products/<?php echo $row4[image] ?>" width="50"></h5></center></th>
                            <th><center><h5><?php echo $row4[price] ?></h5></center></th>
                            <th><center><h5><?php echo $row4[order_number] ?></h5></center></th>
                            <th><center><h5><?php echo $row4[price_sum] ?></h5></center></th>
                            <th><center><h5><?php echo $row4[order_date] ?></h5></center></th>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <th colspan="4" bgcolor="#ffff99"><h5>จำนวนสินค้าทั้งหมด <?php echo $row2[mem_Num]; ?></h5></th>
                            <th colspan="3" bgcolor="#ffff99"><h5>ราคารวมทั้งหมด <?php echo $row2[mem_Sum]; ?> บาท</h5></th>
                        </tr>


                    </table>
                    <center>

                        <h5><b>หน้า
                                <?php
                                $sqlp = "select*from orderdns where mem_id='$_SESSION[mem_id]' and orderdns.order_id!=''";
                                $resp = mysqli_query($conn, $sqlp);
                                $rowp = mysqli_num_rows($resp);
                                $page = $rowp % 4;
                                $pages = $rowp / 4;
                                $p = 0;
                                if ($page > 0) {
                                    $pages = ($rowp / 4) + 1;
                                }

                                for ($i = 1; $i <= $pages; $i++) {
                                    ?>
                                    <a href="hisorder.php?sp=<?php echo $p ?>"><font color="#000000"><?php echo $i ?></font></a>
                                    <?php
                                    $p+=4;
                                }
                                ?>
                            </b>
                        </h5>

                    </center>
                </div><?php include("footer.php") ?>
            </div>
        </div>











    </body>
</html>
