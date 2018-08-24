<?php
@SESSION_START();
include("../conn.php");
if ($_SESSION[user] == "" or $_SESSION[status] != "Admin") {
    header("location: ../index.php");
}
?>
<?php
if ($_SESSION[user] != ""and $_SESSION[status] == "Admin") {
    ?>
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
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <style type="text/css">
                .panel-heading {
                    background-color: #0066ff;
                    color: #ffffff;
                    margin-bottom: -1%;
                }
            </style>
        </head>
        <body background='image/ui.jpg'>
            <?php
            @SESSION_START();
            include "menu.php";
            include("../conn.php");
            // $sql5 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
            //$res5 = mysqli_query($conn, $sql5);
            // $row5 = mysqli_num_rows($res5);

            date_default_timezone_set('asia/bangkok');
            $date = date("Y-m-d");
            $datepatgupun = date("d-m-Y");
            $sql = "select *from order_ncd";
            $res = mysqli_query($conn, $sql);
            $row_nub = mysqli_num_rows($res);
            $i = 0;
            $rowtest = mysqli_fetch_assoc($res);

            $datenaja = date('Y-m-d', strtotime($rowtest['order_date']));
            $sqld = "select * from order_ncd,food,member where order_ncd.order_date='$date' and order_ncd.Meal='มื้อกลางวัน' and order_ncd.food_id=food.food_id and order_ncd.mem_id=member.mem_id order by order_ncd.order_id asc ";
            $resd = mysqli_query($conn, $sqld);
            // echo $datetest= date_format($rowtest["order_date"],"%Y-%m-%d");
            ?>



            <div class='container'>

                    <div class="panel-heading">


                        <center>
                            <div class="row">
                                <div class="col-md-12 ">

                                    <h2><?php echo "รายการสั่งซื้อ ช่วงเที่ยง" ?></h2>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">

                                    <h4>
                                        <a href="order.php" ><font  color="#ffffff">ช่วงเช้า</font></a> | <a href="order1.php"><font color="#ffffff">ช่วงเที่ยง</font></a> | <a href="order2.php"><font color="#ffffff">ช่วงเย็น</font></a> |<a href="order3.php"><font color="#ffffff">พิเศษ</font></a>

                                    </h4>
                                </div>
                            </div>
                        </center>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><?php echo"วันนี้วันที่" . " " . $datepatgupun; ?></h4>
                            </div>
                        </div>
                    </div>

                <div class=" panel panel-primary">

                    <div class="three panel-body">
                        <div class="form-group">

                            <?php
                            /* เนื่องจาก'$_SESSION[disease]เป็นค่าว่าง จึงเลยต้องดึงข้อมูลมาใหม่ */


                            // $dis_id=explode($_SESSION[dis_id]);
                            //     print_r($dis_id);
                            ?>
                            <!-- ห้ามลบนะ ถ้าลบอันแรกจะซื้อไม่ได้ #ตึ๋ง--> <form action="" method="post" class="search-wrapper cf">
                            </form>
                            <?php while ($rowd = mysqli_fetch_assoc($resd)) {
                                ?>

                                <div class="form-group">
                                    <div class="col-xs-10 col-xs-offset-1 col-md-3">
                                        <div class="tableproduct thumbnail ">

                                            <h1><?php echo"<center>" . $rowd["order_id"] . "</center>"; ?></h1><br>
                                            <center>
                                                <div class=" tableproduct1 caption">
                                                    <img src="../img_products/<?php echo $rowd['image'] ?>" width="50%">
                                                    <br>
                                                    <h5>อาหาร <?php echo $rowd["food_name"]; ?></h5>
                                                    <h5>ชื่อ <?php echo $rowd["fname"] . " " . $rowd["lname"]; ?></h5>
                                                    <form action='inorder.php' method='post' name='form2' id='form2'>



                                                        <font color="#FFFF00">วันที่สมัคร<?php echo" " . $rowd['register_date'] ?></font><br><p></p>
                                                        <font color="red">วันที่คอสหมดอายุ<?php echo" " . $rowd['expired_date'] ?></font><br><br>



                                                        <a href="food_for_you.php?id=<?php echo $rowd['mem_id'] ?>" class="btn btn-primary btn-sm ">

                                                            รายาการอาหาร
                                                        </a>

                                                        <!-- Modal -->



                                                        <input name="food_id" type="hidden" id="proid" value="<?php echo$row["food_id"] ?>" />

                                                        <input name="price" type="hidden" id="hiddenField2" value="<?php echo$row["price"] ?>" />
                                                        <input name="food_name" type="hidden" id='hiddenField3' value="<?php echo$row["food_name"] ?>" />
                                                    </form>
                                                </div>
                                            </center>
                                        </div>
                                    </div>          
                                </div>

                            <?php } ?>         
                            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                        </div>
                    </div>
                </div>
                <?php include("footer_admin.php"); ?>
            </div>
        <?php } ?>
    </body>
</html>