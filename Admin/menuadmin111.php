<?php SESSION_START();
include("../conn.php");
$sql="select*from user,staff where user.username='$_SESSION[user]'
and staff.staff_id=user.user_id";

$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$_SESSION[staff_id]=$row[staff_id];?>
<nav id="slide-menu">
	<ul>
		<a href="home.php"><li class="index">หน้าแรก</li></a>
		<a href="#popup_admin"><li class="settings">แก้ไขข้อมูลส่วนตัว</li></a>
		<a href="admin18.php"><li class="timeline">รายชื่อสมาชิก</li></a>
		<a href="admin14.php"><li class="events">เพิ่มพนักงาน</li></a>
		<a href="admin24.php"><li class="calendar">รายการสังซื้อ</li></a>
		<a href="admin5.php"><li class="calendar">เช็คสินค้า</li></a>
		<a href="admin9.php"><li class="calendar">เพิ่มสินค้า</li></a>
		<a href="admin25.php"><li class="calendar">ข้อมูลสมาชิกประจำวัน</li></a>
		<a href="recat.php"><li class="calendar">ประเภทสินค้า</li></a>
		<a href="admin2.php"><li class="calendar"
		>สินค้าขายดีประจำเดือน</li></a>
		<a href="admin20.php"><li class="calendar">ผู้ได้รับสิทธิ์โปรโมชั่น</li></a>
		<a href="admin22.php"><li class="calendar">ยอดขายประจำวัน</li></a>
		<a href="order_reportm.php"><li class="calendar">ยอดขายประจำเดือน</li></a>
		<a href="admin.php"><li class="calendar">แบบประเมินร้าน</li></a>
		<a href="admin1.php"><li class="calendar">แบบประเมินสินค้า</li></a>
		<a href="webbord3admin.php"><li class="calendar">เว็บบร์อท</li></a>
		<a href="../logout.php"><li class="sep logout"><font color="#ffff33">ออกจากระบบ</font></li></a>
	</ul>
</nav>

