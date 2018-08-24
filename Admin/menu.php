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
    <body >
        <?php
        @SESSION_START();
        include ("../conn.php");
        ?>

        <div class='container'>

            <nav class="nav navbar-default navbar-static-top ">
                <div class="container-fluid">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header " >

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10">
                        &nbsp;&nbsp;&nbsp;<font size="5"color="#006600"><b>Healthy NCD Food  & drink</b></font>

                    </div>
                    <div class="col-md-1"><?php include("../Translate.php"); ?></div>
                </div>
                <div class="col-md-offset-0 col-md-12 col-xs-12">
                    <div class="panel  btn-xs bg-default">	
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">


                                <li>



                                <li>
                                    <?php if ($_SESSION['user'] == "") { ?>

                                        <a href="../index.php"><font color="#330000">หน้าแรก</font> <span class="sr-only">(current)</span></a><?php } ?>

                                    <?php if ($_SESSION['user'] != "") { ?>
                                        <?php if ($_SESSION[status] == "Admin") { ?>   
                                            <a href="homeadmin.php">
                                                <img src="../icon_image/home.png" width="19">
                                                <font color="#330000">หน้าแรก </font><span class="sr-only">(current)</span></a>                             
                                        </li> 

                                        <li class="dropdown">

                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../icon_image/member1.png" width="19"><font color="#330000">จัดการสมาชิก</font><span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="select_waiting_for_approval.php"><img src="../icon_image/member2.png" width="19">สมากชิกที่รอคำอนุมัติ</a></li>
                                                <li><a href="select_member.php"><img src="../icon_image/member.png" width="19">รายชื่อสมาชิก</a></li>
                                                <li><a href="select_Blacklist.php"><img src="../icon_image/backlish.png" width="19">รายชื่อแบ็คริช</a></li>
                                                <li><a href="select_staff.php"><img src="../icon_image/staff1.png" width="19">รายชื่อพนักงาน</a></li>


                                            </ul>
                                        </li>


                                        <li><a href="#frominsertstaff"data-toggle="modal" data-target="#frominsertstaff"><img src="../icon_image/staff.png" width="19"><font color="#330000">เพิ่มพนักงาน</font></a></li>
                                    <?php } ?>   
                                <?php } ?> 
                                <?php if ($_SESSION[status] == "Admin" or $_SESSION[status] == "Staff") { ?>


                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../icon_image/order1.png" width="19"><font color="#330000">รายการสั่งซื้อ</font> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">

                                            <li><a href="order.php"><img src="../icon_image/order_food.png" width="19">
                                                    รายการอาหารที่ต้องทำ</a></li>
                                            <li><a href="select_sale.php"><img src="../icon_image/order.png" width="19">สินค้าสั่งซื้อ</a></li>


                                        </ul>
                                    </li>

                                <?php } ?>
                                <?php if ($_SESSION[status] == "Admin" or $_SESSION[status] == "Staff") { ?>


                                <?php } ?>
                                <?php if ($_SESSION[status] == "Admin" or $_SESSION[status] == "Staff") { ?>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../icon_image/product.png" width="19"><font color="#330000">จัดการสินค้า</font> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">

                                            <li><a href="insert_product.php"><img src="../icon_image/insert_product.png" width="19">เพิ่มอาหาร</a></li>
                                            <li><a href="Drinking_heart_disease_admin.php"><img src="../icon_image/insert_product.png" width="19">เพิ่มน้ำ</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php if ($_SESSION[status] == "Admin") {
                                    ?>   
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../icon_image/Manage_system.png" width="19"><font color="#330000">จัดการระบบ</font> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="category_foods.php"><img src="../icon_image/food.png" width="19">ประเภทอาหาร</a></li>
                                            <li><a href="recat.php"><img src="../icon_image/Disease.png" width="19">ประเภทของโรค</a></li>
                                            <li><a href="Education_type.php"><img src="../icon_image/education.png" width="19">ประเภทการศึกษา</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../icon_image/report.png" width="19"><font color="#330000">รายงาน</font> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="rememday.php"><b>ข้อมูลสมาชิกประจำวัน</b></a></li> 
                                        </ul>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="../icon_image/check_product.png" width="19"><font color="#330000">การจัดการเคล็ดลับ</font> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="Heart_disease.php"><b>โรคหัวใจ</b></a></li> 
                                            <li><a href="diabetes.php"><b>โรคเบาหวาน</b></a></li>
                                            <li><a href="Gout.php"><b>โรคเกาต์</b></a></li>
                                            <li><a href="High_blood.php"><b>โรคความดันโลหิตสูง</b></a></li>


                                        </ul>
                                    </li>
                                    <li>
                                    <?php } ?>
                                    <?php if ($_SESSION['user'] != "") { ?>
                                        <a href="../logout.php" class=" btn btn-sm"><img src="../icon_image/logout.png" width="19"><font color="#330000"size="2">logout</font></a><?php } ?>

                                </li> 

                            </ul>


                        </div>
                    </div>


                </div><!-- /.navbar-collapse -->
            </nav>

        </div><!-- /.container-fluid -->

        <?php include("frominsertstaff.php"); ?>
        <?php
        include("../fromeditmember.php");
        include("fromedit_staff_admin.php");
        ?>
        <?php
        include ("../fromlogin.php");
        //include("proorder.php");
        ?>



        <!-- Modal -->



        <!-- Button trigger modal -->

    </body>

</html>
