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
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <title>Bootstrap 101 Template</title>

            <!-- Bootstrap -->
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
            include("menu.php");
            include("../conn.php");
            $id = $_GET['id'];
            $sql = "select*from user,member where user.user_id='" . $id . "'
			and member.mem_id=user.user_id";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($res);
            $_SESSION[imagemember] = $row[image];
            ?>

            <div class='container'>
                <div class=" panel panel-primary">
                    <div class="panel-heading"><h4>แก้ไขข้อมูลส่วนตัว<?php echo $row[mem_id] ?></h4>
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="pcEditmemberadmin.php" enctype="multipart/form-data"id="fromup">
                        <input type="hidden"  name="id" value="<?php echo $row['mem_id'] ?>">

                        <div class="form-group">
                            <label for="fname" class=" col-md-2 control-label">วันที่สมัคร:</label>

                            <div class="col-md-3">
                                <fieldset disabled>
                                    <div class="form-control">
                                        <?php echo $row['register_date']; ?>
                                    </div>
                                </fieldset>
                            </div>

                            <label for="lname" class="col-md-3 control-label">วันที่หมดอายุ:</label>
                            <div class="col-md-3">
                                <fieldset disabled>
                                    <div class="form-control">
                                        <?php echo $row['expired_date'] ?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fname" class=" col-md-2 control-label">ชื่อ:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="name"value="<?php echo $row['fname'] ?>">
                            </div>

                            <label for="lname" class="col-md-3 control-label">นามสกุล:</label>
                            <div class=" col-md-3">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="lname"value="<?php echo $row['lname'] ?>">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="username" class="col-md-2 control-label">ชื่อผู้ใช้:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="username"value="<?php echo $row['username'] ?>">
                            </div>
                            <div class="col-md-1">
                                <a href="changpass.php?id=<?php echo $row[mem_id]; ?>"class="btn btn-success">เปลี่ยนรหัสผ่าน</a>
                            </div>










                            <label for="phone" class="col-md-2 control-label">เบอร์โทร:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="phone" placeholder="Phone"value="<?php echo $row['telephone'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sex" class="col-md-2 control-label">เพศ</label>
                            <div class="col-md-2">

                                <div class="control-label">
                                    <input class="radio-inline" type="radio"name="sex"value="ชาย"<?php if ($row[sex] == "ชาย") echo "checked"; ?>>ชาย 
                                    <input class="radio-inline" type="radio"name="sex"value="หญิง"<?php if ($row[sex] == "หญิง") echo "checked"; ?>>หญิง
                                </div>
                            </div>

                            <label for="line" class="col-md-4 control-label">ไลน์</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="pass" name="line"placeholder="Line"value="<?php echo $row['line_id'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="facebook" class="col-md-2 control-label">email</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $row['email'] ?>">
                            </div>

                            <label for="address" class="col-md-3 control-label">บ้านเลขที่</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="home_number" name="home_number" value="<?php echo $row['home_number'] ?>" placeholder="home_number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="facebook" class="col-md-2 control-label">หมู่</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="pass" name="mooban" placeholder="mooban" value="<?php echo $row['mooban'] ?>">
                            </div>

                            <label for="address" class="col-md-3 control-label">ถนน</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="ROad" name="Road" value="<?php echo $row['Road'] ?>" placeholder="Road">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="facebook" class="col-md-2 control-label">ตำบล</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="tumbon" name="tumbon" placeholder="tumbon" value="<?php echo $row['tumbon'] ?>">
                            </div>

                            <label for="address" class="col-md-3 control-label">อำเภอ</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="aumpher" name="aumpher" value="<?php echo $row['aumpher'] ?>" placeholder="aumpher">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="facebook" class="col-md-2 control-label">จังหวัด</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="province" name="province" placeholder="province" value="<?php echo $row['province'] ?>">
                            </div>

                            <label for="address" class="col-md-3 control-label">รหัสไปรษณีย์</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="postalcode" name="postalcode" value="<?php echo $row['postalcode'] ?>" placeholder="postalcode">
                            </div>
                        </div>






                        <div class="modal-footer">

                            <input class="btn btn-warning" type="submit"name="status" value="Blacklist">
                            <input class="btn btn-primary" type="submit"name="status" value="User">
                            <input class="btn btn-success" type="submit" value="แก้ไข" >

                            <a href="delmemberadmin.php?id=<?php echo $row['mem_id']; ?>" class="btn btn-danger" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">ลบ</a>
                        </div>

                    </form>


                    <?php include("footer_admin.php"); ?>
                </div> 
            </div>
        <?php } ?>
    </body>

</html>