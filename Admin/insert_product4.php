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
                .panel-heading {
                    background-color: #0066ff;
                    color: #ffffff;
                    margin-bottom: -1%;
                }
            </style>
        </head>
        <body>
            <?php
            include "menu.php";
            @session_start();
            include("../conn.php");
            ?>
            <?php
            $sql3 = "select*from user,member where user.username='" . $_SESSION[user] . "'
            and member.mem_id=user.user_id";
            $res3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($res3);
            $_SESSION['mem_id'] = $row3['mem_id'];
            $_SESSION['fname'] = $row3['fname'];
            $_SESSION['lname'] = $row3['lname'];

            $sql_name = "select * from disease where dis_id='4'";
            $res_name = mysqli_query($conn, $sql_name);
            $row_name = mysqli_fetch_array($res_name);
            ?>
            <?php
            $sql1 = "select* from food where dis_id='4' and cat_id='1' order by food_id asc";
            $res1 = mysqli_query($conn, $sql1);
            ?>
            <div class='container '>
                <div class=" panel-heading">
                    <center><h3>รายชื่อเครื่องดื่ม <?php echo $row_name['dis_name'] ?></h3></center>
                </div>
                <div class=" panel panel-primary">
                    <?php
                    $sql1 = "select* from food where dis_id='1' and cat_id='2' order by food_id asc";
                    $res1 = mysqli_query($conn, $sql1);
                    ?>
                    <br>
                    <table class="table table-striped table-condensed table-hover">
                        <tr>
                            <td style="color:#ffffff; background-color: green;" ><center><b>รหัสสินค้า</b></center></td>
                        <td style="color:#ffffff; background-color: green;" ><center><b>รูป</b></center></td>
                        <td style="color:#ffffff; background-color: green;" ><center><b>ชื่อสินค้า</b></center></td>
                        <td style="color:#ffffff; background-color: green;" ><center><b>วัตถุดิบ</b></center></td>
                        <td style="color:#ffffff; background-color: green;" ><center><b>แก้ไข</b></center></td>

                        </tr>
                        <?php
                        while ($row1 = mysqli_fetch_array($res1)) {
                            ?>
                            <tr>
                                <td><center><?php echo $row1['food_id'] ?></center></td>
                            <td><center><img src="../img_products/<?php echo $row1["image"] ?>" width="30" /></center></td>
                            <td><center><?php echo $row1['food_name']; ?></center></td>
                            <td><center><button type="button" class="btn btn-primary btn-xs " data-toggle="modal" data-target="#myModal<?php echo $row1['food_id'] ?>"> วัตถุดิบ</button></center></th>

                            <td><center><a href="fromeditproductadmin.php?id=<?php echo $row1['food_id'] ?>"><font color="#000000"><img src="../image/eDIT.png"width="20"height="20">แก้ไข</font></a></center></td>

                            </tr>



                            <!-- Modal -->
                            <div class="modal fade" id="myModal<?= $row1['food_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                            <h4 class="modal-title" id="myModalLabel">วัตถุดิบที่ใช้</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $row1['raw_material']; ?>
                                        </div>
                                        <h4 class="modal-title" id="myModalLabel"><font color="blue">ประโยชน์วัตถุดิบที่ใช้</font></h4>
                                        <div class="modal-body">
                                            <?php echo $row1['benefit']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </th>  


                            <?php
                        }
                        echo $_SESSION[imageproduct] = $row1[image];
                        ?>

                        <tr>
                            <td colspan="9" bgcolor="#0066ff"><center><a href="#frominsertstaff"data-toggle="modal" data-target="#insertproductadmin"><font color="#ffffff">เพิ่มข้อมูลสินค้า</font></a> <a href="insert_product.php"><font color="#ffffff">1</font></a> <a href="insert_product2.php"><font color="#ffffff">2</font></a> <a href="insert_product3.php"><font color="#ffffff">3</font></a> <a href="insert_product4.php"><font color="#ffffff">4</font></a> </center></td>
                        </tr>
                    </table>




                    <?php include("insertproductadmin.php"); ?>  
                </div>
                <?php include("footer_admin.php"); ?>
            </div>

        <?php } ?>
    </body>
</html>