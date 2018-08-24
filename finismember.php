<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="image/icon.ico">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>สั่งซื่อสินค้า</title>

        <!-- Bootstrap -->

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dns_9.css" rel="stylesheet">
        <style type="text/css">

            body {
                background-image: url(image/ui.jpg);
                background-attachment:fixed;
            }


        </style>
    </head>
    <body>    
        <?php
        @SESSION_START();

        include("conn.php");
        include("menu.php");
        ?>  
                  <div class="panel">
            <div class=" panel-body">

                <div class=" panel panel-primary">


                        <?php
                        include("conn.php");
                        $phone = $_GET[phone];
//$sql="select * from user where username='$phone'";
//$res=mysqli_query($conn,$sql);
//$row=mysqli_fetch_array($res);
                        $sql9 = "select * from user where username ='$phone'";
                        $res9 = mysqli_query($conn, $sql9);
                        $row9 = mysqli_fetch_array($res9);
                        ?> 

                        <center>
                            <br><br>
                            <img src="image/o.png" width="100">


                            <font color="#000000"> <h4>สมัครเสร็จสิ้น</h4>                            
                            <div class="form-group">
                                <label class="control-label"><h4><b>Username :</b></h4></label>
                                <label class="control-label"><h4><b><?php echo $_SESSION[phone]; ?></b></h4></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><h4><b>Password :</b></h4></label>
                                <label class="control-label"><h4><b><?php echo $_SESSION[phone]; ?></b></h4></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><img src="line_id/QR_CODE.jpg"></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><h4><b>ID_LINE :</b></h4></label>
                                <label class="control-label"><h4><b><?php echo "0958512442"; ?></b></h4></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><font color="red">**</font><font color="blue"> กรุณาแจ้งการชำระเงินผ่านไลน์เพื่อเข้าไปดูอาหารแต่ละวันที่จะได้รับ </font><font color="red">**</font></label>
                            </div>
                        </center>

                    </div>







                    <?php include("footer.php") ?>
                </div>
            </div>

    </body>
</html>
