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
        <body background="">
            <?php
            include "menu.php";
            @session_start();
            include("../conn.php");
            ?>
            <?php
            $sql1 = "select*from user,member where user.username='" . $_SESSION[user] . "'
			and member.mem_id=user.user_id";
            $res1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($res1);
            $_SESSION[mem_id] = $row1[mem_id];
            $_SESSION[fname] = $row1[fname];
            $_SESSION[lname] = $row1[lname];
            ?>
            <div class='container'>

                <div class="panel-heading"><center><h3><b>จัดการรายชื่อพนักงาน</b></h3></center></div>

                <div class=" panel panel-primary">



                    <br>
                    <?php
                    $spt = 0 + $_GET[sp];
                    $sql1 = "select*from user,staff where user.user_id=staff.staff_id and user.status='Staff'  limit $spt,10";
                    $res1 = mysqli_query($conn, $sql1);
                    ?>
                    <table class="table table-striped table-condensed table-hover">
                        <tr>
                            <td style="color:#ffffff; background-color: green;" ><center><b>ชื่อ</b></center></td>
                        <td style="color:#ffffff; background-color: green;" ><center><b>นามสกุล</b></center></td>
                        <td style="color:#ffffff; background-color: green;" ><center><b>สถานะ</b></center></td>
                        <td style="color:#ffffff; background-color: green;" ><center><b>การจัดการ</b></center></td>

                        </tr>

                        <?php
                        while ($row1 = mysqli_fetch_array($res1)) {
                            ?>
                            <tr>
                                <td><center><?php echo $row1[fname] ?></center></td>
                            <td><center><?php echo $row1[lname] ?></center></td>
                            <td><center><?php echo $row1[status] ?></center></td>
                            <td><center><a href="frominsertstaff_all.php?id=<?php echo $row1[staff_id] ?>"><font color="#0000ff">การจัดการ</font></a></center></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <br>
                    <center>
                        <div class="form-group">
                            หน้า
                            <?php
                            $sqlp = "select*from user,staff  where staff.staff_id=user.user_id and user.status='Staff'";
                            $resp = mysqli_query($conn, $sqlp);
                            $rowp = mysqli_num_rows($resp);
                            $page = $rowp % 10;
                            $pages = $rowp / 10;
                            $p = 0;
                            if ($page > 0) {
                                $pages = ($rowp / 10) + 1;
                            }

                            for ($i = 1; $i <= $pages; $i++) {
                                ?>
                                <a href="select_staff.php?sp=<?php echo $p ?>"><font color="#000000"><?php echo $i ?></font></a>
                                <?php
                                $p += 10;
                            }
                            ?>
                        </div>
                    </center>
                </div>
                <?php include("footer_admin.php"); ?>
            </div>


        <?php } ?>
    </body>
</html>