<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include"conn.php"; ?>
        <div class="modal fade" id="AddThread" tabindex="-1" role="dialog" aria-labelledby="AddThread">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="AddThread">ล็อกอิน</h4>
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="login.php">
                        <div class="form-group">
                            <label for="Username" class="col-sm-2 control-label">ชื่อผู้ใช้</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Username" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-sm-2 control-label">รหัสผ่าน</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pass" name="pass"placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <?php include("randomcaptcha.php"); ?>
                            <label for="inputPassword3" class="col-sm-3 control-label">กรอกตัวเลข</label>
                            <div class="col-sm-8">
                                <img border="0" id="captcha" src="showcaptcha.php">
                            </div>

                            <div class="form-group">

                                <div class="col-sm-8">
                                    <input type="text" name="str" size="2"placeholder="กรุณากรอกตัวเลขที่ปรากฎ:">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">

                                <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <form method="post" action="register.php">
                                <botton class="btn btn-success">สมัครสมาชิก</botton>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-1.11.2.min.js"></script>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="js/bootstrap.min.js"></script>
    </body>
</html>