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
                <div class=" panel panel-default">

                    <div class="panel-heading"><center><h4>แบบประเมินความพึงพอใจ</h4></center></div>
                    <div class="three">



<br>
                    <?PHP
                    @SESSION_START();
                    ?>
                    <?php
                    include("conn.php");
                    $sql = "select*from evaluation ";
                    $res = mysqli_query($conn, $sql);
                    $sql2 = "select*from user where username='$_SESSION[user]'";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_array($res2);
                    date_default_timezone_set("asia/bangkok");
                    $datetime = date("y-m-d/h:i:s");
                    ?>

                    <form method="post" action="InEvaluation.php">
                        <table class="table table-striped table-condensed table-hover">

                            <tr>

                                <td class="danger">ความพึงพอใจในการใช้เว็บ</td>
                                <td class="danger"><center>ยอดเยี่ยม</td>
                                <td class="danger"><center>ดีมาก</center></td>
                                <td class="danger"><center>ดี</center></td>
                                <td class="danger"><center>พอใช้</center></td>
                                <td class="danger"><center>ปรับปรุง</center></td>

                                </tr>



                                <input type="hidden" name="mem_id"value="<?php echo $_SESSION[mem_id]; ?>">

                                <?php
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                    <td bgcolor="#ffff99"><?php echo $row[title] ?></td>
                                    <?php $i++; ?>
                                    <td bgcolor="#ffff99">
                                    <center><input type="radio"name="<?php echo$i ?>"value="5"></center></td>

                                    <td bgcolor="#ffff99">
                                    <center><input type="radio"name="<?php echo$i ?>"value="4"></center></td>

                                    <td bgcolor="#ffff99">
                                    <center><input type="radio"name="<?php echo$i ?>"value="3"></center></td>

                                    <td bgcolor="#ffff99">
                                    <center><input type="radio"name="<?php echo$i ?>"value="2"></center></td>

                                    <td bgcolor="#ffff99">
                                    <center><input type="radio"name="<?php echo$i ?>"value="1"></center></td>
                                    </tr>

                                <?php } ?>      

                                <?php
                                $a = $_GET[a];
                                if ($a == 1) {
                                    echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
                                }
                                if ($a == 2) {
                                    echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
                                }
                                if ($a == 3) {
                                    echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
                                }
                                if ($a == 4) {
                                    echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
                                }
                                if ($a == 5) {
                                    echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
                                }
                                ?>           
                        </table>

                        <input type="hidden" name="Date_time"value="<?php echo $datetime; ?>">

                        <input class="btn btn-success col-md-offset-5 col-md-2 col-xs-12 col-sm-12 "type="submit"value="ส่งคะแนน">
                    </form><br><br><br>


                </div>
              </div>


                    <?php include("footer.php") ?>   

            
            </div>
            <?php

            function getName($id) {
                global $conn;
                $sql = "select * from member where mem_id='$id'";
                //echo $sql;
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($res);
                return $row[fname];
            }
            ?>


    </body>
</html>


