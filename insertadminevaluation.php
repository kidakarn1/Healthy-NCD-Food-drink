   

<?php
include("conn.php");?>
<!-- <?php include("clogout.php");?> -->
<!-- <?php include("usernameadmin.php");?> -->



  <?php 
  $sql3="select *from promotion";
  $res3=mysqli_query($conn,$sql3);
  $row3=mysqli_fetch_assoc($res3);
  include("adminevaluation.php");
   ?>


 
  <!-- <?php include("ooadmin.php");
  ?> -->



<!-- <?php
include("right.php");
?>
</div>
 -->


  
   </body>
   </html>
