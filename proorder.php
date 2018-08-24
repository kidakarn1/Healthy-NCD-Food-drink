<?php     include("menu.php");?>
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
        <script language="javascript" src="jquery-3.1.1.min.js"></script>  
        <script type="text/javascript">
               
    $(function () {

                $("#addre").click(function () {
                    $("#addre").show();
                    $("#addnew").hide();


                });

				
                $("#addre1").click(function () {
                    $("#addre").show();
                    $("#addnew").hide();


                });
                $("#addnewf").click(function () {
                    $("#addnew").show();

                });

            });

        </script> 




        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">


        </style>
    </head>
        <body background='image/background-becomevendor.jpg'>



        <?php
        @SESSION_START();
        include("conn.php");
        $spt = 0 + $_GET[sp];
        $sql = "select*from orderdns,product where orderdns.pro_id=product.pro_id and orderdns.mem_id='$_SESSION[mem_id]' and order_id='' limit $spt,2";
        $res = mysqli_query($conn, $sql);

        $sql2 = "select sum(price_sum) as ordersum from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($res2);
        ?>



        <?php
        $sql5 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
        $res5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_num_rows($res5);
        ?>
        <div class="container">
            <div class="navbar-inverse"><br>
                <div class="three panel panel-default ">
                    <div class="panel-heading"><font color = "#000000">ตะกร้าสินค้า</font><a href="proorder.php"><img src="image/zz.png"width="50"height="50">&nbsp;&nbsp;<font color = "#000000">จำนวน&nbsp;<?php echo $row5 ?></font></a>
                    </div>


                    <div class="form-group">
                        <center>
                            <div class="row">



                                <div class="col-md-12"><h2>รายการสินค้า</h2></div>

                            </div>

                            <div class="row">
                                <div class=" col-md-offset-2">
                                    <div class="col-xs-2 col-md-2">ชื่อ</div>
                                    <div class="col-xs-2 col-md-2">รูป</div>
                                    <div class="col-xs-1  col-md-1">ราคา</div> 
                                    <div class="col-xs-2 col-md-1">&nbsp;&nbsp;จำนวน</div>
                                    <div class="col-xs-1 col-md-2">ราคารวม</div>
                                    <div class="col-xs-3 col-md-2">รายการสั่งซื้อ</div>
                                </div>
                            </div>

                            <?php while ($row = mysqli_fetch_array($res)) { ?>
                                <br>
                                <div class="row">
                                    <div class="col-md-offset-2">
                                        <div class="col-xs-2 col-md-2"><?php echo $row[pro_name]; ?></div>
                                        <div class="col-xs-2 col-md-2"><img src="img_products/<?php echo $row[image]; ?>"></div>
                                        <div class="col-xs-1 col-md-1"><?php echo $row[price]; ?></div>
                                        <form method="post" action="ordernumber.php" class="success">
                                            <div class="col-xs-2 col-md-1 "><input  type="text"  name="ordernumber"  value="<?php echo $row[order_number]; ?>"size="1">
                                                <input type="hidden" name="idproduct"value="<?php echo $row[pro_id]; ?>">
                                                <font color="ffffff"><input type="submit"class=" btn btn-xs label-success" value="ยืนยัน"></font>   <!-- ?? -->

                                            </div>
                                        </form>
                                        <div class=" col-xs-1 col-md-2"><?php echo $row[price_sum]; ?></div>
                                        <div class="col-xs-1 col-md-1 "><div class="col-xs-offset-10"><a href="cancleorder.php?pro_id=<?php echo $row[pro_id]; ?>"><font color="#ffffff"><input type="submit"class="btn btn-sm label-danger" value="ยกเลิก"></font></a></div>
                                        </div>
                                    </div>
                                </div>


                                <?php
                            }
                            $sql6 = "select sum(price_sum) as pricesum from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
                            $res6 = mysqli_query($conn, $sql6);
                            $row6 = mysqli_fetch_array($res6);
                            ?>
                        </center><br>
                        <div class="row">
                            <div class="col-md-offset-2">
                                <div class="col-xs-7 col-md-2">ราคาที่ต้องชำระ</div>
                                <div class="col-md-offset-4 col-xs-1 col-md-2"><center><?php echo $_SESSION[ordersum] = $row2[ordersum] . '&nbsp;' . 'บาท'; ?></center></div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-offset-2 col-xs-12 col-md-2"><font color = "#000000">หน้ารายการสินค้า 
                                <?php
                                $sqlp = "select*from orderdns where order_id='' and mem_id='$_SESSION[mem_id]'";
                                $resp = mysqli_query($conn, $sqlp);
                                $rowp = mysqli_num_rows($resp);
                                $page = $rowp % 2;
                                $pages = $rowp / 2;
                                $p = 0;
                                if ($page > 0) {
                                    $pages = ($rowp / 2) + 1;
                                }
                                for ($i = 1; $i <= $pages; $i++) {
                                    ?>
                                    <font color = "#fffff"><a href="proorder.php?sp=<?php echo $p ?>"><font color="#000000"><?php echo $i ?></font></a>
                                    <?php
                                    $p+=2;
                                }
                                ?>
                                <?php
                                $sql8 = "select*from member where mem_id='$_SESSION[mem_id]' ";
                                $res8 = mysqli_query($conn, $sql8);
                                $row8 = mysqli_fetch_array($res8);
                                ?>
                            </div>
                        </div><br>
                       
                        <form method="post" action="connadd.php">
                            <?php 
                            if ($_SESSION[user]==""){?>
                              <div class="form-grop">
                     

                          <div class="row">
                                <div class="col-md-offset-4 col-xs-offset-1 col-xs-10 col-md-4">
                                       <label class="col-md-offset-1"><font color="#000000">ชื่อ</font><font color="#ff0000">*</font> </label>
                                    <input type="text" class="form-control" name="name" rows="2"></textarea><br>
                                </div>
                            </div>

                                </div>
                              <div class="form-grop">
                     

                          <div class="row">
                                <div class="col-md-offset-4 col-xs-offset-1 col-xs-10 col-md-4">
                                       <label class="col-md-offset-1"><font color="#000000">เบอร์โทรศัพท์</font><font color="#ff0000">*</font> </label>
                                       <input type="text" class="form-control" name="telephone" rows="2" maxlength="10"></textarea><br>
                                </div>
                            </div>

                                </div>
                            <?php }?>
                            
                                <div class="form-group">

                                <div class="col-md-offset-4  col-xs-12 col-md-10">
                                    <span class=" col-md-offset-0">
                                        <input type="radio" name="fromorderre"value=""id="addnewf"><font color="#000000">ที่อยู่ที่จะต้องจัดส่ง</font><font color="#ff0000">*</font> 
                                    </span>
                                    <?php if ($_SESSION[user]!=""){?>
                                    <span class=" col-md-offset-0">
                                        <input type="radio" name="fromorderre"value="<?php echo $_SESSION[address]; ?>" id="addre"><font color="#000000">จัดส่งตามที่อยู่ตามที่สมัคร</font>
                                    </span>    
                                    <?php }?>
                                    <span class=" col-md-offset-0">
                                        <input type="radio" name="fromorderre"value="ในร้าน" id="addre1"><font color="#000000">ในร้าน</font>
                                    </span>
                                </div>
                            </div>
							
                            <div class="row">
                                <div class="col-md-offset-4 col-xs-offset-1 col-xs-10 col-md-4">
                                    <textarea class="form-control" name="fromorder" rows="2"  id="addnew"></textarea><br>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-offset-4 col-xs-10 col-md-4">
                                    <font color="#000000">ระยะห่าง</font><font color="#ff0000">*</font> <font color="#000000"><select name="distance" id="distance">
                                        <option value="1" selected>1</option>
                                        <option value="2" selected>2</option>
                                        <option value="3" selected>3</option>
                                        <option value="4" selected>4</option>
                                        <option value="5" selected>5</option>
                                    </select></font>
                                </div>
                            </div>
