<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
 <?php include"conn.php"; 
		
		$sql="select * from promotion ";
		$res=mysqli_query($conn,$sql);
	?>
        <div class="modal fade" id="promotion" tabindex="-1" role="dialog" aria-labelledby="promotion">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="promotion">โปรโมชั่น</h4>
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="login.php">
        <?php while ($row=mysqli_fetch_array($res)){ ?>
                        
						<div class="form-group">
                            <label for="Username" class="col-sm-2 control-label"><?php echo $row['promotion_id'];?></label>
                            <div class="col-xs-12 col-sm-8">
                               <label for="description" class="col-md-8 col-sm-2 "><img src="promotion/<?php echo $row['image'];?>" width="30%"></label>

                            <div class="col-xs-12 col-sm-8">
                               <label for="description" class="col-md-8 col-sm-2 "><?php echo $row['description'];?></label>

                               <label for="promotion_dateon" class="col-md-8 col-sm-2 ">เริ่มใช้:<font color="blue"><?php echo $row['promotion_dateon'];?></font></label>

                                <label for="promotion_dateon" class="col-md-8 col-sm-2 ">หมดอายุ:<font color="red"><?php echo $row['promotion_Dateoff'];?></font></label> 
                                </div>
                            </div>
                        </div>
                             <?php }?>
                        
                        
                </div>
            </div>
        </div>
    </body>
</html>