<?php
@SESSION_START();
$numchar = array('0','1','2','3','4','6','7','8','9');

for ($i=1; $i<=4; $i++){
$random = array_rand($numchar);
$allnumchar .= $numchar[$random];
}

$numcaptcha=$allnumchar;
$_SESSION['numcaptcha']=$numcaptcha;
$_SESSION['numcaptcha_md5']=md5($numcaptcha);
?>