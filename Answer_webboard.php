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
    <body background='image/ui.jpg'>
        <?php
        include "menu.php";
        date_default_timezone_set("asia/bangkok");
        $datetime = date("d-m-y / h:i");
        ?>

        <?php
        $idbord = $_GET[id];
        $sql1 = "select*from web_board where web_id='$idbord'";
        $res1 = mysqli_query($conn, $sql1);
        ?>
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h4>บรรยากาศในร้าน</h4></center></div>
                    <div class="three panel-body">

                        <br>

                        <?php if($_SESSION['user']==""){?>
                                    <button type="button" class="btn btn-sm btn-success glyphicon 
                                            glyphicon" data-toggle="modal" data-target="#myModal">เพิ่มกระทู้</button>
                                    <?php }?>
                                <?php if($_SESSION['user']!=""){?>
                                    <button type="button" class="btn btn-sm btn-success glyphicon 
                                            glyphicon" data-toggle="modal" data-target="#AddThread">เพิ่มกระทู้</button>
<?php include "Add_Thread.php";?>                                  
  <?php }?>

                        <br>


<?php while ($row1 = mysqli_fetch_array($res1)) { ?>
                            <div class="form-group">

                                <div class="col-md-offset-1  col-xs-12 col-sm-12 col-md-10">
                                    <div class="tableproduct thumbnail ">
                                        <font color="red"> หัวข้อกระทู้:</font> <?php echo $row1['web_title']; ?>

                                        <br>
                                        ราบละเอียด: <?php echo $row1[board_Description]; ?>



                                    </div>

                                </div>          
                            </div>

                        <?php } ?>
                        <?php
                        ///=======แสดงคำตอบ===============================
                        $sql2 = "select*from web_answer where web_id='$id'";
//echo $sql2;
                        $res2 = mysqli_query($conn, $sql2);
                        $i = 0;


//echo $sql2;
                        while ($row2 = mysqli_fetch_array($res2)) {
                            $i++;
                            ?>  
                            <div class="form-group">

                                <div class="col-md-offset-1  col-xs-12 col-sm-12 col-md-10">
                                    <div class="tableproduct thumbnail ">
                                        <font color="red"> ความคิดเห็นที่:</font> <?php echo $i; ?>ผู้ตั้งคำถาม:<?php echo $row2[mem_id]; ?>เวลาที่โพส:<input type="hidden" name="date_time"value="<?php echo $datetime; ?>"><?php echo $datetime; ?><br>
                                        รายละเอียด :  <?php echo $row2[board_description]; ?><br>
                                        <a href="deletewebbord1.php?id=<?php echo $row2[ask_id]; ?> &qid=<?php echo $id; ?>"><font color="#000000">ลบ</font></a>
                                    </div>

                                </div>          
                            </div>
<?php } ?>

<form method="post" action="insertanswer.php">

     <div class="form-group">
<div class="col-md-offset-1  col-xs-12 col-sm-12 col-md-10">
      ร่วมแสดงความคิดเห็น
</div>
      <form method="post" action="insertanswer.php">

     <div class="form-group">
<div class="col-md-offset-1  col-xs-12 col-sm-12 col-md-11">
     	<textarea name="board_description"></textarea>
</div>     
     </div>
	<input type="hidden" name="board_answer" value="<?php echo $id ?>">
        <input type="hidden" name="board_name" value="<?php echo $name ?>">
        <input type="hidden" name="id" value="<?php echo $id ?>">    
<?php
	//ห้ามลบ เป็นการประกาศSESSION
	$_SESSION[web_id]=$id;?>
             <div class="form-group">
<div class="col-md-offset-1  col-xs-12 col-sm-12 col-md-10">
    <input class="btn btn-primary" name="Submit" type="submit" color="#330000"value="ตกลง" />
         <input  class="btn btn-danger" type="Reset" color="#330000"value="ยกเลิก" />
</div>
     </div>
         


</form>
                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    </div>
                </div>


                <script src="js/jquery-1.11.2.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="js/bootstrap.min.js"></script>
                </div>
                
<?php include("footer.php") ?>
            
        </div>
              </div>
          
    </body>
</html>