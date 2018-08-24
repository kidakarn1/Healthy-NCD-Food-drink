
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ยินดีต้อนรับสู่ Healthy NCD</title>


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

        $sql = "select * from food where food.dis_id='2' and cat_id='1' order by food.food_id asc";
        $res = mysqli_query($conn, $sql);

        $sql_name = "select * from disease where dis_id='2'";
        $res_name = mysqli_query($conn, $sql_name);
        $row_name = mysqli_fetch_array($res_name);
        ?>
        <?php
// $a=array("red","green","blue","yellow","brown");
// $random_keys=array_rand($a,3);
// echo $a[$random_keys[0]]."<br>";
// echo $a[$random_keys[1]]."<br>";
// echo $a[$random_keys[2]];
        ?>


        
         <div class="panel">
            <div class=" panel-body">

                <div class=" panel panel-primary">
            <div class="panel-heading"><center><h3><?php echo "น้ำดื่มสำหรับ" . " " . $row_name['dis_name'] ?></h3></center>
                <div class="row">
                    <div class="col-md-offset-9 col-md-4 ">
                        <form method="post" action="Search.php">
                            <div class="col-md-7">
                                <input type="text" name="search" class="form-control " placeholder="ค้นหาข้อมูลสินค้า">
                            </div>
                            <button type="submit" class="btn btn-md btn-warning control-label">ค้นหา</button>
                        </form>
                    </div>
                </div>
            </div>
                    <div class="three panel-body">
                        <?php
                        /* เนื่องจาก'$_SESSION[disease]เป็นค่าว่าง จึงเลยต้องดึงข้อมูลมาใหม่ */


                        // $dis_id=explode($_SESSION[dis_id]);
                        //     print_r($dis_id);
                        ?>
                        <!-- ห้ามลบนะ ถ้าลบอันแรกจะซื้อไม่ได้ #ตึ๋ง--> <form action="" method="post" class="search-wrapper cf">
                        </form>
                        <?php while ($row = mysqli_fetch_array($res)) {
                            ?>

                            <div class="form-group">

                                <div class="col-xs-12 col-md-4">
                                    <div class="tableproduct thumbnail ">

                                        <img src="img_products/<?php echo $row["image"]; ?>" alt="..." width="100%"><br>
                                        <center>
                                            <div class=" tableproduct1 caption">

                                                <h5>ชื่อ <?php echo $row["food_name"] . " " . $row["Description"]; ?><p></p>
                                                    <form action='inorder.php' method='post' name='form2' id='form2'>





                                                        <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#myModal<?php echo $row['food_id'] ?>">

                                                            วัตถุดิบ
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal<?= $row['food_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                                        <h4 class="modal-title" id="myModalLabel">วัตถุดิบที่ใช้</h4>
                                                                    </div>
                                                                    <div class="modal-body">
    <?php echo $row['raw_material']; ?>
                                                                    </div>
                                                                    <h4 class="modal-title" id="myModalLabel"><font color="blue">ประโยชน์วัตถุดิบที่ใช้</font></h4>
                                                                    <div class="modal-body">
    <?php echo $row['benefit']; ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p></p>


                                                        <input name="food_id" type="hidden" id="proid" value="<?php echo$row["food_id"] ?>" />

                                                        <input name="price" type="hidden" id="hiddenField2" value="<?php echo$row["price"] ?>" />
                                                        <input name="food_name" type="hidden" id='hiddenField3' value="<?php echo$row["food_name"] ?>" />

                                                        <!-- Large modal -->
                                                        <!-- Button trigger modal -->


    <!-- <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample<?php echo $row['food_id'] ?>" aria-expanded="false" aria-controls="collapseExample">
    วัตถุดิบ
    </a>

    <div class="collapse" id="collapseExample<?= $row['food_id'] ?>">
      <div class="well">
    <?php echo $row['raw_material'] ?>
      </div>
    </div> -->





                                                    </form>



    <?php // }   ?>
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
    </body>
</html>