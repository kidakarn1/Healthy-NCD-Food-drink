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


        </style>
    </head>
    <body>
        <?php
        include "menu.php";
        @session_start();
        include("../conn.php");
        ?>
        <?php
        $sql3 = "select*from user,member where user.username='" . $_SESSION[user] . "'
			and member.mem_id=user.user_id";
        $res3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($res3);
        $_SESSION['mem_id'] = $row3['mem_id'];
        $_SESSION['fname'] = $row3['fname'];
        $_SESSION['lname'] = $row3['lname'];

        $sql_name = "select * from disease where dis_id='2' ";       
         $res_name = mysqli_query($conn,$sql_name);
         $row_name= mysqli_fetch_array($res_name);
        ?>

        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default ">
                    <center><h3><u>รายชื่เครื่องดื่ม <?php echo $row_name['dis_name']?></u></h3></center>
                    <?php
                    $sql1 = "select* from food where dis_id='2' and cat_id='2' order by food_id asc";
                    $res1 = mysqli_query($conn, $sql1);
                    ?>
                    <table class="table table-striped table-condensed table-hover">
                        <tr>
                            <th><center>รหัสสินค้า</center></th>
                            <th><center>รูป</center></th>
                            <th><center>ชื่อสินค้า</center></th>
                            <th><center>วัตถุดิบ</center></th>
                            <th><center>แก้ไข</center></th>

                        </tr>
                        <?php
                        while ($row1 = mysqli_fetch_array($res1)) {
                            ?>
                        <tr>
                            <th><center><?php echo $row1['food_id'] ?></center></th>
                            <td><center><img src="../img_products/<?php echo $row1["image"] ?>" width="30" /></center></td>
                            <th><center><?php echo $row1['food_name']; ?></center></th>
                          <th><center><button type="button" class="btn btn-primary btn-md " data-toggle="modal" data-target="#myModal<?php echo $row1['food_id']?>"> วัตถุดิบ</button></center></th>

                            <td><center><a href="fromeditproductadmin.php?id=<?php echo   $row1['food_id'] ?>"><font color="#000000"><img src="../image/eDIT.png"width="20"height="20">แก้ไข</font></a></center></td>

                            </tr>
                                                 

                 
<!-- Modal -->
<div class="modal fade" id="myModal<?=$row1['food_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">วัตถุดิบที่ใช้</h4>
      </div>
      <div class="modal-body">
       <?php echo $row1['raw_material'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      </th>  


                     <?php
                        }
                        echo $_SESSION[imageproduct] = $row1[image];
                        ?>

                        <tr>

                            <td colspan="9" bgcolor="#ffcc66"><center><a href="#frominsertstaff"data-toggle="modal" data-target="#insertproductadmin">เพิ่มข้อมูลสินค้า</a> 
                             <a href="Drinking_heart_disease_admin.php">1</a>
                             <a href="Drinking Drinking_water_diabetes_admin.php">2</a>
                             <a href="Drinking_water_gout_admin.php">3</a> 
                             <a href="Drinking_water_pressure_admin.php">4</a>
                             <a href="insert_product5.php">5</a> 
                            <a href="insert_product6.php">6</a></center></td>
                        </tr>
                    </table>


                </div>


                <?php include("../footer.php");
				include("insertproductadmin.php");
                ?>
            </div>
        </div>


    </body>
</html>