<html>
    <head>
        <title>ยินดีต้อนรับสู่ Dinnershop  </title>
        <LINK REL="SHORTCUT ICON" HREF="image/icon.ico">
        <link href="dns.css" rel="stylesheet" type="text/css" />
        <style type="text/css">

            body {
                background-image: url(image/ui.jpg);
                background-attachment:fixed;
            }

        </style>
    </head>
    <body>    

        <?php
        include("../conn.php");
        include("menu.php");
        ?>
        <?php
        $id = $_GET[id];
        $sql = "select* from member where mem_id='$id'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        ?>

        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">
                    <div class="panel-heading"><center><h4>การสั่งซื้อ</h4></center></div>
                        <div class="three panel-body">
                    <table class="table table-striped table-condensed table-hover">
                     
                        <form method="post" action="sale.php">
                            <tr>
                                <th colspan="3">ลำดับ :<?php echo $row[mem_id] ?></th>

                            </tr>
                            <tr>
                                <th>ชื่อ   :</th>
                                <th><?php echo $row[fname] ?></th>
                            </tr>
                            <tr>
                                <th>นามสกุล :</th>
                                <th><?php echo $row[lname] ?></th>
                            </tr>


                            <tr>
                                <th>รูปภาพ:</th>
                                <th><img src="../dwp/<?php echo $row[image] ?>"width="60" height="60"></th>
                            </tr>






                            <tr>
                                <th>เพศ :</th>
                                <th><?php echo $row[sex] ?></th>
                            </tr>
                            <tr>
                                <th>เบอร์โทรศัพท์ :</th>
                                <th><?php echo $row[telephone] ?></th>
                            </tr>
                            <tr>
                                <th>FACEBOOK:</th>
                                <th><?php echo $row[facebook] ?></th>
                            </tr>

                            <tr>
                                <th>ID LINE:</th>
                                <th><?php echo $row[line] ?></th>
                            </tr>

                            <tr>
                                <th>ที่อยู่:</th>
                                <th><?php echo $row[address] ?></th>
                            </tr>
                            </form>
                    </table>
                            
                                
                               
                            <a href="select_sale.php">  <center><input class="btn btn-md btn-success" type="submit" value="กลับสู่หน้าorder"></center></a>
                             
                        
                            
                </div>
            </div><?php include("../footer.php") ?>
        </div>

    </body>
</html>