<br>
 <div class="row">
                                <div class="col-md-offset-4 col-xs-offset-1 col-xs-10 col-md-4">
                                       <label class="col-md-offset-1"><font color="#000000">จำนวนเงิน</font><font color="#ff0000">*</font> </label>
                                       <input type="text" class="form-control" name="price_user" rows="2" maxlength="10"><br>
                                </div>
                            </div>
                    </div><br>



                    <div class="form-group">

                        <div class="col-sm-offset-2 col-md-offset-4 col-xs-2 col-md-1">
                            <button type="submit" class="col-md-offset-6 col-md-12 btn btn-sm btn-success">สั่งซื้อ</button></form>
                        </div>
                        <div class="col-xs-offset-1 col-md-1 col-xs-3">
                            <form class="col-md-offset-6" method="post" action="hisorder.php"><input type="submit" class="btn btn-sm btn-warning"value="ประวัติสั่งซื้อ"></form>

                        </div>
                        <div class="col-xs-offset-1 col-md-1 col-xs-2">
                            <form class="col-md-offset-10" method="post" action="Hot_drink.php"><input type="submit" class="btn btn-sm btn-danger"value="กลับหน้าเมนู"></form>
                        </div>         
                    </div>


                    <center>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <br><font color="#330000"><h5>********ส่งได้เพียงระยะทาง 5 กิโลเมตรเท่านั้นครับ********</h5></font>
                            </div>
                        </div>
                    </center>
                </div><?php include("footer.php") ?>
            </div>  
        </div>




    </body>
</html>
