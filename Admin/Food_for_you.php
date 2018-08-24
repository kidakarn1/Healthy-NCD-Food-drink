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
    <?php
    @SESSION_START();
    if ($_SESSION['user'] == "") {
        header("location: index.php");
    } else {
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
            <body background='image/ui.jpg'>
                <?php
                @SESSION_START();
                include "menu.php";
                @SESSION_START();
                include("../conn.php");
                // $sql5 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
                //$res5 = mysqli_query($conn, $sql5);
                // $row5 = mysqli_num_rows($res5);
                $id = $_REQUEST['id'];
                $sql_dis = "select * from member where mem_id='{$id}'";
                $res_dis = mysqli_query($conn, $sql_dis);
                $row_nub1 = $row_dis = mysqli_fetch_array($res_dis);
                ?>


                <div class='container'>
                    <div class=" panel panel-primary">

                        <div class="panel-heading"><center><h3><b>อาหารสำหรับคุณ<?php echo " " . $row_dis['fname'] . " " . $row_dis['lname']; ?></b></h3></center>
                            <div class="row">
                                <div class="col-md-offset-1 col-xs-8 col-md-3">

                                </div>

                                <div class="col-md-offset-9 col-md-4 ">
                                    <form method="post" action="Search.php">
                                        <font color="black">
                                        <input type="text" name="search" placeholder="ค้นหาข้อมูลสินค้า">
                                        </font>
                                        <button type="submit" class="btn btn-sm btn-warning ">ค้นหา</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="three panel-body">
                            <?php
                            /* เนื่องจาก'$_SESSION[disease]เป็นค่าว่าง จึงเลยต้องดึงข้อมูลมาใหม่ */

                            $disease = $row_dis['disease'];
                            $data = (explode(",", $disease));
                            $new_str = implode("','", $data);

                            $sql_name = "select * from disease where dis_id='1'";
                            $res_name = mysqli_query($conn, $sql_name);
                            $row_name = mysqli_fetch_array($res_name);
                            $day_mon = "วัน";
                            $data = array('Monday' => 'จันทร์', 'Tuesday' => 'อังคาร', 'Wednesday' => 'พุธ', 'Thursday' => 'พฤหัสบดี', 'Friday' => 'ศุกร์', 'Saturday' => 'เสาร์', 'Sunday' => 'อาทิตย์');
                            // $tdata = implode("''",$data);
                            // print_r($data) ;
                            date_default_timezone_set("asia/bangkok");
                            $datee = $date1 = $row_dis['register_date'];
                            // date("y-m-d");
                            $day = explode("-", $date1);
                            // die(print_r($day));
                            $jd = cal_to_jd(CAL_GREGORIAN, $day[1], $day[2], $day[0]); //2011-01-29
                            $daypangubun = (jddayofweek($jd, 1));
                            $checkday = (jddayofweek($jd, 1));
                            // print_r($checkday);
                            // print_r($daypangubun);
                            // exit();
                            $k = 0;
                            $sql = "select * from member,food where member.mem_id='{$id}'
                    and food.cat_id='1' and food.dis_id in ('$new_str')";
                            $res = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
                            $food = array('มื้อเช้า', 'มื้อกลางวัน', 'มื้อเย็น');
                            $time = array('08.00', '12.00', '17.00');



                            // print_r($row);
                            // $data= array(array($row['food_id'],$row['food_name'],$row['raw_material'],$row['dis_id'],
                            //     $row['cat_id'],$row['image'],$row['mem_id'],$row['mem_fname'],$row['mem_lname']));
                            // print_r ($jb);
// echo $new_str;
                            // $dis_id=explode($_SESSION[dis_id]);
                            //     print_r($dis_id);
                            // if ($new_str==1){
                            //     echo "อาหารโรคหัวใจ";
                            // }
                            // if($new_str==2){
                            //     echo "อาหารโรคเบาหวาน";
                            // }
                            ?>
                            <!-- ห้ามลบนะ ถ้าลบอันแรกจะซื้อไม่ได้ #ตึ๋ง--> <form action="" method="post" class="search-wrapper cf">
                            </form>
                            <?php
                            $datet = 0;
                            for ($i = 1; $i <= 7; $i++) {
                                ?>
                                <?php
                                echo $datedate1 = date("d-m-Y", strtotime("+$datet day", strtotime($date1)));
                                $datet++;
                                echo "<div class='panel panel-success col-xs-12'>";
                                //echo $daypangubun; //วันภาษาอังกฤษ
                                echo $day_mon . $data[$daypangubun]; //แสดงวัน
                                //  if ($daypangubun==$){
                                //     echo $day_mon.$data[0];
                                //  }
                                //  if ($daypangubun=="Tuesday"){
                                //     echo $day_mon.$data[1];
                                //  }
                                //  if ($daypangubun=="Wednesday"){
                                //     echo $day_mon.$data[2];
                                //  }
                                //   if ($daypangubun=="Thursday"){
                                //     echo $day_mon.$data[3];
                                //  }
                                //   if ($daypangubun=="Friday"){
                                //     echo $day_mon.$data[4];
                                //  }
                                //   if ($daypangubun=="Saturday"){
                                //     echo $day_mon.$data[5];
                                //  }
                                // if ($daypangubun=="Sunday"){
                                //     echo $day_mon.$data[6];
                                //  }
                                echo "</div>";
                                ?>

                                <?php
                                for ($j = 0; $j <= 2; $j++) {

                                    // print_r($food);

                                    if (!isset($row[$k])) {
                                        # code...
                                        $k = 0;
                                    }
                                    ?>

                                    <div class="form-group">

                                        <div class="col-xs-10 col-xs-offset-1 col-md-3"><label>
                                                <?php echo $food[$j] . " " . $time[$j]; ?>
                                            </label>
                                            <div class="tableproduct thumbnail ">

                                                <img src="../img_products/<?php echo $row[$k]["image"]; ?>" alt="..." width="100%"><br>
                                                <center>
                                                    <div class=" tableproduct1 caption">

                                                        <h5>ชื่อ <?php echo $row[$k]["food_name"] . " " . $row[$k]["Description"]; ?></h5>
                                                        <form action='inorder.php' method='post' name='form2' id='form2'>






                                                            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#myModal<?php echo $row[$k]['food_id'] ?>">

                                                                วัตถุดิบ
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="myModal<?= $row[$k]['food_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                                            <h4 class="modal-title" id="myModalLabel">วัตถุดิบที่ใช้</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php echo $row[$k]['raw_material']; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <input name="food_id" type="hidden" id="proid" value="<?php echo$row["food_id"] ?>" />

                                                            <input name="price" type="hidden" id="hiddenField2" value="<?php echo$row["price"] ?>" />
                                                            <input name="food_name" type="hidden" id='hiddenField3' value="<?php echo$row["food_name"] ?>" />
                                                            <?php echo $row['raw_material'] ?>
                                                            <!-- Large modal -->
                                                            <!-- Button trigger modal -->


                                                                                                                                <!-- <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample<?php echo $row['food_id'] ?>" aria-expanded="false" aria-controls="collapseExample">
                                                                                                                                วัตถุดิบ
                                                                                                                                </a>

                                                                                                                                <div class="collapse" id="collapseExample<?= $row['food_id'] ?>">
                                                                                                                                  <div class="well">
                                                                                                            
                                                                                                                                  </div>
                                                                                                                                </div> -->
                                                        </form>
                                                        <?php // }   ?>
                                                    </div>
                                                </center>
                                            </div>

                                        </div>          
                                    </div>
                                    <?php
                                    // if ($day<=7){
                                    // $day=$day[2]+1;
                                    // }date_default_timezone_set('Asia/Bangkok');
                                    $date_time = date("y-m-d h:i:s");
                                    $sql_checkmem = "select * from order_ncd";
                                    $res_checkmem = mysqli_query($conn, $sql_checkmem);
                                    $row_checkmem = mysqli_fetch_assoc($res_checkmem);
                                    $sql_num = "select * from order_ncd";
                                    $res_num = mysqli_query($conn, $sql_num);
                                    $row_num = mysqli_num_rows($res_num);
                                    $nubnaja = ($row_num * 2) + 1;
                                    $nub_1 = $row_num + 1;
                                    $sql_name1 = "select * from order_ncd";
                                    $res_name1 = mysqli_query($conn, $sql_name1);
                                    $row_name1 = mysqli_fetch_assoc($res_name1);
                                    $row_memid = $row_name1['mem_id'];
                                    $bol = false;
                                    $jd = cal_to_jd(CAL_GREGORIAN, $day[1], $day[2] + $i, $day[0]); //2011-01-29
                                    $daypangubun = (jddayofweek($jd, 1));
                                    // print_r($daypangubun);
                                    $food_id = $row[$k]['food_id'];
                                    if
                                    ($_SESSION['user'] != $row_checkmem['mem_id']) {
                                        $order_id = $row_num + 1;
                                    }
                                    //$sql_select="select *from  food_status where mem_id='{$_SESSION['mem_id']}' and 	status='1'";
                                    // $res_select=mysqli_query($conn,$sql_select);
                                    // $row_select=mysqli_num_rows($res_select);
                                    // echo $row_select;
                                    // if ($row_select<=0){
                                    // $sql_insert="insert into order_ncd values(
                                    // '$food_id',
                                    // '$order_id',
                                    // 'คลอส',
                                    // 'โอนแล้ว',
                                    // '$_SESSION[mem_id]',
                                    // '$date_time',
                                    // 'กำลังจัดส่ง',
                                    // '1')";
                                    // if ($res_insert=mysqli_query($conn,$sql_insert)){  
                                    // $bol = true;
                                    // }
                                    // }
                                    // 
                                    // echo $row_num." ".$row_name1['mem_id']." ".$_SESSION['mem_id']."   "." ".$nubnaja;
                                    //       if($row_num<$nubnaja){
                                    //       	if ($row_checkmem['check_food']!=1)
                                    //  $sql_insert="insert into order_ncd values(
                                    // '$food_id',
                                    // '$order_id',
                                    // 'คลอส',
                                    // 'โอนแล้ว',
                                    // '$_SESSION[mem_id]',
                                    // '$date_time',
                                    // 'กำลังจัดส่ง',
                                    // '0')";
                                    //                    if ($res_insert=mysqli_query($conn,$sql_insert)){  
                                    //              }
                                    //          }
                                    $k++;
                                }
                            }
                            echo "<p>" . "</p>";
                            ?>         
                        </div>

                        <?php include("footer_admin.php"); ?></div>
                </div>
            </div>
        <?php } ?>
    <?php } // ปิด else?>
</body>
</html>