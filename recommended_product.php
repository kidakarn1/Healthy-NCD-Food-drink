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
    <body background='image/ui.jpg'>
        <?php include "menu.php"; ?>


        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h4>สินค้าแนะนำ</h4></center></div>
                    <div class="three panel-body">

                        <br>



                        <br>

                        <?PHP
                        @SESSION_START();
                        ?>
                        <?php
                        include("conn.php");
                        ?>
                        <?php
                        date_default_timezone_set("asia/bangkok");
                        $order = date('y-m-01') . '<br>';
                        $order_bm = date('y-m-31', strtotime("+1 Month"));
                        $sql = "select*from orderdns,product where order_date between '$order' and '$order_bm' and orderdns.pro_id=product.pro_id group by orderdns.pro_id order by sum(order_number) asc limit 0,5";
                        $res = mysqli_query($conn, $sql);
                        ?>

                        <?php while ($row = mysqli_fetch_array($res)) {
                            ?>

                            <div class="form-group">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="tableproduct thumbnail ">
                                        <img src="img_products/<?php echo $row["image"]; ?>" alt="...">
                                        <center>
                                            <div class=" tableproduct1 caption">
                                                <h3><?php echo $row["pro_name"] . " " . $row["Description"]; ?></h3>
                                                <h4><font color="red"><?php echo "ราคา" . " " . $row[price] . " " . "บาท" ?></font></h4>
                                                <b> จำนวน <select name='number'id='number'>
                                                        <option value='5' selected>5</option >
                                                        <option value='4' selected>4</option >
                                                        <option value='3' selected>3</option >
                                                        <option value='2' selected>2</option >
                                                        <option value='1' selected>1</option >
                                                    </select> แก้ว</b>
                                                <p></p>
                                                <?php if ($_SESSION['user'] == "") { ?>

                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">สังซื้อ</button>


                                                <?php } ?>
                                                <?php if ($_SESSION['user'] != "") { ?>
                                                    <a href="#" class="btn btn-success" role="button">สังซื้อ</a> 
                                                <?php } ?>
                                            </div>
                                        </center>
                                    </div>

                                </div>          
                            </div>
                        <?php }
                        ?>         
                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


                    </div>
                </div>


                <script src="js/jquery-1.11.2.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>
                <?php include("footer.php") ?>
            </div>
        </div>
    </body>
</html>