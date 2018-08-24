<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ยินดีต้อนรับสู่ Healthy NCD</title>
       

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
    </head>
        <body background='image/background-becomevendor.jpg'>

        <?php
        @SESSION_START();
        include "menu.php";
        ?>
        <?php
        $sql1 = "select*from user,member where user.username='" . $_SESSION[user] . "'
			and member.mem_id=user.user_id";
        $res1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($res1);
        $_SESSION[mem_id] = $row1[mem_id];
        $_SESSION[fname] = $row1[fname];
        $_SESSION[lname] = $row1[lname];
        $_SESSION[image] = $row1[image];
        date_default_timezone_set("asia/bangkok");
        $datetime = date("d-m-y / h:i");

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
        ?>
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
      <div class="panel">
            <div class=" panel-body">

                <div class=" panel panel-primary">
                <div class="panel-heading"><center><h2><b><?php echo $row11['kno_name']; ?></b></h2></center></div>
                <div class="three panel-body">
                    <center>

                        <div class="form-group">
                            <img src="tip_dis/<?php echo $row11['image'] ?>">
                        </div>
                    </center>
                    <div class="form-group">
                        <div align="justify">
                            <font size="3"><?php echo $row11['explanation']; ?></font>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-5">
                            <img src="tip_dis/<?php echo $row22['img_name'] ?>">
                        </div>
                        <div class=" col-md-5">
                            <img src="tip_dis/<?php echo $row33['img_name'] ?>">
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
                            <img src="tip_dis/<?php echo $row44['img_name'] ?>" width="50%">
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
            </div>
            <?php include("footer.php") ?>
        </div>
    </div>
</body>
</html>