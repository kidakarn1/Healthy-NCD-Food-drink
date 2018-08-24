<?php
session_start(); // กำหนดไว้ กรณีอาจได้ใช้ตัวแปร session
include("facebook.php"); //  เรียกใช้งานไฟล์ php-sdk สำหรับ facebook
 
// สร้าง Application instance.
$facebook = new facebook(array(
  'appId'  => '1354381171336148', // appid ที่ได้จาก facebook
  'secret' => '5c6d1ce3389ed39ae4fc472a2a08259c', // app secret ที่ได้จาก facebook
  'cookie' => true, // อนุญาตใช้งาน cookie
));
// appId และ secret ดูวิธีการได้มาจาก 
// http://www.ninenik.com/สร้าง_comment_ด้วย_social_plugins_ใน_facebook_api_อย่างง่ายดาย-291.html
 
// ตรวจสอบสถานะการ login
$session = $facebook->getSession();
 
// สร้างฟังก์ชันไว้สำหรัดทดสอบ การแสดงผลการใช้งาน
function pre($varUse){
    echo "<pre>";
    print_r($varUse);
    echo "</pre>";
}
// สร้างตัวแปรสำหรับเก็บข้อมูลของสมาชิกเมื่อได้ทำการ login แล้ว
$me = null; 
 
// ถ้ามีการ login ดึงข้อมูลสมาชิกที่ login มาเก็บที่ตัวแปร $me เป็น array
if($session){
    try{
        $uid = $facebook->getUser(); // เก็บ id ของผู้ใช้ไว้ที่ตัวแปร $uid กรณีมีการล็อกอิน facebook อยู่
        $me = $facebook->api('/me'); // ดึงข้อมูลผู้ใช้ปัจจุบันทีล็อกอิน facebook มาเก็บในตัวแปร $me
    }catch (FacebookApiException $e) { // กรณีเกิดข้อผิดพลากแสดงผลลัพธ์ข้อผิดพลาดที่เกิดขึ้น
        error_log($e);
    }
}
?>
<?php
////////////////////////////////////////////////////////////////////////////////
///       ส่วนของการใช้งาน
///////////////////////////////////////////////////////////////////////////////////
if(isset($_GET['logout'])){ // ทำการ logout อย่างสมบูรณ์
    $facebook->setSession(null);     // ล่างค่า session ของ facebook
    header("Location:".$_SERVER['PHP_SELF']); //ลิ้งค์ไปหน้าที่ต้องการเมื่อ logout เรียบร้อยแล้ว
}
if($me){ // กรณีเงื่อน login อยู่
// เก็บค่า url ไว้ในตัวแปร $logoutUrl สำหรับ logout กรณีที่ได้ทำการ login อยู่
//  $logoutUrl = $facebook->getLogoutUrl(); // การกำหนดแบบปกติ
// การกำหนดแบบปกติ ค่า session ของ facebook ยังคงอยู่ แนะนำเป็นวิธีด้านล่าง
 
//   next คือ url ที่ต้องการลิ้งค์ไป เมื่อ logout แล้ว ในที่นี้กำหนด เป็น url ปัจจุบัน 
//   แต่เพิ่มตัวแปร get ชื่อ logout เพื่อกลับมาเข้าเงื่อนไข ทำลาย session ของ facebook
    $logoutUrl = $facebook->getLogoutUrl(
        array(
            'next'=>'http://www.ninenik.com/fb/facebook_use_sdk2.php?logout'
        )
    ); 
   
}else{  // กรณีเงื่อนไข logout
// เก็บค่า url ไว้ในตัวแปร $loginUrl สำหรับ login กรณีที่ยังไม่ได้ login
//  $loginUrl = $facebook->getLoginUrl();  // กำหนด url กรณีใช้งานปกติ
  
//  กำหนด url สำหรับ login กรณีเพิ่มเติมพิเศษ
//  next: คือ url ที่้ต้องการใช้ลิ้งค์ไป เมื่อ login สำเร็จ
//  cancel_url: คือ url ที่้ต้องการใช้ลิ้งค์ไป เมื่อ ผู้ใช้ยกเลิกการ login
//  req_perms: กำหนด การร้องขอส่วนของ permission เพิ่มเติมที่ต้องการให้ผู้ใช้อนุญาต
//  ดูได้จาก http://developers.facebook.com/docs/authentication/permissions
//  display:  รูปแบบหน้า login ที่ต้องการแสดง ปกติค่าจะเป็น page ถ้าไม่ได้กำหนด 
//  จะเป็นหน้า เพจ login ของ facebook ปกติ
//  การกำหนดแบบ popup จะมีปุ่ม cancel ให้เลือก และใช้กับ cancel_url แนะนำให้ใช้เป็น popup
   $loginUrl = $facebook->getLoginUrl(
        array(
            'next'=>'http://www.ninenik.com/fb/facebook_use_sdk2.php',
            'cancel_url'=>'http://www.ninenik.com/fb/facebook_use_sdk2.php',
            'req_perms'=>'offline_access,user_photos', // คั่นแต่ละค่าด้วย ,(comma)
            'display'=>'popup'    // page หรือ popup     
        )
   );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
 xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>facebook use php sdk login logout</title>
</head>
 
<body>
 
 
<?php if($me){ ?>
<a href="<?=$logoutUrl?>">Facebook Logout</a>
<?php }else{ ?>
<a href="<?=$loginUrl?>">Facebook Login</a>
<?php } ?>
 
<?php
pre($me);
?>
 
 
</body>
</html>