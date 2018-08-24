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
		<SCRIPT LANGUAGE="JavaScript">
<!--
r = new Array(2)
function setStartState(){
state="start"
r[0] = "0"
r[1] = "0"
operand=""
ix=0
}
function addDigit(n){
if(state=="gettingInteger" || state=="gettingFloat")
r[ix]=appendDigit(r[ix],n)
else{
r[ix]=""+n
state="gettingInteger"
}
display(r[ix])
}
function appendDigit(n1,n2){
if(n1=="0") return ""+n2
var s=""
s+=n1
s+=n2
return s
}
function display(s){
document.calculator.total.value=s
}
function addDecimalPoint(){
if(state!="gettingFloat"){ 
decimal=true
r[ix]+="."
if(state=="haveOperand" || state=="getOperand2") r[ix]="0."
state="gettingFloat"
display(r[ix])
}
}
function clearDisplay(){
setStartState()
display(r[0])
}
function changeSign(){
if(r[ix].charAt(0)=="-") r[ix]=r[ix].substring(1,r[ix].length)
else if(parseFloat(r[ix])!=0) r[ix]="-"+r[ix]
display(r[ix])
}
function calc(){
if(state=="gettingInteger" || state=="gettingFloat" ||
state=="haveOperand"){
if(ix==1){
r[0]=calculateOperation(operand,r[0],r[1])
ix=0
}
}else if(state=="getOperand2"){
r[0]=calculateOperation(operand,r[0],r[0])
ix=0
}
state="haveOperand"
decimal=false
display(r[ix])
}
function calculateOperation(op,x,y){
var result=""
if(op=="+"){
result=""+(parseFloat(x)+parseFloat(y))
}else if(op=="-"){
result=""+(parseFloat(x)-parseFloat(y))
}else if(op=="*"){
result=""+(parseFloat(x)*parseFloat(y))
}else if(op=="/"){
if(parseFloat(y)==0){
alert("Division by 0 not allowed.")
result=0
}else result=""+(parseFloat(x)/parseFloat(y))
}
return result
}
function performOp(op){
if(state=="start"){
++ix
operand=op
}else if(state=="gettingInteger" || state=="gettingFloat" ||
state=="haveOperand"){
if(ix==0){
++ix
operand=op
}else{
r[0]=calculateOperation(operand,r[0],r[1])
display(r[0])
operator=op
}
}
state="getOperand2"
decimal=false
}
// -->
</SCRIPT>	
    </head>
    <body background='image/ui.jpg'>
        <?php
        include "menu.php";
        @SESSION_START();
        include("../conn.php");
        $number=$_POST[number1];
        $sql5 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
        $res5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_num_rows($res5);
        ?>


        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h3>คำนวณแบบรูปภาพ</h3></center>
                        <div class="row">
                            <div class="col-md-offset-1 col-xs-8 col-md-6">
                                <font color="#000000"size="3">
                                 <a href="total_money.php">เครื่องคิดแลขตัวเลข</a> | <a href="total_money_image.php">เครื่องคิดเลขแบบภาพ</a>
                                    </font>
                            </div>

                        
                        </div>
                    </div>
                    <div class="three panel-body">



                        <?php
                        $sql = "select * from product where cat_id='1' ";
                        $res = mysqli_query($conn, $sql);
                         $sql2 = "select * from product where cat_id='2' order by pro_id";
                        $res2 = mysqli_query($conn, $sql2);
                         $sql3 = "select * from product where cat_id='3' order by pro_id";
                        $res3 = mysqli_query($conn, $sql3);
                         $sql4 = "select * from product where cat_id='4' order by pro_id";
                        $res4 = mysqli_query($conn, $sql4);
                         $sql5 = "select * from product where cat_id='5' order by pro_id";
                        $res5 = mysqli_query($conn, $sql5);
                         $sql6 = "select * from product where cat_id='9' order by pro_id";
                        $res6 = mysqli_query($conn, $sql6);
                        ?>

                        <!-- ห้ามลบนะ ถ้าลบอันแรกจะซื้อไม่ได้ #ตึ๋ง--> <form action="" method="post" class="search-wrapper cf">
                        </form>
<SCRIPT LANGUAGE="JavaScript">
<!--
setStartState()
// --></SCRIPT>
	
<FORM NAME="calculator">
<TABLE BORDER="0" ALIGN="CENTER">
<TR>
<TD COLSPAN="3"><INPUT TYPE="TEXT" NAME="total" VALUE="0"
SIZE="15"></TD>
<TD><INPUT TYPE="BUTTON" NAME="clearField" VALUE=" C "
ONCLICK="clearDisplay()"></TD>
</TR>

