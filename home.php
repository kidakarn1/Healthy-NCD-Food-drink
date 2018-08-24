<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ยินดีต้อนรับสู่ Healthy NCD</title>


        <!-- Bootstrap -->



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://aoss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">

        </style>
    </head>
    <body background='image/background-becomevendor.jpg'>
        <?php
        @SESSION_START();
        include("conn.php");
        $e = $_GET[e];
        $phone = $_GET[phone];
        $check = $_REQUEST['id'];
        include "menuindex.php";
        $sql9 = "select * from user where username ='$_SESSION[phone]'";
        $res9 = mysqli_query($conn, $sql9);
        $row9 = mysqli_fetch_array($res9);
        if ($check == "1_1" or $check == "") {
            $sql11 = "select* from knowledge,image_kno where knowledge.kno_id='1' and knowledge.kno_id=image_kno.kno_id";
            $res11 = mysqli_query($conn, $sql11);
            $row11 = mysqli_fetch_assoc($res11);

            $sql22 = "select* from image_kno where img_id='1' and kno_id='1'";
            $res22 = mysqli_query($conn, $sql22);
            $row22 = mysqli_fetch_array($res22);

            $sql33 = "select* from image_kno where img_id='2' and kno_id='1'";
            $res33 = mysqli_query($conn, $sql33);
            $row33 = mysqli_fetch_array($res33);

            $sql44 = "select* from image_kno where img_id='3' and kno_id='1'";
            $res44 = mysqli_query($conn, $sql44);
            $row44 = mysqli_fetch_array($res44);
        } else if ($check == "2_2") {
            $sql11 = "select* from knowledge,image_kno where knowledge.kno_id='2' and knowledge.kno_id=image_kno.kno_id";
            $res11 = mysqli_query($conn, $sql11);
            $row11 = mysqli_fetch_array($res11);

            $sql22 = "select* from image_kno where img_id='4' and kno_id='2'";
            $res22 = mysqli_query($conn, $sql22);
            $row22 = mysqli_fetch_array($res22);

            $sql33 = "select* from image_kno where img_id='5' and kno_id='2'";
            $res33 = mysqli_query($conn, $sql33);
            $row33 = mysqli_fetch_array($res33);

            $sql44 = "select* from image_kno where img_id='6' and kno_id='2'";
            $res44 = mysqli_query($conn, $sql44);
            $row44 = mysqli_fetch_array($res44);
        } else if ($check == "3_3") {
            $sql11 = "select* from knowledge,image_kno where knowledge.kno_id='3' and knowledge.kno_id=image_kno.kno_id";
            $res11 = mysqli_query($conn, $sql11);
            $row11 = mysqli_fetch_array($res11);

            $sql22 = "select* from image_kno where img_id='7' and kno_id='3'";
            $res22 = mysqli_query($conn, $sql22);
            $row22 = mysqli_fetch_array($res22);

            $sql33 = "select* from image_kno where img_id='8' and kno_id='3'";
            $res33 = mysqli_query($conn, $sql33);
            $row33 = mysqli_fetch_array($res33);

            $sql44 = "select* from image_kno where img_id='9' and kno_id='3'";
            $res44 = mysqli_query($conn, $sql44);
            $row44 = mysqli_fetch_array($res44);
        } else if ($check == "4_4") {

            $sql11 = "select* from knowledge,image_kno where knowledge.kno_id='4' and knowledge.kno_id=image_kno.kno_id";
            $res11 = mysqli_query($conn, $sql11);
            $row11 = mysqli_fetch_array($res11);

            $sql22 = "select* from image_kno where img_id='10' and kno_id='4'";
            $res22 = mysqli_query($conn, $sql22);
            $row22 = mysqli_fetch_array($res22);

            $sql33 = "select* from image_kno where img_id='11' and kno_id='4'";
            $res33 = mysqli_query($conn, $sql33);
            $row33 = mysqli_fetch_array($res33);

            $sql44 = "select* from image_kno where img_id='12' and kno_id='4'";
            $res44 = mysqli_query($conn, $sql44);
            $row44 = mysqli_fetch_array($res44);
        }
        ?>



        <div class="container">					                      				   
            <div class="panel panel-title">
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-3 col-xs-6">
                            <a href="index.php?id=<?php echo '1_1'; ?>">
                                <h1><button type="button" class="col-md-12 col-xs-12 btn btn-danger"><b>โรคหัวใจ</b></button></h1></a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <a href="index.php?id=<?php echo '2_2'; ?>">
                                <h1><button type="button" class="col-md-12 col-xs-12 btn btn-success"><b>โรคเบาหวาน</b></button></h1></a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <a href="index.php?id=<?php echo '3_3'; ?>">
                                <h1><button type="button" class="col-md-12 col-xs-12 btn btn-info"><b>โรคเกาต์</b></button></h1></a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <a href="index.php?id=<?php echo '4_4'; ?>">
                                <h1><button type="button" class="col-md-12 col-xs-12 btn btn-warning"><b>โรคความดันสูง</b></button></h1></a>
                        </div>
                    </div>
                </div>

                <!-- <div class=" col-md-offset-10 col-xs-offset-6 col-sm-offset-9">
                    <font color="#0000ff"size="3">จำนวนผู้เข้าชม</font>
                    <a href="http://www.amazingcounters.com"><img border="1" src="http://cc.amazingcounters.com/counter.php?i=3209761&c=9629596" alt="AmazingCounters.com"></a></center>
                </div> -->

                <?php
                if ($e == 1) {
                    echo "<h3><font color=\"red\">usernameหรือpasswordผิด</font></h3>";
                } else if ($e == 2) {
                    echo "<h3>กรุณาล็อกอิน</h3>";
                }
                ?>
                <?php
                if ($e == str) {
                    echo "<h3><font color=\"red\">กรุณากรอกตัวเลขที่ปรากฎ</font></h3>";
                }
                ?>
                <?php
                if ($phone == '5') {
                    echo"<h3><font color=\"red\">" . "ไม่สามารถสมัครได้เนื่องจากหมายเลขโทรศัพท์" . " " . $_SESSION[phone] . " " . "นี้ใช้ไปแล้ว" . "</font></h3>";
                }
                ?>  


                <div class=" panel-body">
                    <div class=" panel panel-primary">

                        <div class="panel-heading"><center><h2><b><?php echo $row11['kno_name']; ?></b></h2></center></div>

                        <center>



                            <div class="form-group">
                                <img src="tip_dis/<?php echo $row11['image'] ?>" class="col-xs-12">
                            </div>
                        </center>
                        <div class="form-group">
                            <div align="justify">
                                <font size="3"><?php echo $row11['explanation']; ?></font>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-1 col-md-5">
                                <img src="tip_dis/<?php echo $row22['img_name'] ?>" class="col-xs-12" >
                            </div>
                            <div class=" col-md-5">
                                <img src="tip_dis/<?php echo $row33['img_name'] ?>" class="col-xs-12">
                            </div>
                        </div>
                        <div class="row">
                            <div align="justify">
                                <div class="col-md-offset-1 col-md-5">

                                    <font size="3"><?php echo $row22['explanation_im']; ?></font>
                                </div>
                                <div class="col-md-5">                                
                                    <font size="3"><?php echo $row33['explanation_im']; ?></font>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="form-group">
                                <img src="tip_dis/<?php echo $row44['img_name'] ?>" class="col-xs-12">
                            </div>
                        </center>    
                        <div class="row">
                            <div align="justify">
                                <div class="col-md-12">                                
                                    <font size="3"><?php echo $row44['explanation_im']; ?></font>
                                </div>
                            </div>
                        </div>

                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    </div>
                </div> <?php include("footer.php") ?>
            </div>
        </div>
    </body>
</html>