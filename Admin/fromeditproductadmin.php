<?php
@SESSION_START();
include("../conn.php");
if ($_SESSION[user] == "" or $_SESSION[status] != "Admin") {
    header("location: ../index.php");
}
?>
<?php
if ($_SESSION[user] != ""and $_SESSION[status] == "Admin") {
    ?>
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
            <style type="text/css">



            </style>
        </head>
        <body>  

            <?php
            @SESSION_START();
            include("../conn.php");
            include("menu.php");
            ?>



            <?
            $id=$_GET[id];
            $sql="select*from food where food_id='$id' ";

            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($res);
            $_SESSION[imageproduct]=$row[image];
            $sql_cat="select * from disease";
            $res_cat=mysqli_query($conn,$sql_cat);
            $sql_cat1="select * from category_foods";
            $res_cat1=mysqli_query($conn,$sql_cat1);
            $data=array();
            $data1=array();
            ?>
            <div class="container">
                <div class=" panel panel-primary">
                    <div class="panel-heading">

                        <center>

                            <h2>แก้ไขสินค้า</h2>

                        </center>
                    </div>
                     <form class="form-horizontal" action="pcEditproduct.php" method="post"
                          enctype="multipart/form-data">


                        <center>
                            <h4>
                                <label>รหัสสินค้า:<?php echo $row['food_id'] ?></label>
                                <input type="hidden" name="food_id" value="<?php echo $row['food_id'] ?>">
                            </h4>
                        </center>



                        <div class="form-group">


                            <label class="col-md-2 control-label">ชื่อสินค้า:</label>
                            <div class="col-md-3">
                                <input class="form-control" type="text" name="food_name" value="<?php echo $row['food_name'] ?>">
                            </div>

                            <label class="col-md-2 control-label">รูปภาพ :</label>

                            <div class="col-md-3 ">
                                <img src="../img_products/<?php echo $row["image"] ?>" width="40%"  />
                                <input class=" control-label " type="file" name="file" id="file" />

                            </div>

                        </div>







                        <div class="form-group">
                            <label class="col-md-2 control-label">ประเภทของโรค</label>
                            <div class="col-md-3">
                                <table>
                                    <?php
                                    while ($row_cat = mysqli_fetch_array($res_cat)) {
                                        array_push($data, $row_cat['dis_id']);
                                        ?>
                                        <tr>
                                            <td class="radio-inline">
                                                <input type="radio" name="disease" value="<?= $row_cat['dis_id'] ?>"<?php
                                                if ($row_cat['dis_id'] === $row['dis_id']) {
                                                    echo "checked";
                                                }
                                                ?>>
                                                       <?php echo $row_cat['dis_name']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    } //var_dump($data); exit();
                                    ?>   

                                </table>

                            </div>

                            <label class="col-md-2 control-label" for="file">ประเภทของอาหาร:</label>
                            <div class="col-md-3">
                                <table>
                                    <?php
                                    while ($row_cat1 = mysqli_fetch_array($res_cat1)) {
                                        array_push($data1, $row_cat1['cat_id']);
                                        ?>
                                        <tr>
                                            <td class="radio-inline">
                                                <input type="radio" name="category" value="<?php echo $row_cat1['cat_id']; ?>"<?php
                                                if ($row_cat1['cat_id'] === $row['cat_id']) {
                                                    echo "checked";
                                                }
                                                ?>>
                                                       <?php echo $row_cat1['cat_name']; ?>
                                            </td>
                                        </tr>
                                    <?php } //var_dump($data); exit();  ?>   

                                </table>
                            </div>
                        </div>
                        <div class="form-group">


                            <label class="col-md-2 control-label">วัตถุดิบ:</label>
                            <div class="col-md-3">
                                <textarea class="form-control" type="text" name="raw_material" value="<?php echo $row['raw_material'] ?>"><?php echo $row['raw_material'] ?></textarea>

                            </div>

                            <label class="col-md-2 control-label">ประโยชน์ของวัตถุดิบ:</label>
                            <div class="col-md-3">
                                <textarea class="form-control" type="text" name="benefit" value="<?php echo $row['benefit'] ?>"><?php echo $row['benefit'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">


                            <label class="col-md-2 control-label">ราคา:</label>
                            <div class="col-md-2">
                                <input class="form-control" type="text" name="price" value="<?php echo $row['price'] ?>">
                            </div>
                        </div>

                        <center>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="บันทึกข้อมูล">
                                <input class="btn btn-warning" type="reset" value="ยกเลิก">

                                <a href="delproductadmin.php?id=<?php echo $row['food_id']; ?>" class="btn btn-danger" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');">ลบ</a>
                            </div>
                        </center>             
                    </form>
                </div>
                <?php include("footer_admin.php"); ?>
            </div>
        </div>
    <?php } ?>
</body>
</html>
