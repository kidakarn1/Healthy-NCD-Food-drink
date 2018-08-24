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
        <?php include"../conn.php"; 
        $sql="select*from user,member where user.username='$_SESSION[user]'
        and member.mem_id=user.user_id";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        ?>

        <div class="modal fade" id="fromeditstaff" tabindex="-1" role="dialog" aria-labelledby="fromeditstaff">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="fromeditstaff">แก้ไขข้อมูลพนักงาน</h4>
                    </div>
                    <br>
                    <form class="form-horizontal" method="post" action="pcEditmember.php">
                        <input type="hidden"  name="id" value="<?php echo $row['mem_id'] ?>">
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 control-label">ชื่อ:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="name"value="<?php echo $row['fname'] ?>">
                            </div>
                            
                            <label for="lname" class="col-sm-2 control-label">นามสกุล:</label>
                            <div class="col-sm-8 col-md-3">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="lname"value="<?php echo $row['lname'] ?>">
                            </div>
                            
                        </div>
                        
                            <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">ชื่อผู้ใช้:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="username"value="<?php echo $row['username'] ?>">
                            </div>
                              <div class="col-md-3">
                                  <a href="changpass.php?id=<?php echo $row[mem_id];?>"class="btn btn-success">เปลี่ยนรหัสผ่าน</a>
                              </div>
                         
                            
                        </div>
                        
                        
                        
                        
                        
                        
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">เบอร์โทร</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone" placeholder="Phone"value="<?php echo $row['telephone'] ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="sex" class="col-sm-2 control-label">เพศ</label>
                            <div class="col-sm-8">
                                <input type="radio"name="sex"value="ชาย"<?php if($row[sex]=="ชาย") echo "checked";?>>ชาย
                                <input  type="radio"name="sex"value="หญิง"<?php if($row[sex]=="หญิง") echo "checked";?>>หญิง
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="line" class="col-sm-2 control-label">ไลน์</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pass" name="line"placeholder="Line"value="<?php echo $row['line_id'] ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="facebook" class="col-sm-2 control-label">เฟสบุ๊ค</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pass" name="facebook"placeholder="Facebook"value="<?php echo $row['facebook'] ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">ที่อยู่</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="pass" name="address"placeholder="Address"><?php echo $row['address'] ?></textarea>
                            </div>
                        </div>
                        
<!--                        <div class="form-group">
                            <label for="pass" class="col-sm-2 control-label">รูป</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="pass" name="pass"placeholder="Photo">
                            </div>
                        </div>-->
                        
                        <div class="form-group">
                            <label for="brithday" class="col-sm-2 control-label">วันเกิด</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="pass" name="brithday"placeholder="Birthday"value="<?php echo $row['brithday'] ?>">
                            </div>
                        </div>

                        



                        <div class="modal-footer">
                            
                               <input class="btn btn-success" type="submit" value="แก้ไข" >
                            <button type="Reset" class="btn btn-danger">ยกเลิก</button>
                            
                        </div></form>
                </div>
            </div>
        </div>
    </body>

</html>