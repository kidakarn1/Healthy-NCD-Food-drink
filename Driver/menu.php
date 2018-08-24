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

                                        <?php if ($_SESSION['user'] != "") { ?>
                                            <?php if ($_SESSION[status] == "Driver") { ?>   
                                                <a href="homeadmin.php"><font color="#ffffff">หน้าแรก </font><span class="sr-only">(current)</span></a>                             
                                            </li> 

                                            <li class="dropdown">

                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="#ffffff">จัดการสมาชิก</font><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="select_member.php">รายชื่อสมาชิก</a></li>
                                                    <li><a href="select_Blacklist.php">รายชื่อแบ็คริช</a></li>
                                                    <li><a href="select_staff.php">รายชื่อพนักงาน</a></li>


                                                </ul>
                                            </li>


                                            <li><a href="#frominsertstaff"data-toggle="modal" data-target="#frominsertstaff"><font color="#ffffff">เพิ่มพนักงาน</font></a></li>
                                        <?php } ?>   
                                    <?php } ?> 
                                    <?php if ($_SESSION[status] == "Admin"or"Staff") { ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="#ffffff">จัดการสั่งซื้อ</font> <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="select_sale.php">รายการสั่งซื้อ</a></li>
                                                <li><a href="Orders_Report.php">รายงานสรุปยอด</a></li>

                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="#ffffff">จัดการสินค้า</font> <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="cproduct.php">เช็คสินค้า</a></li>
                                            <li><a href="insert_product.php">เพิ่มสินค้า</a></li>
                                        </ul>
                                    </li>

                                    <?php if ($_SESSION[status] == "Admin") { ?>   
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="#ffffff">รายงาน</font> <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="rememday.php"><b>ข้อมูลสมาชิกประจำวัน</b></a></li> 
                                                <li><a href="recat.php"><b>ประเภทสินค้า</b></a></li>
                                                <li><a href="bestprom.php"><b>สินค้าขายดีประจำเดือน</b></a></li>
                                                <li><a href="mempromo.php"><b>ผู้ได้รับสิทธิโปรโมชั่น</b></a></li>
                                                <li><a href="Orders_Report.php"><b>ยอดขายประจำวัน</b></a></li>
                                                <li><a href="order_reportm.php"><b>ยอดขายประจำเดือน</b></a></li>
                                                <li><a href="insertadminevaluation.php"><b>แบบประเมิน ร้าน</b></a></li>
                                                <li><a href="insertadminflavour.php"><b>แบบประเมิน สินค้า</b></a></li>

                                            </ul>
                                            <!-- </li>
                                                                        
                  <li><a href="WebboardAdmin.php"><b><font color="#ffffff">เว็บบอร์ท</font></b></a></li>
                                              <li><a href="#fromedit_staff_admin"class=" btn btn-sm"data-toggle="modal" data-target="#fromedit_staff_admin"><font color="#ffffff "size="3">แก้ไข</font></a></li>  
                                            --><li>
                                        <?php } ?>
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