<TR>
<center><TD colspan="0"><INPUT TYPE="BUTTON" NAME="equals" VALUE=" คำนว
ณ "
ONCLICK="calc()"></TD></center>
</tr>
</table>
			<h2>รายการอาหาร</h2>
	<?php while ($row = mysqli_fetch_array($res)) {
                            ?>


                            <div class="form-group">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="tableproduct thumbnail ">

                                        <img src="../img_products/<?php echo $row["image"]; ?>" alt="..." width="50%"><br>
                                        <center>
                                            <div class=" tableproduct1 caption">
                                           
                                                <h5><?php echo $row["pro_name"] . " " . $row["Description"]; ?><p></p>
                                                <font color="red"><?php echo "ราคา" . " " . $row["price"] . " " . "บาท";?></font><p></p>
												<font color="#ffffff">
												<?php
												echo $row["calories"] . " " . "กิโลแคลอรี่";
												?></font><p></p>
                                         
                                                      จำนวน <select name="number1"id="number">
                                                            <option value="5" selected ONCLICK="addDigit(5)">5</option >
                                                            <option value="4" selected ONCLICK="addDigit(4)">4</option >
                                                            <option value="3" selected ONCLICK="addDigit(3)">3</option >
                                                            <option value="2" selected ONCLICK="addDigit(2)">2</option >
                                                            <option value="1" selected ONCLICK="addDigit(1)">1</option>
                                                        </select> แก้ว<br>
                                                 
                                                         
                                                        <input type="button" class="btn btn-xs btn-success" name="price"   value="<?php echo $row[price]." "."บาท";?>
							"ONCLICK="addDigit(<?php echo $row[price];?>)">
                                                 <INPUT TYPE="BUTTON" NAME="minus" VALUE=" + "
ONCLICK="performOp('+')">
<INPUT TYPE="BUTTON" NAME="minus" VALUE=" - "
ONCLICK="performOp('-')">
<INPUT TYPE="BUTTON" NAME="equals" VALUE=" = "
ONCLICK="calc()">
<INPUT TYPE="BUTTON" NAME="multiply" VALUE=" * "
ONCLICK="performOp('*')">
                       

                                            </div>
                                        </center>
                                    </div>

                                </div>          
                            </div>
                        
                        <?php }
                        ?>                   
