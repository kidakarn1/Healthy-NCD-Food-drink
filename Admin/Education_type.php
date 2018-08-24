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

            <link href="../css/bootstrap.css" rel="stylesheet">
            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <link href="../css/dns_9.css" rel="stylesheet">

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

            <?php include("menu.php"); ?>
            <?php
            include("../conn.php");
            $usernumber = $_GET[id];
            $sql = "select*from education";
            $res = mysqli_query($conn, $sql);
            ?>
            <div class='container'>
                <div class="panel-heading"><center><h3><b>ประเภทการศึกษา</b></h3></center></div>
                <div class=" panel panel-primary">

                    <br>


                    <table class="table table-striped table-condensed table-hover">
                        <tr>
                            <td style="color:#ffffff; background-color: green;" ><center><b>รหัสประเภท</b></center></td>
                        <td style="color:#ffffff; background-color: green;" ><center><b>ชื่อประเภท</b></center></td>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($res)) { ?>
                            <tr>
                                <td><center><?php echo $row[edu_id]; ?></center></td>
                            <td><center><?php echo $row[edu_name]; ?></center></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <?php include("footer_admin.php"); ?>

            </div>
        <?php } ?>
    </body>
</html>