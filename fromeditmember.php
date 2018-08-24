<html>
<head>
<?php
 @SESSION_START();
 include("conn.php");
 ?>
<!--<script language="javascript" src="jquery-3.1.1.min.js"></script>-->  
<script type="text/javascript">  
$(function(){  
     $("p#spusername").hide();
	 $("p#sppassword").hide();
	 $("p#spphone").hide();
	 $("p#spaddress").hide();
	 $("p#spsex").hide();
	 $("p#spname").hide();
	 $("p#spsurname").hide();

	$("#name").focusout(function(){ 
           var $min_lengthna=$(this).val().length;   
            if($min_lengthna==''){ 
                $("p#spname").show();
			} 
			else if($min_lengthna!='') {$("p#spname").hide();		
			}                	
    });

	$("#surname").focusout(function(){ 
           var $min_lengthsu=$(this).val().length;   
            if($min_lengthsu==''){ 
                $("p#spsurname").show();
			} 
			else if($min_lengthsu!='') {$("p#spsurname").hide();
			}                   
    });

	$("#phone").focusout(function(){ 
           var $min_lengthph=$(this).val().length;
            if($min_lengthph<10){  
                $("p#spphone").show();
			} 
			else if($min_lengthph>=10){$("p#spphone").hide();		
			}
    });  

	$("#address").focusout(function(){ 
           var $min_lengthad=$(this).val().length;   
            if($min_lengthad==0){  		
                $("p#spaddress").show();
			} 
			else if($min_lengthad>0) {$("p#spaddress").hide();	
			}                          
    });  


$("#formre").focusout(function(){ 	

 if ($("#address").val().length!=0 && $("#phone").val().length>=10 && $("#surname").val().length!='' && $("#name").val().length!=''){
 $("#insertmember").removeAttr("disabled");
 }
 else {
 $("#insertmember").attr("disabled","disabled");
 }

});
	
});  
</script>  


<!DOCTYPE html>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
        
<title>ยินดีต้อนรับสู่ Dinnershop  </title>
    <body>
        <?php 
@SESSION_START();
if ($_SESSION[user]!=""){
	?>
	<?php
include "conn.php";

        $sql="select*from user,member where user.username='$_SESSION[user]'
        and member.mem_id=user.user_id";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res);
        ?>

        <div class="modal fade" id="fromeditmember" tabindex="-1" role="dialog" aria-labelledby="fromeditmember">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="fromeditmember">กรอกข้อมูลส่วนตัว</h4>
                    </div>
                    <br>
		  <form class="form-horizontal"action="pcEditmember.php" method="post"enctype="multipart/form-data"id="formre">		
                                          <input type="hidden"  name="id" value="<?php echo $row['mem_id'] ?>">
    
                       <div class="form-group">
                            <div class="form-group">
                                <center> <img src="dwp/<?php echo $_SESSION[imagemember]=$row[image];?>"width="10%"></center>        
                            </div>   
                              <div class=" col-md-offset-4 col-md-3">
                                  <center><input type="file" name="file" id="file" /></center>           
                            </div>  
                      
                        </div>
                       
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 control-label">ชื่อ:<font color="#ff0000">*</font></label>
                            <div class="col-md-3">
                                <input type="text" class="form-control"  name="fname" value="<?php echo $row[fname];?>"maxlength="250"id="name">
                                <p id="spname"><font color="#ff0000">**กรุณากรอกชื่อ**</font></p>
                            </div>
                         
                            <label for="lname" class="col-sm-2 control-label">นามสกุล:<font color="#ff0000">*</font></label>
                            <div class="col-sm-8 col-md-3">
                                <input type="text" class="form-control" id="surname" name="lname" value="<?php echo $row[lname];?>"maxlength="250"id="surname">
                                <p id="spsurname"><font color="#ff0000">**กรุณากรอกนามสกุล**</font></p>
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
                            <label for="phone" class="col-sm-2 control-label">เบอร์โทร<font color="#ff0000">*</font></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="phone" value="<?php echo $row[telephone];?>"onKeyUp="if(this.value*1!=this.value) {this.value='' ;alert('กรุณากรอกตัวเลข'); }"id="phone"maxlength="10" placeholder="0900000000"><font color="#cc0000"></font>
<p id="spphone"><font color="#ff0000">**กรุณากรอกเบอร์โทร10หลัก**</font></p>
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
                                <input type="text" class="form-control" id="line" name="line"value="<?php echo $row[line_id];?>"maxlength="250">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="facebook" class="col-sm-2 control-label">เฟสบุ๊ค</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pass" name="facebook"value="<?php echo $row[facebook];?>"maxlength="250">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">ที่อยู่:<font color="#ff0000">*</font></label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="address" name="address"maxlength="1000">
                                    <?php echo $_SESSION[address]=$row[address];?></textarea><p id="spaddress"><font color="#ff0000">**กรุณากรอกที่อยู่**</font></p>
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
                            
                               <input class="btn btn-success" type="submit" value="แก้ไข"id="insertmember"disabled="disabled">
                            <button type="Reset" class="btn btn-danger">ยกเลิก</button>
                        
                        </div>
 
<br>        
	</form>

                </div>
            </div>
        </div>
<?php } ?>
    </body>
</html>