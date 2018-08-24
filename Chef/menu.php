<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title></title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <script src="../js/bootstrap.js"></script>
        <script src="../js/bootstrap.min.js"></script>

        <script src="../js/jquery-1.11.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>




        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
        .size3{
            margin-top:1%;
        }
        </style>
    <body>
        <?php
        @SESSION_START();
        include ("../conn.php");
        ?>

        <div class='container'>
            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header" >
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>



                    </div>
                    <div align = "center"><?php include("../DnsSpan.php"); ?></div>



                    <!-- <nav class="navbar navbar-inverse navbar-static-top-brand">
                    -->
                    <!-- Brand and toggle get grouped for better mobile display -->


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar-collapse "id="bs-example-navbar-collapse-1">


                        <div class="row">
                            <div class="col-md-12 col-md-offset-1">
                                <ul class="nav navbar-nav">


                                    <li>
                                        <?php if ($_SESSION['user'] == "") { ?>
                                            <a href="../index.php"><font color="#ffffff">หน้าแรก</font> <span class="sr-only">(current)</span></a><?php } ?>

                                      
                                   
                                      
                                    <li><a href="homechef.php"><font color="#ffffff">รายการสั่งซื้อ</font></a></li>
                                    <li><a href="finish_order.php"><font color="#ffffff">รายการที่ทำแล้ว</font></a></li>
                                      
                               

                                  
                                            <li>
                                       
                                        <?php if ($_SESSION['user'] != "") { ?>
                                            <a href="../logout.php" class=" btn btn-sm"><font color="#ffffff"size="3">ออกจากระบบ</font></a><?php } ?>

                                    </li> 
                                    <li class="size3"><?php include("../Translate.php"); ?></li>

                                </ul>








                                



                            </div>
                        </div>


                    </div><!-- /.navbar-collapse -->

                </div><!-- /.container-fluid -->
            </nav>
 



            <!-- Modal -->



            <!-- Button trigger modal -->

        </div>



    </body>

</html>
