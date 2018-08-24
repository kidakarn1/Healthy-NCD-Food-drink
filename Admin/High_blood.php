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
            <title></title>
            <style type="text/css">
                .panel-heading {
                    background-color: #0066ff;
                    color: #ffffff;
                    margin-bottom: -1%;
                }
            </style>
        </head>
        <body bgcolor="#33ff66">
            <?php
            @SESSION_START();
            include("../conn.php");
            include('menu.php');
            $sql1 = "select* from knowledge,image_kno where knowledge.kno_id='4' and knowledge.kno_id=image_kno.kno_id";
            $res1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_array($res1);

            $sql2 = "select* from image_kno where img_id='10' and kno_id='4'";
            $res2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_array($res2);

            $sql3 = "select* from image_kno where img_id='11' and kno_id='4'";
            $res3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_array($res3);

            $sql4 = "select* from image_kno where img_id='12' and kno_id='4'";
            $res4 = mysqli_query($conn, $sql4);
            $row4 = mysqli_fetch_array($res4);
            ?>
            <div class='container'>

                <div class="panel-heading"><center><h2><b>เคล็ดลับความรู้</b></h2></center></div>
                <div class=" panel panel-primary">

                    <div class="three panel-body">
                        <form class="form-horizontal" method="post" action="edit_disease.php?id=<?php echo '4' ?>">

                            <center>
                                <div class="form-group">
                                    <font style="color: black;" size="5"><b><?php echo $row1['kno_name']; ?></b></font>
                                    <input type="hidden" name="kno_name"value="<?php echo $row1['kno_name']; ?>">
                                </div>

                                <div class="form-group">
                                    <img src="../tip_dis/<?php echo $row1['image'] ?>" width="1050">
                                    <input type="hidden" name="image"value="<?php echo $row1['image']; ?>" >
                                </div>
                            </center>

                            <div class="form-group">
                                <textarea class='form-control' rows='10' name="explanation1" value="<?php echo trim($row1['explanation']); ?>" >
                                    <?php echo trim($row1['explanation']); ?>
                                </textarea>
                            </div>
                            <div class="form-group">

                                <div class="col-md-offset-1 col-md-5">
                                    <img src="../tip_dis/<?php echo $row2['img_name'] ?>"width="425" height="400">
                                    <input type="hidden" name="img_name13"value="<?php echo $row2['img_name']; ?>" >

                                </div>

                                <div class="col-md-5">
                                    <img src="../tip_dis/<?php echo $row3['img_name'] ?>" width="425"  height="400">
                                    <input type="hidden" name="img_name14"value="<?php echo $row3['img_name']; ?>" >

                                </div>

                            </div>

                            <div class="form-group ">

                                <div class="col-md-offset-1 col-md-5">
                                    <textarea class=' form-control' rows='20' name="explanation2" value="<?php echo trim($row2['explanation_im']) ?>">
                                        <?php echo trim($row2['explanation_im']); ?>
                                    </textarea>            
                                </div>


                                <div class=" col-md-5">
                                    <textarea class='form-control' rows='20' name="explanation3" value="<?php echo trim($row3['explanation_im']) ?>">
                                        <?php echo trim($row3['explanation_im']); ?>
                                    </textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class=" col-md-12">
                                    <center>
                                        <img src="../tip_dis/<?php echo $row4['img_name'] ?>" width="700">
                                    </center>
                                    <input type="hidden" name="img_name15"value="<?php echo $row4['img_name']; ?>">

                                </div>
                            </div>

                            <div class="form-group">

                                <textarea class='form-control' rows='20' name="explanation4" value="<?php echo trim($row4['explanation_im']) ?>">
                                    <?php echo trim($row4['explanation_im']); ?>
                                </textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-6">
                                    <input type="submit" class="btn btn-success" value="แก้ไข">
                                </div>
                            </div>

                        </form>
                    </div>
                    <?php include("footer_admin.php"); ?>
                </div>
            </div>
        <?php } ?>
    </body>
</html>

