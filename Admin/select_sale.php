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
        <body background="">
            <?php
            @SESSION_START();
            include "menu.php";
            @SESSION_START();
            include("../conn.php");
            // $sql5 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
            //$res5 = mysqli_query($conn, $sql5);
            // $row5 = mysqli_num_rows($res5);


            $sql = "select * from food_status,member where food_status.mem_id=member.mem_id order by food_status.f_status_id asc";
            $res = mysqli_query($conn, $sql);
            $sql_name = "select * from disease where dis_id='1'";
            $res_name = mysqli_query($conn, $sql_name);
            $row_name = mysqli_fetch_array($res_name);
            ?>



            <div class='container'>

                <div class="panel-heading">
                    <center><h3><?php echo "รายการสั่งซื้อ" ?></h3></center>

                </div>
                <div class=" panel panel-primary">

                    <div class="three">
                        <div class="panel-body">
                            <div class="form-group">

                                <?php
                                /* เนื่องจาก'$_SESSION[disease]เป็นค่าว่าง จึงเลยต้องดึงข้อมูลมาใหม่ */


                                // $dis_id=explode($_SESSION[dis_id]);
                                //     print_r($dis_id);
                                ?>
                                <!-- ห้ามลบนะ ถ้าลบอันแรกจะซื้อไม่ได้ #ตึ๋ง--> <form action="" method="post" class="search-wrapper cf">
                                </form>
                                <?php while ($row = mysqli_fetch_array($res)) {
                                    ?>

                                    <div class="form-group">

                                        <div class="col-xs-10 col-xs-offset-1 col-md-3">
                                            <div class="tableproduct thumbnail ">

                                                <h1><?php echo"<center>" . $row["f_status_id"] . "</center>"; ?></h1><br>
                                                <center>
                                                    <div class=" tableproduct1 caption">

                                                        <h5>ชื่อ <?php echo $row["fname"] . " " . $row["lname"]; ?></h5>
                                                        <form action='inorder.php' method='post' name='form2' id='form2'>



                                                            <font color="#FFFF00">วันที่สมัคร<?php echo" " . $row['register_date'] ?></font><p></p>
                                                            <font color="red">วันที่คอสหมดอายุ<?php echo" " . $row['expired_date'] ?></font>

                                                            <a href="food_for_you.php?id=<?php echo $row['mem_id'] ?>" class="btn btn-primary btn-sm ">

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
                                <?php }
                                ?>         
                                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

                            </div>
                        </div>

                    </div>
                </div>
                <?php include("footer_admin.php"); ?>

            </div>
        <?php } ?>
    </body>
</html>