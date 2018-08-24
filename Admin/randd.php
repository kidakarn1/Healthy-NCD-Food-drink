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

        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/dns_9.css" rel="stylesheet">

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
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h4>สุ่ม รางวัล</h4></center></div>
                    <div class="three panel-body">

                        <br>

                        <?php
                        @SESSION_START();
                        include("../conn.php");
                        ?>
                      
                            <?php
                            $randd = $_POST[randd];
                            if ($randd == '') {
                                $_SESSION[idmem] = $_GET[idmem];
                            }
                            $sql4 = "select*from mempromotion where mem_id='$_SESSION[idmem]' ";
                            $res4 = mysqli_query($conn, $sql4);
                            $row4 = mysqli_fetch_array($res4);

                            if ($row4[mem_Sum] >= 200 and $randd != 0 and $_SESSION[id_promo] == '') {
                                $sql3 = "select*from product order by rand()";
                                $res3 = mysqli_query($conn, $sql3);
                                $row3 = mysqli_fetch_array($res3);
                            }


                            if ($row4[mem_Sum] >= 200 and $randd == 0) {
                                ?>

                                <form method="post" action="randd.php"><?php } ?>
                                <?php if ($row4[mem_Sum] >= 200 and $randd != 0) { ?>
                                    <div class="form-grop">

                                        <div class="row">
                                            <div class="col-md-offset-3 col-xs-offset-1">
                                            <div class="col-md-3 col-xs-4">ชื่อสินค้า</div>
                                            <div class="col-md-2 col-xs-4"><center>รูป</center></div>
                                            <div class="col-md-2 col-xs-2"><center>ราคา</center></div>
</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-offset-3 col-xs-offset-1">
                                            <?php $_SESSION[id_promo] = $row3[pro_id] ?>
                                            <div class="col-md-3 col-xs-4"><?php echo $row3[pro_name]; ?></div>
                                            <div class="col-md-2 col-xs-4"><center><img src="../img_products/<?php echo $row3[image]; ?>"></center></div>
                                            <div class="col-md-2 col-xs-2"><center><?php echo $row3[price]; ?></center></div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                                <?php if ($row4[mem_Sum] >= 200 and $_SESSION[id_promo] == '') { ?>
                                    <input type="hidden" name="randd"value="1"><br>
                                    <input class="btn btn-success col-md-offset-5 col-md-2 col-xs-12 col-sm-12 "type="submit"value="สุ่มของรางวัล">
                                    <br><?php } ?>
                            </form>
                            <br>
                            <a href="mempromo.php"><font color="#000000"><div class="btn btn-warning col-md-offset-5 col-md-2 col-xs-12 col-sm-12 ">กลับหน้ารายชื่อ</div></font></a>
                                <?php
                                if ($_SESSION[id_promo] != '') {
                                    $cut = $row4[mem_Sum] - 200;
                                    $sql7 = "update mempromotion set mem_Sum='$cut'
	where mem_id='$_SESSION[idmem]' ";
                                    $res7 = mysqli_query($conn, $sql7);
                                    $_SESSION[id_promo] = '';

                                    echo '<a href="billpomotion.php"><font color="#000000"><div class="btn btn-info col-md-offset-5 col-md-2 col-xs-12 col-sm-12 ">ออกใบเสร็จ</div></font></a>';
                                }
                                ?>
                    </div>
                </div>
                <br>
                <?php include("../footer.php") ?>
            </div>
        </div>
    </body>
</html>










