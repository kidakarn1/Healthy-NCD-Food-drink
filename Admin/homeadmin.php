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
            <title>อัฟเดชโปรโมชั่น</title>

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
        <body background="image/back_ncd.jpg">

            <?php
            $sql1 = "select*from user,member where user.username='" . $_SESSION[user] . "'
			and member.mem_id=user.user_id";
            $res1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($res1);
            $_SESSION[mem_id] = $row1[mem_id];
            $_SESSION[fname] = $row1[fname];
            $_SESSION[lname] = $row1[lname];
            ?> 
            <?php include "menu.php"; ?>

            <div class='container '>
                <div class="panel-heading">

                    <center><h3><b>อัพเดทโปรโมชั่น</b></h3></center>
                </div>
                <div class=" panel panel-primary">


                    <?php
                    //โปรโมชั่นที่1
                    $sql4 = "select *from promotion where promotion_id='1'";
                    $res4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    //โปรโมชันที่2
                    $sql5 = "select *from promotion where promotion_id='2'";
                    $res5 = mysqli_query($conn, $sql5);
                    $row5 = mysqli_fetch_assoc($res5);
                    //โปรโมชันที่3
                    $sql6 = "select *from promotion where promotion_id='3'";
                    $res6 = mysqli_query($conn, $sql6);
                    $row6 = mysqli_fetch_assoc($res6);

                    $sql7 = "select *from promotion where promotion_id='4'";
                    $res7 = mysqli_query($conn, $sql7);
                    $row7 = mysqli_fetch_assoc($res7);

                    $sql8 = "select *from promotion where promotion_id='5'";
                    $res8 = mysqli_query($conn, $sql8);
                    $row8 = mysqli_fetch_assoc($res8);
                    ?>
                    <form class="form-horizontal" method="post" action="pcupdatepromotion.php">


                        <div class="form-group">
                            <div class="row">



                                <label class="col-md-12 col-xs-12 control-label">
                                    <center><h4><b>โปรโมชั่นที่<?php echo " " . $row4[promotion_id]; ?></b></h4></center>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-md-offset-2  col-md-2 control-label">ชื่อรูปภาพ</label>

                            <div class="col-md-2">

                                <input type="text" class=" form-control" id="inputEmail3" name="image"value="<?php echo $row4[image]; ?>">

                            </div>
                            <label for="inputEmail3" class=" col-md-2 control-label">โปรโมชั่น<?php echo $row4[promotion_id] ?></label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="pro_name"value="<?php echo $row4[promotion_name]; ?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">รายละเอียด</label>

                            <div class="col-md-6">

                                <textarea class=" form-control" name="pro_Description" rows="2"><?php echo $row4[description]; ?></textarea>

                            </div>

                        </div>

                        <div class="form-group">

                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">วันที่เปิดโปรโมชั่น</label>
                            <div class="col-md-2">

                                <input type="date" class="form-control" name="pro_Dateon" value="<?php echo $row4[promotion_dateon]; ?>"size="5">

                            </div>


                            <label for="inputEmail3" class=" col-md-2 control-label">วันที่ปิดโปรโมชั่น</label>
                            <div class="col-md-2">
                                <input type="date" class="form-control" name="pro_Dateend"value="<?php echo $row4[promotion_Dateoff]; ?>"size="5">
                            </div>

                        </div>



                        <!--promotion ที่ 2-->
                        <br><div class="form-group">
                            <div class="row">
                                <label class="col-md-12 col-xs-12 control-label">
                                    <center><h4><b>โปรโมชั่นที่<?php echo " " . $row5[promotion_id]; ?></b></h4></center>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="inputEmail2" class=" col-md-offset-2 col-md-2 control-label">ชื่อรูปภาพ</label>
                            <div class="col-md-2">

                                <input type="text" class=" form-control" name="image2"value="<?php echo $row5[image]; ?>">

                            </div>


                            <label for="inputEmail2" class=" col-md-2 control-label">โปรโมชั่น<?php echo $row5[promotion_id] ?></label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="pro_name2"value="<?php echo $row5[promotion_name]; ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">รายละเอียด</label>

                            <div class="col-md-6">

                                <textarea class=" form-control"name="pro_Description2"  rows="2"><?php echo $row5[description]; ?></textarea>

                            </div>

                        </div>



                        <div class="form-group">
                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">วันที่เปิดโปรโมชั่น</label>
                            <div class="col-md-2">

                                <input type="date" class=" form-control" name="pro_Dateon2" value="<?php echo $row5[promotion_dateon]; ?>"size="5">

                            </div>


                            <label for="inputEmail3" class=" col-md-2 control-label">วันที่ปิดโปรโมชั่น</label>
                            <div class="col-md-2">
                                <input type="date" class="form-control" name="pro_Dateend2"value="<?php echo $row5[promotion_Dateoff]; ?>"size="5">
                            </div>

                        </div>




                        <!--promotion ที่ 3-->
                        <br><div class="form-group">
                            <div class="row">
                                <label class="col-md-12 col-xs-12 control-label">
                                    <center><h4><b>โปรโมชั่นที่<?php echo " " . $row6[promotion_id]; ?></b></h4></center>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">ชื่อรูปภาพ</label>
                            <div class="col-md-2">

                                <input type="text" class=" form-control" name="image3"value="<?php echo $row6[image]; ?>"size="5">

                            </div>


                            <label for="inputEmail3" class=" col-md-2 control-label">โปรโมชั่น<?php echo $row6[promotion_id] ?></label>
                            <div class="col-md-2">
                                <input type="text" class=" form-control" name="pro_name3"value="<?php echo $row6[promotion_name]; ?>">
                            </div>

                        </div>

                        <div class="form-group">

                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">รายละเอียด</label>

                            <div class="col-md-6">

                                <textarea class=" form-control" name="pro_Description3" rows="2"><?php echo $row6[description]; ?></textarea>

                            </div>

                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">วันที่เปิดโปรโมชั่น</label>
                            <div class="col-md-2">

                                <input type="date" class=" form-control" name="pro_Dateon3" value="<?php echo $row6[promotion_dateon]; ?>"size="5">

                            </div>


                            <label for="inputEmail3" class=" col-md-2 control-label">วันที่ปิดโปรโมชั่น</label>
                            <div class="col-md-2">
                                <input type="date" class="form-control" name="pro_Dateend3"value="<?php echo $row6[promotion_Dateoff]; ?>"size="5">
                            </div>
                        </div>




                        <!--promotion ที่ 4-->
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-12 col-xs-12 control-label">
                                    <center><h4><b>โปรโมชั่นที่<?php echo " " . $row7[promotion_id]; ?></b></h4></center>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">ชื่อรูปภาพ</label>
                            <div class="col-md-2">

                                <input type="text" class=" form-control" name="image4"value="<?php echo $row7[image]; ?>"size="5">

                            </div>


                            <label for="inputEmail3" class=" col-md-2 control-label">โปรโมชั่น<?php echo $row7[promotion_id] ?></label>
                            <div class="col-md-2">
                                <input type="text" class=" form-control" name="pro_name4"value="<?php echo $row7[promotion_name]; ?>">
                            </div>

                        </div>

                        <div class="form-group">

                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">รายละเอียด</label>

                            <div class="col-md-6">

                                <textarea class=" form-control" name="pro_Description4" rows="2"><?php echo $row7[description]; ?></textarea>

                            </div>

                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">วันที่เปิดโปรโมชั่น</label>
                            <div class="col-md-2">

                                <input type="date" class=" form-control" name="pro_Dateon4" value="<?php echo $row7[promotion_dateon]; ?>"size="5">

                            </div>


                            <label for="inputEmail3" class=" col-md-2 control-label">วันที่ปิดโปรโมชั่น</label>
                            <div class="col-md-2">
                                <input type="date" class="form-control" name="pro_Dateend4"value="<?php echo $row7[promotion_Dateoff]; ?>"size="5">
                            </div>

                        </div>




                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-12 col-xs-12 control-label">
                                    <center><h4><b>โปรโมชั่นที่<?php echo " " . $row8[promotion_id]; ?></b></h4></center>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">ชื่อรูปภาพ</label>
                            <div class="col-md-2">

                                <input type="text" class=" form-control" name="image5"value="<?php echo $row8[image]; ?>"size="5">

                            </div>


                            <label for="inputEmail3" class=" col-md-2 control-label">โปรโมชั่น<?php echo $row8[promotion_id] ?></label>
                            <div class="col-md-2">
                                <input type="text" class=" form-control" name="pro_name5"value="<?php echo $row8[promotion_name]; ?>">
                            </div>

                        </div>

                        <div class="form-group">

                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">รายละเอียด</label>

                            <div class="col-md-6">

                                <textarea class=" form-control" name="pro_Description5" rows="2"><?php echo $row8[description]; ?></textarea>

                            </div>

                        </div>


                        <div class="form-group">
                            <label for="inputEmail3" class=" col-md-offset-2 col-md-2 control-label">วันที่เปิดโปรโมชั่น</label>
                            <div class="col-md-2">

                                <input type="date" class=" form-control" name="pro_Dateon5" value="<?php echo $row8[promotion_dateon]; ?>"size="5">

                            </div>


                            <label for="inputEmail3" class=" col-md-2 control-label">วันที่ปิดโปรโมชั่น</label>
                            <div class="col-md-2">
                                <input type="date" class="form-control" name="pro_Dateend5"value="<?php echo $row8[promotion_Dateoff]; ?>"size="5">
                            </div>

                        </div>






                        <center>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
                            </div>
                        </center>

                    </form>
                </div>
                <?php include("footer_admin.php"); ?>

            </div>

        <?php } ?>



    </body>
</html>