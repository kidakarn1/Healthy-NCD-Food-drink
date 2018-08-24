<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript">

            $(function () {

                $("#Admin").click(function () {
                    $("#addnew").hide();
                });
                $("#Staff").click(function () {
                    $("#addnew").hide();

                });
                $("#Chef").click(function () {
                    $("#addnew").hide();

                });
                $("#Driver").click(function () {
                    $("#addnew").show();

                });

            });

        </script> 
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
        include"../conn.php";
        $sql = "select*from user,member where user.username='$_SESSION[user]'
        and member.mem_id=user.user_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        date_default_timezone_set("asia/bangkok");
        $datetime = date("d/m/y");
        ?>

        <div class="modal fade" id="frominsertstaff" tabindex="-1" role="dialog" aria-labelledby="frominsertstaff">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="frominsertstaff">เพิ่มข้อมูลพนักงาน</h4>
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="insertfromadmin.php">
                        <input type="hidden"  name="id" >
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 control-label">ชื่อ:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="name">
                            </div>

                            <label for="lname" class="col-sm-2 control-label">นามสกุล:</label>
                            <div class="col-sm-8 col-md-3">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="lname">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">ชื่อผู้ใช้:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="username">
                            </div>
                            <label for="password" class="col-sm-2 control-label">รหัสผ่าน:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="password" name="password" placeholder="password">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">เบอร์โทร</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone" placeholder="NumberPhone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sex" class="col-sm-2 control-label">เพศ</label>
                            <div class="col-sm-8">
                                <input type="radio"name="sex"value="ชาย">ชาย
                                <input  type="radio"name="sex"value="หญิง">หญิง
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="education" class="col-sm-2 control-label">วุฒิการศึกษา:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="education" name="education"placeholder="Education">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Salary" class="col-sm-2 control-label">เงินเดือน</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Salary" name="Salary"placeholder="Salary">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">ที่อยู่</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="pass" name="address"placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">ตำแหน่ง</label>
                            <div class="col-sm-8">
                                <input type="radio"name="status"value="Admin" id="Admin">Admin
                                <input  type="radio"name="status"value="Staff" id="Staff">Staff
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="staff_Startdate" class="col-sm-2 control-label">วันเข้าทำงาน</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="staff_Startdate" name="staff_Startdate" placeholder="staff_Startdate">
                            </div>
                        </div>

                        <div class="modal-footer">

                            <input class="btn btn-primary" type="submit" value="บันทึก" >
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>

                        </div></form>
                </div>
            </div>
        </div>
    </body>

</html>