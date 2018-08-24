<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
        include"../conn.php";
        $sql = "select*from user,member where user.username='$_SESSION[user]'
        and member.mem_id=user.user_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
        date_default_timezone_set("asia/bangkok");
        $datetime = date("d/m/y");
        $sql_dis="select * from disease";
        $res_dis=mysqli_query($conn,$sql_dis);
        $sql_cat="select * from category_foods";
        $res_cat=mysqli_query($conn,$sql_cat);
        $data=array();
        $data1=array();
        ?>

        <div class="modal fade" id="insertproductadmin" tabindex="-1" role="dialog" aria-labelledby="insertproductadmin">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="insertproductadmin">เพิ่มข้อมูลสินค้า</h4>
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="pcaddproduct.php"enctype="multipart/form-data"id="formre">
                        <input type="hidden" name="id_product">
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 control-label">ชื่อสินค้า:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="fname" name="name" placeholder="nameproduct">
                            </div>
                        </div>
              <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">รูปภาพ:</label>
                            <div class="col-sm-8">
                               <label for="file">เลือกรูปสินค้า</label>
                                <input type="file" name="file" id="file" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_disease" class="col-sm-2 control-label">ประเภทโรค:</label>
                            <div class="col-sm-8">
                             <?php while($row_dis=mysqli_fetch_array($res_dis)){
                                 array_push($data,$row_dis);?>

                             <input type="radio" name="disease" value="<?php echo $row_dis['dis_id'];?>">
                             <?php echo $row_dis['dis_name'];?><br>
                             <?php }?>
                            </div>
                        </div>
     <div class="form-group">
                            <label for="id_category_foods" class="col-sm-2 control-label">ประเภทอาหาร:</label>
                            <div class="col-sm-8">
   <?php while($row_cat=mysqli_fetch_array($res_cat)){
                                 array_push($data1,$row_cat);?>
                             <input type="radio" name="category_foods" value="<?php echo $row_cat['cat_id'];?>">
                             <?php echo $row_cat['cat_name'];?><br>
                             <?php }?>
                            </div>
                          </div>
 
   <div class="form-group">
                            <label for="fname" class="col-sm-2 control-label">ราคา:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="price" name="price" placeholder="price">
                            </div>
                        </div>
 


                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">วัตถุดิบ:</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="pass" name="raw_material" placeholder="raw_material"></textarea>
                            </div>
                        </div>

                           <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">ประโยชน์วัตถุดิบ:</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="benefit" name="benefit" placeholder="benefit"></textarea>
                            </div>
                        </div>

                        <!--                        <div class="form-group">
                                                    <label for="pass" class="col-sm-2 control-label">รูป</label>
                                                    <div class="col-sm-8">
                                                        <input type="password" class="form-control" id="pass" name="pass"placeholder="Photo">
                                                    </div>
                                                </div>-->
          


                        <div class="modal-footer">

                            <input class="btn btn-primary" type="submit" value="บันทึก" >
                            <button type="Reset" class="btn btn-danger">ยกเลิก</button>

                        </div></form>
                </div>
            </div>
        </div>
    </body>

</html>