</form>
	<?php while ($row2 = mysqli_fetch_assoc($res2)) {
                            ?>


                            <div class="form-group">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="tableproduct thumbnail ">

                                        <img src="../img_products/<?php echo $row2["image"]; ?>" alt="..." width="38%"><br>
                                        <center>
                                            <div class=" tableproduct1 caption">
                                           
                                                <h5><?php echo $row2["pro_name"] . " " . $row2["Description"]; ?><p></p>
                                                <font color="red"><?php echo "ราคา" . " " . $row2["price"] . " " . "บาท";?></font><p></p>
												<font color="#ffffff">
												<?php
												echo $row2["calories"] . " " . "กิโลแคลอรี่";
												?></font><p></p>
                                                    
                                                        <input type="button" class="btn btn-xs btn-success" name="price"   value="<?php echo $row[price]." "."บาท";?>
							"ONCLICK="addDigit(<?php echo $row2[price];?>)">
                                                 <INPUT TYPE="BUTTON" NAME="minus" VALUE=" + "
ONCLICK="performOp('+')">
<INPUT TYPE="BUTTON" NAME="minus" VALUE=" - "
ONCLICK="performOp('-')">
<INPUT TYPE="BUTTON" NAME="equals" VALUE=" = "
ONCLICK="calc()">
<INPUT TYPE="BUTTON" NAME="multiply" VALUE=" * "
ONCLICK="performOp('*')">
                          

                                            </div>
                                        </center>
                                    </div>

                                </div>          
                            </div>
                        
                        <?php }
                        ?>                   
                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


	<?php while ($row3= mysqli_fetch_assoc($res3)) {
                            ?>


                            <div class="form-group">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="tableproduct thumbnail ">

                                        <img src="../img_products/<?php echo $row3["image"]; ?>" alt="..." width="22%"><br>
                                        <center>
                                            <div class=" tableproduct1 caption">
                                           
                                                <h5><?php echo $row3["pro_name"] . " " . $row3["Description"]; ?><p></p>
                                                <font color="red"><?php echo "ราคา" . " " . $row3["price"] . " " . "บาท";?></font><p></p>
												<font color="#ffffff">
												<?php
												echo $row3["calories"] . " " . "กิโลแคลอรี่";
												?></font><p></p>
                                                    
                                                        <input type="button" class="btn btn-xs btn-success" name="price"   value="<?php echo $row[price]." "."บาท";?>
							"ONCLICK="addDigit(<?php echo $row2[price];?>)">
                                                 <INPUT TYPE="BUTTON" NAME="minus" VALUE=" + "
ONCLICK="performOp('+')">
<INPUT TYPE="BUTTON" NAME="minus" VALUE=" - "
ONCLICK="performOp('-')">
<INPUT TYPE="BUTTON" NAME="equals" VALUE=" = "
ONCLICK="calc()">
                          

                                            </div>
                                        </center>
                                    </div>

                                </div>          
                            </div>
                        
                        <?php }
                        ?>    
                        
                        <?php while ($row4 = mysqli_fetch_array($res4)) {
                            ?>


                            <div class="form-group">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="tableproduct thumbnail ">

                                        <img src="../img_products/<?php echo $row4["image"]; ?>" alt="..." width="83%"><br>
                                        <center>
                                            <div class=" tableproduct1 caption">
                                           
                                                <h5><?php echo $row4["pro_name"] . " " . $row4["Description"]; ?><p></p>
                                                <font color="red"><?php echo "ราคา" . " " . $row4["price"] . " " . "บาท";?></font><p></p>
												<font color="#ffffff">
												<?php
												echo $row4["calories"] . " " . "กิโลแคลอรี่";
												?></font><p></p>
                                                    
                                                        <input type="button" class="btn btn-xs btn-success" name="price"   value="<?php echo $row4[price]." "."บาท";?>
							"ONCLICK="addDigit(<?php echo $row4[price];?>)">
                                                 <INPUT TYPE="BUTTON" NAME="minus" VALUE=" + "
ONCLICK="performOp('+')">
<INPUT TYPE="BUTTON" NAME="minus" VALUE=" - "
ONCLICK="performOp('-')">
<INPUT TYPE="BUTTON" NAME="equals" VALUE=" = "
ONCLICK="calc()">
                          

                                            </div>
                                        </center>
                                    </div>

                                </div>          
                            </div>
                        
                        <?php }
                        ?>           
                        <?php while ($row5 = mysqli_fetch_array($res5)) {
                            ?>


                            <div class="form-group">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="tableproduct thumbnail ">

                                        <img src="../img_products/<?php echo $row5["image"]; ?>" alt="..." width="84%"><br>
                                        <center>
                                            <div class=" tableproduct1 caption">
                                           
                                                <h5><?php echo $row5["pro_name"] . " " . $row5["Description"]; ?><p></p>
                                                <font color="red"><?php echo "ราคา" . " " . $row5["price"] . " " . "บาท";?></font><p></p>
												<font color="#ffffff">
												<?php
												echo $row5["calories"] . " " . "กิโลแคลอรี่";
												?></font><p></p>
                                                    
                                                        <input type="button" class="btn btn-xs btn-success" name="price"   value="<?php echo $row5[price]." "."บาท";?>
							"ONCLICK="addDigit(<?php echo $row5[price];?>)">
                                                 <INPUT TYPE="BUTTON" NAME="minus" VALUE=" + "
ONCLICK="performOp('+')">
<INPUT TYPE="BUTTON" NAME="minus" VALUE=" - "
ONCLICK="performOp('-')">
<INPUT TYPE="BUTTON" NAME="equals" VALUE=" = "
ONCLICK="calc()">
                          

                                            </div>
                                        </center>
                                    </div>

                                </div>          
                            </div>
                        
                        <?php }
                        ?>          
                        
                        <?php while ($row6 = mysqli_fetch_array($res6)) {
                            ?>


                            <div class="form-group">

                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="tableproduct thumbnail ">

                                        <img src="../img_products/<?php echo $row6["image"]; ?>" alt="..." width="76%"><br>
                                        <center>
                                            <div class=" tableproduct1 caption">
                                           
                                                <h5><?php echo $row6["pro_name"] . " " . $row6["Description"]; ?><p></p>
                                                <font color="red"><?php echo "ราคา" . " " . $row6["price"] . " " . "บาท";?></font><p></p>
												<font color="#ffffff">
												<?php
												echo $row6["calories"] . " " . "กิโลแคลอรี่";
												?></font><p></p>
                                                    
                                                        <input type="button" class="btn btn-xs btn-success" name="price"   value="<?php echo $row6[price]." "."บาท";?>
							"ONCLICK="addDigit(<?php echo $row6[price];?>)">
                                                 <INPUT TYPE="BUTTON" NAME="minus" VALUE=" + "
ONCLICK="performOp('+')">
<INPUT TYPE="BUTTON" NAME="minus" VALUE=" - "
ONCLICK="performOp('-')">
<INPUT TYPE="BUTTON" NAME="equals" VALUE=" = "
ONCLICK="calc()">
                          

                                            </div>
                                        </center>
                                    </div>

                                </div>          
                            </div>
                        
                        <?php }
                        ?>           
                    </div>
                </div>


                
                <?php include("../footer.php");
                ?>

            </div>
        </div>
    </body>
</html>


