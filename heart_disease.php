       <?php   @SESSION_START();
     include("../conn.php");
if($_SESSION[user]=="" or $_SESSION[status]!="Admin"){
header("location: ../index.php");
}
?>
<?php
if($_SESSION[user]!=""and $_SESSION[status]=="Admin"){
    
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
        <body background='image/background-becomevendor.jpg'>

        <?php
        @SESSION_START();
        include "menu.php";
        @SESSION_START();
        include("conn.php");
        // $sql5 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
        //$res5 = mysqli_query($conn, $sql5);
       // $row5 = mysqli_num_rows($res5);
        ?>


        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h3>อาหารสำหรับคุณ</h3></center>
                       <div class="row">
                            <div class="col-md-offset-1 col-xs-8 col-md-3">
                                <a href="proorder.php">
                                    <font color="#000000"size="3">
                                    ตะกร้าสินค้า<img src="image/zz.png"width="20%">จำนวน
                                    <?php echo $row5 ?>
                                </a>
                            </div>

                            <div class="col-md-offset-4 col-md-4 ">
                                <form method="post" action="Search.php">

                                    <input type="text" name="search" placeholder="ค้นหาข้อมูลสินค้า">

                                    <button type="submit" class="btn btn-sm btn-warning ">ค้นหา</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="three panel-body">
                        <?php 
            /*เนื่องจาก'$_SESSION[disease]เป็นค่าว่าง จึงเลยต้องดึงข้อมูลมาใหม่*/


                            // $dis_id=explode($_SESSION[dis_id]);
                            //     print_r($dis_id);

                     
                        $sql = "select * from food where dis_id='1'";       
                        $res = mysqli_query($conn, $sql);

                        ?>
                       <!-- ห้ามลบนะ ถ้าลบอันแรกจะซื้อไม่ได้ #ตึ๋ง--> <form action="" method="post" class="search-wrapper cf">
                             </form>
                        <?php while ($row = mysqli_fetch_array($res)) {
                            ?>

                            <div class="form-group">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="tableproduct thumbnail ">

                                        <img src="img_products/<?php echo $row["image"]; ?>" alt="..." width="100%"><br>
                                        <center>
                                            <div class=" tableproduct1 caption">
                                                
                                                <h5>ชื่อ <?php echo $row["food_name"] . " " . $row["Description"]; ?><p></p>
                                                <font color="red"><?php echo "ราคา" . " " . $row["price"] . " " . "บาท";?></font><p></p>
                                                <font color="#ffffff">
                                                <?php
                                                echo $row["calories"] . " " . "กิโลแคลอรี่";
                                                ?></font><p></p>
                                                <form action='inorder.php' method='post' name='form2' id='form2'>
                                                   


                                                    จำนวน <select name="number"id="number">
                                                            <option value="5" selected>5</option >
                                                            <option value="4" selected>4</option >
                                                            <option value="3" selected>3</option >
                                                            <option value="2" selected>2</option >
                                                            <option value="1" selected>1</option >
                                                        </select> จาน<br>
                                                        </h5>
                                              

                                          <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#myModal<?php echo $row['food_id']?>">
    
  วัตถุดิบ
</button>

<!-- Modal -->
<div class="modal fade" id="myModal<?=$row['food_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">วัตถุดิบที่ใช้</h4>
      </div>
      <div class="modal-body">
       <?php echo $row['raw_material'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
       <p></p>

                                               
                                                        <input type="submit" class="btn btn-xs btn-success" name="button" id="button"  value="หยิบใส่ตะกร้า"/>
                                                 

                                                    <input name="food_id" type="hidden" id="proid" value="<?php echo$row["food_id"] ?>" />

                                                    <input name="price" type="hidden" id="hiddenField2" value="<?php echo$row["price"] ?>" />
                                                    <input name="food_name" type="hidden" id='hiddenField3' value="<?php echo$row["food_name"] ?>" />

                                                    <!-- Large modal -->
<!-- Button trigger modal -->


<!-- <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample<?php echo $row['food_id']?>" aria-expanded="false" aria-controls="collapseExample">
วัตถุดิบ
</a>

<div class="collapse" id="collapseExample<?=$row['food_id']?>">
  <div class="well">
<?php echo $row['raw_material']?>
  </div>
</div> -->





                                                </form>



                                                <?php // }  ?>
                                            </div>
                                        </center>
                                    </div>

                                </div>          
                            </div>
                        <?php }
                        ?>         
                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


                    </div>
                </div>


               

                <?php include("footer.php");
                ?>

            </div>
        </div>
        <?php } ?>
    </body>
</html>