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
    <body background='image/ui.jpg'>
        
		<?php 
		include ("../conn.php");
		include ("menu.php");
		
		?>


        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h4>เว็บบอร์ด</h4></center></div>
                    <div class="three panel-body">

                        <br>



                        <br>

                        <?PHP
                        @SESSION_START();
                        ?>
                        <?php
                       
                        $sql = "select * from web_board order by web_id asc";
                        $res = mysqli_query($conn, $sql);
                        ?>
                        
                                   <?php
function getName($id){
	global $conn;
	$sql="select * from member where mem_id='$id'";
	//echo $sql;
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
	return $row[fname];
}
?>
                        
                            
                                    
        <table class="table table-striped table-condensed table-hover">
         
                <tr>

  <td class=" danger">ลำดับ</td>
   <td class="danger">ชื่อหัวข้อ</td>
     <td class="danger">ผู้ตั้งคำถาม</td>
  <td class="danger">เวลาที่โพส</td>
  <?php if ($_SESSION[status]=="Admin"){?><td class="danger">ลบ</td>
  <?php } ?>
</tr>
                        <?php while ($row = mysqli_fetch_array($res)) {
                            ?>
<tr>

  <td class=" success"><?php echo$row['web_id'];?></td>
  <td class="success"><a href="Answer_webboard.php?id=<?php echo $row['web_id'];?>"><?php echo $row['web_title'];?></a></td>
     <td class="success"><?php echo getName($row['mem_id']);?></td>
  <td class="success"><?php echo$row['board_date'];?></td>
   <?php if ($_SESSION[status]=="Admin"){?><td class="success"><a href="deltitleadmin.php?id=<?php echo $row[web_id];?>">ลบ</td><?php }?>

</tr>
                            
                        <?php }
                        ?>         
                  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
</table>

                    </div>
                </div>


                <?php include("../footer.php") ?>
            </div>
        </div>     

          <script src="js/jquery-1.11.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
                    <?php } ?>
    </body>
</html>


