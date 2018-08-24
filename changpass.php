<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <LINK REL="SHORTCUT ICON" HREF="image/icon.ico">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>สั่งซื่อสินค้า</title>

        <!-- Bootstrap -->

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dns_9.css" rel="stylesheet">
    </head>
    <style type="text/css">

        body {
            background-image: url(image/ui.jpg);
            background-attachment:fixed;
        }


    </style>
    <script language="javascript" src="jquery-3.1.1.min.js"></script>  
    <script type="text/javascript">

        $(function () {
            $("p#password").hide();

            $("#password").focusout(function () {
                var $min_lengthpa = $(this).val();
                if (!$min_lengthpa.match(/^([a-z0-9\_])+$/)) {
                    $("p#password").show();
                    $(this).val('');
                } else {
                    $("p#password").hide();
                }
            });

        });
    </script>  


    <?php
    @SESSION_START();
    include("menu.php");
    include("conn.php");
    ?>
    <div class="container">
        <div class="navbar-inverse">
            <center><br>
                <div class="three panel panel-default ">


                    <?php
                    $sql2 = "select*from user,member where user.user_id='$_SESSION[mem_id]'and member.mem_id=user.user_id";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($res2);
                    $pass = md5($_POST[password2]);
                    if ($pass == 'd41d8cd98f00b204e9800998ecf8427e'or $pass != $row2[password]) {
                        ?>

                        <form method="post" action="changpass.php">
                            <br><br><br><br><br><br><br><br><br>
                            <div class="form-inline">
                                <div class="form-group ">


                                    <label>รหัสผ่านเก่า:</label>

                                    <div class="form-group">
                                  
                                            <input type="text"  class="form-control"  name="password2" id="password2">
                                     
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-sm btn-success " value="ยืนยัน">
                                    </div>
                                </div>
                            </div>
                            <br><br><br><br><br><br><br><br><br>
                        </form>
                    <?php } ?>


                    <?php if ($pass == $row2[password]) { ?>
                        <form  method="post" action="editpass.php">
                            <br><br><br><br><br><br><br><br><br>
                            <div class="form-inline">
                                <div class="form-group ">
                                    <label>รหัสผ่านใหม่:</label>
                                    <div class="form-group">
                                        <input type="text" class=" form-control" name="password" id="password">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-sm btn-success" value="ยืนยัน">
                                    </div>
                                    <p  id="password">กรอกได้เฉพาะ a-Z, A-Z, 0-9 และ _ (underscore)</p>





                                    <input type="hidden" name="id" value="<?php echo $row2[mem_id] ?>">
                                </div>

                            </div>
                            <br><br><br><br><br><br><br><br><br>
                        </form>
                    <?php } ?>


                </div>
            </center>
            <?php include("footer.php") ?>
        </div>
    </div>




</body>
</html>