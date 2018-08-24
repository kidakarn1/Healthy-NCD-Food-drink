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

        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dns_9.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">


        </style>
    </head>
    <body background='image/ui.jpg'>
        <?php
        @SESSION_START();
        include "menu.php";
        ?>
        <?php
        $sql1 = "select*from user,member where user.username='" . $_SESSION[user] . "'
			and member.mem_id=user.user_id";
        $res1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($res1);
        $_SESSION[mem_id] = $row1[mem_id];
        $_SESSION[fname] = $row1[fname];
        $_SESSION[lname] = $row1[lname];
        $_SESSION[image] = $row1[image];
        date_default_timezone_set("asia/bangkok");
        $datetime = date("d-m-y / h:i");


        $sql3 = "select * from upimage";
        $res3 = mysqli_query($conn, $sql3);
	    $sql4 = "select * from upimage,member where member.mem_id='".$_SESSION[user]."'and upimage.mem_id=member.mem_id";
        $res4 = mysqli_query($conn,$sql4);
		?>
        <?php

        function getName($id) {
            global $conn;
            $sql = "select * from member where mem_id='$id'";
            //echo $sql;
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($res);
            return $row[fname];
        }
        ?>

        <div class="container">
            <div class="navbar-inverse">
                <!-- <br>
                         <font color="#ffffff"size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="image/people.gif"width="4%"height="4%">&nbsp;คุณ&nbsp;<?php echo $_SESSION[fname]; ?>&nbsp;
                <?php echo $_SESSION[lname]; ?> </font> -->

                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h4>บรรยากาศในร้าน</h4></center></div>
                    <div class="three panel-body">

                        <br>



                        <br>




                        <?php while ($row3 = mysqli_fetch_array($res3)) {
                            ?>

                            <div class="form-group">

                                <div class="  col-xs-12 col-sm-12 col-md-12">
                                    <div class="tableproduct thumbnail ">
                                        <img src="upimage/<?php echo $row3[image]; ?>"width="80%">

                                        <center>
                                            <br>

                                            <div class=" tableproduct1 caption">
                                                <?php echo $row3[Description]; ?><br>

                                                โพสต์โดย : <?php echo getName($row['mem_id']); ?><br>
                                                <?php echo $row3[Down_date]; ?>
                                            </div>
                                        </center>
                                    </div>

                                </div>          
                            </div>





                            <?php
                        }
                        ?>

                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
						<?php if ($_SESSION[user]!=""){?>
                        <form class="form-horizontal"action="insertupimage.php" method="post"enctype="multipart/form-data"id="formre">
                            <center>
                                <div class="form-group">
                                    <div class=" col-md-offset-4 col-md-2">

                                        <input class="control-label" type="file" name="file" id="file" />
                                    </div>

                                    <div class="col-md-3">

                                        <textarea class="form-control" name="Description" rows="1" cols="10"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="fname" value="<?php echo $row1[fname]; ?>">
                                <input type="hidden" name="datetime" value="<?php echo $datetime; ?>">
                              
                                <input class="btn btn-md btn-success" type="submit"value="โพส">

                            </center>
                        </form>
<?php }?>
                    </div>
                </div>



                <?php include("footer.php") ?>
            </div>
        </div>
    </body>
</html>