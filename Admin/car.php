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

    </head>

    <body>


        <?php
        @SESSION_START();
        $_SESSION[Qid] = $id = $_GET[id];
        include"../conn.php";
        include"/menu.php";
        $order_id = $_POST[order_id];
        $sql = "select * from car";
        $res = mysqli_query($conn, $sql);
        ?>





        <div class='container'>
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h3>ข้อมูลรถ</h3></center>

                        <div class="row">


                            <?php
                            while ($row = mysqli_fetch_array($res)) {
                                ?>  
                                <div class="col-md-offset-0 col-xs-7 col-md-4">
                                                        <div class="three  panel-default">
                                    <form action="updatecar.php" method="post">	
                                        <center><div class="col-xs-12 col-md-12"> 
                                                <div class="tableproduct thumbnail ">
                                                    <input type="hidden" name="car_id1" value="<?php echo $row[car_id]; ?>">
                                                    <div class="form-group">รหัส<?php echo $row[car_id]; ?></div>
                                                    <div class="form-group">ชื่อผู้ขี่:<?php echo $row[car_name]; ?></div> 
                                                    <div class="form-group">ทะเบียนรถ:<?php echo $row[id_card]; ?></div>
                                                    <div class="form-group">สถานะ:<?php echo $row[status]; ?></div>


                                                                <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                                                            <?php if ($row[status] == "ว่าง") { ?>
                                                                <input class="btn btn-danger " type="submit" value="ไม่ว่าง"name="status">
                                                            <?php } ?>
                                                            <?php if ($row[status] != "ว่าง") { ?>
                                                                <input class="btn btn-success " type="submit" value="ว่าง" name="status">
                                                            <?php } ?>
                                                        </div>
                                                </div>
                                            </div>  
                                            </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div> 
                    <?php include("../footer.php") ?>
                </div>
            </div>
    </body>
</html>