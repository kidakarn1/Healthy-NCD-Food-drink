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
                    <?php
                    include("../conn.php");

                    $number = $_POST[number];

                    $sql = "select*from product ";

                    if ($number != '') {
                        $sql = "select* from product where  pro_number<=$number ";
                    }

                    $res = mysqli_query($conn, $sql);
                    ?>
                    <div class="row">
                 <div class=" col-md-offset-9 col-md-2 col-xs-9">
                        
                         





                                <form method="post"  action="cproduct.php">
                                    <input class="form-control" name="number" >             </div>
                        <div class="col-md-1  ">
                                    <input type="submit" class=" btn btn-success " value="ค้นหา"></div>
                     
                        
             </div>

<br>



                    <div class="row ">
                        <div class="col-md-offset-3 col-md-1 col-xs-3	"><center>รหัสสินค้า</center></div>
                        <div class="col-md-2 col-xs-4"><center>ชื่อ</center></div>
                      
                        <div class="col-md-1 col-xs-2"><center>รูป</center></div>
                        <div class="col-md-1 col-xs-1">จำนวน</div>


                    </div>
                    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-1 col-xs-3"><center><?php echo $row[pro_id]; ?></center></div>
                            <div class="col-md-2 col-xs-4"><center><?php echo $row[pro_name]; ?></center></div>
                            <div class="col-md-1 col-xs-2"><center><img src="../img_products/<?php echo $row[image]; ?>"width="50" height="60"></center></div>
                 
                            <div class="col-md-1 col-xs-1"><center><?php echo $row[pro_number]; ?></center></div>
                        </div>
                    <?php } ?>
                </div>




                <?php include("../footer.php") ?>


            </div>
        </div>


    </body>
</html>