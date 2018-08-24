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
        <?php
        include "menu.php";
        @SESSION_START();
        include("conn.php");
        $sql5 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
        $res5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_num_rows($res5);
        ?>


        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h3>อาหารหลัก</h3></center>
                       <div class="row">
                            <div class="col-md-offset-1 col-xs-8 col-md-3">
                                <a href="proorder.php">

                                    <font color="#000000"size="3">
                                    ตะกร้าสินค้า<img src="image/zz.png"width="20%">จำนวน
                                    <?php echo $row5 ?>
                                </a>
                            </div>

                            <div class="col-md-offset-4 col-md-4 ">
                                <form method="post" action="Search.php">

                                    <input type="text" name="search" placeholder="ค้นหาข้อมูลสินค้า">

                                    <button type="submit" class="btn btn-sm btn-warning ">ค้นหา</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="three panel-body">
                        <?php
                        $sql = "select * from product where cat_id='4' order by pro_id";
                        $res = mysqli_query($conn, $sql);
                        ?>
                        
                       <!-- ห้ามลบนะ ถ้าลบอันแรกจะซื้อไม่ได้ #ตึ๋ง--> <form action="" method="post" class="search-wrapper cf">
                             </form>
                        <?php while ($row = mysqli_fetch_array($res)) {
                            ?>

                            <div class="form-group">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="tableproduct thumbnail ">

                                        <img src="img_products/<?php echo $row["image"]; ?>" alt="..." width="100%"><br>
                                        <center>
                                            <div class=" tableproduct1 caption">
                                                
                                                <h5><?php echo $row["pro_name"] . " " . $row["Description"]; ?><p></p>
                                                <font color="red"><?php echo "ราคา" . " " . $row["price"] . " " . "บาท";?></font><p></p>
												<font color="#ffffff">
												<?php
												echo $row["calories"] . " " . "กิโลแคลอรี่";
												?></font><p></p>
                                                <form action='inorder.php' method='post' name='form2' id='form2'>
                                                   


                                                    จำนวน <select name="number"id="number">
                                                            <option value="5" selected>5</option >
                                                            <option value="4" selected>4</option >
                                                            <option value="3" selected>3</option >
                                                            <option value="2" selected>2</option >
                                                            <option value="1" selected>1</option >
                                                        </select> จาน<br>
                                                        </h5>
                                              

                                                 

                                               
                                                        <input type="submit" class="btn btn-xs btn-success" name="button" id="button"  value="หยิบใส่ตะกร้า"/>
                                                 

                                                    <input name="proid" type="hidden" id="proid" value="<?php echo$row["pro_id"] ?>" />

                                                    <input name="price" type="hidden" id="hiddenField2" value="<?php echo$row["price"] ?>" />
                                                    <input name="name_pro" type="hidden" id='hiddenField3' value="<?php echo$row["pro_name"] ?>" />



                                                </form>



                                                <?php // }  ?>
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


               

                <?php include("footer.php");
                ?>

            </div>
        </div>
    </body>
</html>


