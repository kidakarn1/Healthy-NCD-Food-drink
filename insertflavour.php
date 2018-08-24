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
        <style type="text/css">

            body {
                background-image: url(image/ui.jpg);
                background-attachment:fixed;
            }

           
        </style>
    </head>
    <body>    

        <?php
        include("conn.php");
        include("menu.php");

        $sql2 = "select*from orderdns where mem_id='$_SESSION[mem_id]' and order_id='' ";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_num_rows($res2);
        ?>
        <div class="container">
            <div class="navbar-inverse">
                <br>
                <div class="three panel panel-default ">
                    <div class="panel-heading">

                        <?php
                        $sql3 = "select *from promotion";
                        $res3 = mysqli_query($conn, $sql3);
                        $row3 = mysqli_fetch_assoc($res3);
                        include("flavour.php");
                        ?>









                    </div>
                </div><?php include("footer.php") ?> 
            </div> 
        </div>
    </div>
</body>
</html>
