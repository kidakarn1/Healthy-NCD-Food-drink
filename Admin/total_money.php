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
        $sql5 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
        $res5 = mysqli_query($conn, $sql5);
        $row5 = mysqli_num_rows($res5);
        ?>


        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default">

                    <div class="panel-heading"><center><h3>เครื่องคิดเลข</h3></center>
                        <div class="row">
                            <div class="col-md-offset-1 col-xs-8 col-md-6 col-sm-">
                                    <font color="#000000"size="3">
                                 <a href="total_money.php">เครื่องคิดแลขตัวเลข</a> | <a href="total_money_image.php">เครื่องคิดเลขแบบภาพ</a>
                                    </font>
                                </a>
                            </div>

                          
                        </div>
                    </div>
                    <div class="three panel-body">
<SCRIPT LANGUAGE="JavaScript">
<!--
setStartState()
// --></SCRIPT>
<FORM NAME="calculator">
<center>
<TABLE BORDER="BORDER" ALIGN="CENTER">
<TR>
<TD COLSPAN="3"><INPUT TYPE="TEXT" NAME="total" VALUE="0"
SIZE="15"></TD></TR>
<TR>
<TD><INPUT TYPE="BUTTON" NAME="n0" VALUE=" 0 "
ONCLICK="addDigit(0)"></TD>

<TD><INPUT TYPE="BUTTON" NAME="n1" VALUE=" 1 "
ONCLICK="addDigit(1)"></TD>
<TD><INPUT TYPE="BUTTON" NAME="n2" VALUE=" 2 "
ONCLICK="addDigit(2)"></TD>
</TR>
<TR>
<TD><INPUT TYPE="BUTTON" NAME="n3" VALUE=" 3 "
ONCLICK="addDigit(3)"></TD>
<TD><INPUT TYPE="BUTTON" NAME="n4" VALUE=" 4 "
ONCLICK="addDigit(4)"></TD>
<TD><INPUT TYPE="BUTTON" NAME="n5" VALUE=" 5 "
ONCLICK="addDigit(5)"></TD>
</TR>
<TR>
<TD><INPUT TYPE="BUTTON" NAME="n6" VALUE=" 6 "
ONCLICK="addDigit(6)"></TD>
<TD><INPUT TYPE="BUTTON" NAME="n7" VALUE=" 7 "
ONCLICK="addDigit(7)"></TD>
<TD><INPUT TYPE="BUTTON" NAME="n8" VALUE=" 8 "
ONCLICK="addDigit(8)"></TD>
</TR>
<TR>
<TD><INPUT TYPE="BUTTON" NAME="n9" VALUE=" 9 "
ONCLICK="addDigit(9)"></TD>
<TD><INPUT TYPE="BUTTON" NAME="decimal" VALUE=" . "
ONCLICK="addDecimalPoint()"></TD>
<TD><INPUT TYPE="BUTTON" NAME="plus" VALUE=" + "
ONCLICK="performOp('+')"></TD>
</TR>
<TR>
<TD><INPUT TYPE="BUTTON" NAME="minus" VALUE=" - "
ONCLICK="performOp('-')"></TD>
<TD><INPUT TYPE="BUTTON" NAME="multiply" VALUE=" * "
ONCLICK="performOp('*')"></TD>
<TD><INPUT TYPE="BUTTON" NAME="divide" VALUE=" / "
ONCLICK="performOp('/')"></TD>
</TR>
<TR>
<TD><INPUT TYPE="BUTTON" NAME="equals" VALUE=" = "
ONCLICK="calc()"></TD>
<TD COLSPAN="1" ROWSPAN="1"><INPUT TYPE="BUTTON" 
NAME="sign" VALUE=" +/- " ONCLICK="changeSign()"></TD>
<TD><INPUT TYPE="BUTTON" NAME="clearField" VALUE=" C "
ONCLICK="clearDisplay()"></TD>
</TR>
</TABLE>
</center>
</FORM>
		                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


                    </div>
                </div>


                
                <?php include("../footer.php");
                ?>

            </div>
        </div>
    </body>
</html>


