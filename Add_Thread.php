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
        <?php
        include"conn.php";
        date_default_timezone_set("asia/bangkok");
        $datetime = date("d-m-y / h:i");
        $sql6 = "select*from user,member where user.username='" . $_SESSION[user] . "'
        and member.mem_id=user.user_id";
        $res6 = mysqli_query($conn, $sql6);
        $row6 = mysqli_fetch_assoc($res6);
        ?>
        <div class="modal fade" id="AddThread" tabindex="-1" role="dialog" aria-labelledby="AddThread">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="AddThread">เพิ่มกระทู้</h4>
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="insert_webboard.php">
                        <div class="form-group">
                            <label for="board_title" class="col-sm-2 control-label">ชื่อหัวข้อ:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="board_title" name="board_title" placeholder="ชื่อกระทู้">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-12 col-md-12">
                                <label for="board_description" class="control-label">รายละเอียด:</label>
                            </div>
                            <textarea name="board_description" class="col-xs-offset-2 col-sm-7 col-xs-7 col-md-8"></textarea>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-12 col-md-12">
                                <label for="board_description" class="control-label">ผู้ตั้งคำถาม: <?php echo $row6[fname]; ?></label>
                            </div>
                            <input type="hidden" name="mem_id" value="<?php echo $row6[fname]; ?>">

                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-12 col-md-12">
                                <label for="board_description" class="control-label">วัน/เดือน/ปี:  <?php echo $datetime; ?></label>
                            </div>
                            <input type="hidden" name="mem_id" value="<?php echo $datetime; ?>">

                        </div>




                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">

                                <button type="submit" class="btn btn-success">ตั้งกระทู้</button>
                            </div>
                        </div>
                    </form>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>

                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-1.11.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>