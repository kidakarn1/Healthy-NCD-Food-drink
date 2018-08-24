<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --><title>ยินดีต้อนรับสู่ Healthy NCD</title>

        <!-- Bootstrap -->

        <script src="js/jquery-3.1.1.min.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/jquery.steps.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/normalize.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.steps.min.js"></script>
        <script src="js/jquery.steps.js"></script>
        <script type="text/javascript" src="dist/jquery.validate.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
        .size3{
            margin-top:-1%;
        }
    </style>
    <body background='image/background-becomevendor.jpg'>


        <?php
        @session_start();
        include "conn.php";
        ?>
        <div class='container'>

            <nav style="btn-success1:#99cc00" class="btn-success1 	  navbar-default navbar-static-top ">

                <div class="col-md-offset-2 col-md-10 col-xs-10">
                    <?php include("Translate.php"); ?> 
                </div> 
                <div class="row ">   
                    <div class=" navbar-inverse">

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>



                    </div>

                    <div class="col-md-offset-0 col-md-12 col-xs-12">
                        <div class="panel  btn-xs bg-default">
                            <img src="image/banner.jpg"width="100%"height="100%">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                <ul class="nav navbar-nav ">

                                    <li>

                                        <?php if ($_SESSION['user'] == "") { ?>
                                            <a href="index.php"><img src="icon_image/home.png" width="20"><font color="#000000"size="3">หน้าแรก</font> <span class="sr-only">(current)</span></a><?php } ?>

                                        <?php if ($_SESSION['user'] != "") { ?>
                                            <a href="home.php"><img src="icon_image/home.png" width="20"><font color="#000000"size="3">หน้าแรก <span class="sr-only">(current)</font></span></a><?php } ?>                                
                                    </li>


                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="icon_image/Light_bulbs.png" width="20"><font color="#000000" size="3">เคล็ดลับความรู้</font> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a  href="Heart_disease_tips.php">โรคหัวใจ</a></li>
                                            <li><a href="diabetes_tips.php">โรคเบาหวาน</a></li>
                                            <li><a href="Gout_tips.php">โรคเกาต์</a></li>
                                            <li><a href="High_blood_pressure_tips.php">โรคความดันโลหิตสูง</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="icon_image/drink.png" width="20"><font color="#000000"size="3">น้ำดื่มสำหรับ</font> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a  href="water_for_heart_disease.php">โรคหัวใจ</a></li>
                                            <li><a href="Diabetic_Drinking_Water.php">โรคเบาหวาน</a></li>
                                            <li><a href="Diabetic_Drinking_gout.php">โรคเกาต์</a></li>
                                            <li><a href="Drink_water_pressure_disease.php">โรคความดันโลหิตสูง</a></li>
                                        </ul>
                                    </li>


                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="icon_image/food1.png" width="20"><font color="#000000"size="3">อาหารสำหรับ </font><span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="Food_heart.php">โรคหัวใจ</a></li>
                                            <li><a href="Food_diabetes.php">โรคเบาหวาน</a></li>
                                            <li><a href="Free_Gout.php">โรคเกาต์</a></li>
                                            <li><a href="Food_Highbloodpressure.php">โรคความดันโลหิตสูง</a></li>

                                            <!-- <li><a href="Cake.php">เค้ก</a></li> -->
                                        </ul>
                                    </li>

                                    <?php if ($_SESSION['user'] == "") { ?>
                                        <li> <a href="#myModal"data-toggle="modal" data-target="#myModal"><img src="icon_image/food.png" width="20"><font color="#000000"size="3">อาหารสำหรับคุณ</font></a></li>
                                    <?php } ?>
                                    <?php if ($_SESSION['user'] != "") { ?>
                                        <li><a href="Food_for_you.php"><img src="icon_image/food.png" width="20"><font color="#000000"size="3">อาหารสำหรับคุณ</font><span class="sr-only"></span></a></li>

                                    <?php } ?>





                                    <?php if ($_SESSION['user'] == "") { ?>
                                        <li> <a href="register.php"><font color="#000000" size="3"><img src="icon_image/register.png" width="20">สมัครสมาชิก</font></a></li>
                                    <?php } ?>

                                    <li>
                                        <?php if ($_SESSION['user'] == "") { ?> 

                                            <a type="" class=" btn btn-sm"data-toggle="modal" data-target="#myModal"><img src="icon_image/login.png" width="20"><font color="#000000"size="3">เข้าสู่ระบบ</font></a>
                                        </li> 						
                                    <?php } ?>								
                                    <?php if ($_SESSION['user'] != "") { ?>
                                        <li>
                                            <a href="logout.php" class=" btn btn-sm"><font color="#000000"size="3">ออกจากระบบ</font></a><?php } ?>

                                    </li>	

                                </ul></div>


                        </div><!-- /.navbar-collapse -->
                    </div>

                </div><!-- /.container-fluid -->

         <?php
            if ($_SESSION['user'] == "") {
                include ("fromlogin.php");
            }
            ?>
            </nav>
            <!-- Modal -->





    </body>

</html>
