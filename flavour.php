<?php
@SESSION_START();
include("conn.php");
$sql = "select*from flavour ";
$res = mysqli_query($conn, $sql);
$sql2 = "select*from user where username='$_SESSION[user]'";
$res2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($res2);
$_SESSION[user_id] = $row2[user_id];
?>
<html>
    <head>
        <title> Evaluation </title>
    </head>
    <body>
        <form method="post" action="Inflavour.php">

            <center><h3>แบบประเมินคุณภาพสินค้า <?php echo $_SESSION[fname] . $_SESSION[lname]; ?></h3></center>

           <table class="table table-striped table-condensed table-hover">
                <tr>
                    <th><center>แบบประเมินคุณภาพสินค้า</center></th>
                <th><center>ยอดเยี่ยม</center></th>
                <th><center>ดีมาก</center></th>
                <th><center>ดี</center></th>
                <th><center>พอใช้</center></th>
                <th><center>ปรับปรุง</center></th>
                </tr>

                <input type="hidden" name="user_id"value="<?php echo $_SESSION[user_id]; ?>">

                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $row[title] ?></td>
                        <?php $i++; ?>
                        <td><center><input type="radio"name="<?php echo$i ?>"value="5"></center></td>
                    <td><center><input type="radio"name="<?php echo$i ?>"value="4"></center></td>
                    <td><center><input type="radio"name="<?php echo$i ?>"value="3"></center></td>
                    <td><center><input type="radio"name="<?php echo$i ?>"value="2"></center></td>
                    <td><center><input type="radio"name="<?php echo$i ?>"value="1"></center></td>
                    </tr>

                <?php } ?>
            </table>

            <table class="table">
                <tr>
                    <td><center> <input class="btn btn-success" type="submit"value="ส่งคะแนน"></center></td>
                </tr>
            </table>


            <?php
            $a = $_GET[a];
            if ($a == 1) {
                echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
            }
            if ($a == 2) {
                echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
            }
            if ($a == 3) {
                echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
            }
            if ($a == 4) {
                echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
            }
            if ($a == 5) {
                echo"<center><h3>กรุณากรอกให้ครบทุกข้อ</h3></center>";
            }
            ?>
        </form>

    </body>
</html>