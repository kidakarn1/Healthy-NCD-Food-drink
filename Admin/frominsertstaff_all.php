       <?php   @SESSION_START();
	   include("../conn.php");
if($_SESSION[user]=="" or $_SESSION[status]!="Admin"){
header("location: ../index.php");
}
?>
<?php
if($_SESSION[user]!=""and $_SESSION[status]=="Admin"){
       ?>
	   <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <LINK REL="SHORTCUT ICON" HREF="../image/icon.ico">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>แก้ไขข้อมูลพนักงาน</title>

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
        include"../conn.php";
        $id = $_GET[id];
        $sql = "select*from user,staff where user.user_id='$id'
        and staff.staff_id=user.user_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        date_default_timezone_set("asia/bangkok");
        $datetime = date("d/m/y");
        ?>

        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default ">
                    <div class="panel-heading">
                        แก้ไขข้อมูลพนักงาน
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="updatefrom_select_staff.php">
                        <input type="hidden"  name="id" value="<?php echo $row[staff_id]; ?>" >
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 control-label">ชื่อ:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="name" value="<?php echo $row[fname] ?>">
                            </div>

                            <label for="lname" class="col-sm-2 control-label">นามสกุล:</label>
                            <div class="col-sm-8 col-md-3">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="lname"value="<?php echo $row[lname] ?>">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">ชื่อผู้ใช้:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="username"value="<?php echo $row[username] ?>">
                            </div>
                            <label for="password" class="col-sm-2 control-label">รหัสผ่าน:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="password" name="password" placeholder="password"value="<?php echo $row[password] ?>">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">เบอร์โทร</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="phone" placeholder="NumberPhone"value="<?php echo $row[lname] ?>">
                            </div>

                            <label for="sex" class="col-sm-2 control-label">เพศ</label>
                            <div class="col-sm-2">
                                <div class="control-label">
                                    <input class="radio-inline" type="radio"name="sex"value="ชาย"<?php if ($row[sex] == "ชาย") echo "checked"; ?>>ชาย
                                    <input class="radio-inline" control-label type="radio"name="sex"value="หญิง"<?php if ($row[sex] == "หญิง") echo "checked"; ?>>หญิง
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="education" class="col-sm-2 control-label">วุฒิการศึกษา:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="education" name="education"placeholder="Education"value="<?php echo $row[education] ?>">
                            </div>

                            <label for="Salary" class="col-sm-2 control-label">เงินเดือน</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="Salary" name="Salary"placeholder="Salary"value="<?php echo $row[Salary] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">ที่อยู่</label>
                            <div class="col-sm-3">
                                <textarea type="text" class="form-control" id="pass" name="address"placeholder="Address"value="<?php echo $row[address] ?>"><?php echo $row[address] ?></textarea>
                            </div>

                            <label for="status" class="col-sm-2 control-label">ตำแหน่ง</label>
                            <div class="col-sm-2">
                                <div class="control-label">
                                    <input class="radio-inline" type="radio"name="status"value="Admin"<?php if ($row[status] == "Admin") echo "checked"; ?>>Admin
                                    <input class="radio-inline" type="radio"name="status"value="Staff"<?php if ($row[status] == "Staff") echo "checked"; ?>>Staff
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="staff_Startdate" class="col-sm-2 control-label">วันเข้าทำงาน</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="staff_Startdate" name="staff_Startdate"placeholder="staff_Startdate"value="<?php echo $row['staff_Startdate'] ?>">
                            </div>
                        </div>

                        <div class="modal-footer">

                            <input class="btn btn-primary" type="submit" value="บันทึก" >
                            <button type="Reset" class="btn btn-warning">ยกเลิก</button>
                            <a href="delstaff.php?id=<?php echo $row[staff_id]; ?>"class="btn btn-danger">ลบ</a>
                        </div>
                    </form>
                </div>
                <?php include("../footer.php") ?> 
            </div>
        </div>
		<?php }?>
    </body>

</html>