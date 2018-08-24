<?php
@SESSION_START();
include("../conn.php");
if ($_SESSION[user] == ""){
    header("location: ../index.php");
}
?>
<?php
if ($_SESSION[user] != ""and $_SESSION[status] == "Chef" or $_SESSION[status] != "Admin" or $_SESSION[status] != "Staff") {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <LINK REL="SHORTCUT ICON" HREF="../image/icon.ico">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <title>อัฟเดชโปรโมชั่น</title>

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


            </style>
        </head>
        <body>
            <?php
            include "menu.php";
            @SESSION_START();
            include("../conn.php");
            ?>
            <?php
            $sql1 = "select*from user,member where user.username='" . $_SESSION[user] . "'
			and member.mem_id=user.user_id";
            $res1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($res1);
            $_SESSION[mem_id] = $row1[mem_id];
            $_SESSION[fname] = $row1[fname];
            $_SESSION[lname] = $row1[lname];
            ?>
            <div class="container">
                <div class="navbar-inverse">
                    <br>
                    <div class="three panel panel-default ">



                        <br>
                        <?php
                        $spt = 0 + $_GET[sp];
                        $sql5 = "select* from orderdns,product where orderdns.order_status!='กำลังดำเนินการจัดทำ' and orderdns.pro_id=product.pro_id order by order_id desc limit $spt,10";

                        $res5 = mysqli_query($conn, $sql5);
                        ?>
                        <div class="table-responsive">
                            <table class="table">

                                <tr>
                                    <th colspan="0" bgcolor="#ffcc33"><center>รหัสการสั่ง</th>
                                    <th colspan="0" bgcolor="#ffcc33"><center>รหัสผู้สั่ง</th>
                                        <th colspan="0" bgcolor="#ffcc33"><center>ชื่อสินค้า</th>
                                            <th colspan="0" bgcolor="#ffcc33"><center>จำนวน</th>
                                                <th colspan="0" bgcolor="#ffcc33"><center>ยอดรวม</th>
                                                    <th colspan="0" bgcolor="#ffcc33"><center>ที่อยู่</th>
                                                        <th colspan="0" bgcolor="#ffcc33"><center>วันที่สั่งซื้อ</th>
                                                            <th colspan="0" bgcolor="#ffcc33"><center>สถานะ</th>
                                                                <th colspan="0" bgcolor="#ffcc33"><center></th>
                                                                    <th bgcolor="#ffcc33"><center>ลบ</th>
                                                                        </tr>


                                                                        <?php
                                                                        while ($row5 = mysqli_fetch_array($res5)){
                                                                            ?>
                                                                        <tr>
                                                                        </center>
                                                                        <th><center><?php echo $row5[order_id]; ?></center></th>

                                                                        <th><center><a href="name_order.php?id=<?php echo $row5[mem_id]; ?>"><font color="#0000ff"><?php echo $row5[mem_id]; ?></font></a></center></th>
                                                                        <th><center><?php echo $row5[pro_name] . $row1[Description]; ?></center></th>
                                                                        <th><center><?php echo $row5[order_number] ?></center></th>
                                                                        <th bgcolor="#ffffff"><center><?php echo $row5[price_sum] ?></center></th>
                                                                        <th bgcolor="#ffffff"><center><?php echo $row5[orderAdd] ?></center></th>
                                                                        <th bgcolor="#ffffff"><center><?php echo $row5[order_date] ?></center></th>
                                                                <form method="post" action="edit_orderstatus.php">
                                                              <?php if ($row5[car_id]!=0){?>
                                                                      <?php if ($row5[order_status]=='กำลังดำเนินการจัดส่ง'){?>
                                                                    <th><input type="hidden" name="order_id"value="<?php echo $row5[order_id] ?>"></th>
                                                                    
                                                                    <th> <label value="กำลังดำเนินการจัดส่ง"name="status"><font color="blue">กำลังดำเนินการจัดส่ง</font></label><input type="submit"value="ส่งสินค้าเสร็จสิ้น"name="status"></th>
                                                                            <?php
                                                                                }
                                                              }
                                                                            ?>
                                                                            <?php if ($row5[order_status]=='ส่งสินค้าเสร็จสิ้น'){?>
                                                                  <th></th>
                                                                         <th>   
                                                                             <label value="ส่งสินค้าเสร็จสิ้น"name="status"><font color="green">ส่งสินค้าเสร็จสิ้น</font></label>
                                                                             </th>
                                                                            <?php
                                                                                }
                                                              
                                                                            ?>
                                                                            
                                                                            </form>
                                                                            
                                                               <?php if ($row5[car_id]==0){?>
                                                                <td bgcolor="#ffffff"><center><div name="oeder_id"><a href="car.php?id=<?php echo $row5[order_id];?>">จัดทำเสร็จสิ้น</a></div>
</a></center></td>
                                                               <?php }?>
                                                                    <td><a href="delorder.php?id=<?php echo $row5[order_id] ?>"><font color="#0000ff"><center>ลบ&nbsp;&nbsp;<img src="../image/delete.png"width="20"height="20"></center></font></a></td>
       
</tr>
<tr>
<?php
if($_SESSION[order_id]!=$row5[order_id]){
?>
<th colspan="9"><a href="bill.php?id=<?php echo $row5[order_id];?>"><font color="#ff0033"><center>ปริ้นใบเสร็จหมายเลข
<?php echo $row5[order_id];?></center></font></a></th>
</tr>
 <?php

	}
	$id=$row5[order_id];	
	}
	?>

                                                                <div class="setpage123">
                                                                    <font color="#000000">หน้า</font>
                                                                    <?php
                                                                    $sqlp = "select* from orderdns";
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
                                                                        <a href="select_sale.php?sp=<?php echo $p ?>"><font color="#000000"><?php echo $i ?></font></a>
                                                                        <?php
                                                                        $p+=10;
                                                                    }
                                                                    ?>
                                                            </center>
                                                            </table>
                                                            </div>
                                                            <br><br>
                                                            </div>
                                                            </div>

                    
<?php include("../footer.php"); }?>
                                                        </div>
                                                        </div>
                                                        </body>
                                                        </html>