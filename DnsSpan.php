 <?php if($_SESSION['user']==""){?>
                <!-- <a  href="index.php"> -->
				<?php include "dinnershop.php"; ?>
				</a>
				<?php }?>

                <?php if($_SESSION['user']!=""){?>
                <!-- <a  href="home.php"> -->
				<?php include "dinnershop.php"; ?>
                <font color="green"><h2> <?php echo "กำลังใช้งาน"?></h2></font>               
                </a>
				<?php }?>
               

