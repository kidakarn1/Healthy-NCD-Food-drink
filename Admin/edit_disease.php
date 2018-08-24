<?php

include("../conn.php");
echo $id = $_REQUEST[id];
if ($id == 1) {
    $kno_name = $_REQUEST['kno_name'];
    $explanation1 = $_REQUEST['explanation1'];
    $image = $_REQUEST['image'];
    $sql1 = "update knowledge set 
            kno_name='$kno_name',
            explanation='$explanation1',
            image='$image'
            where kno_id='1' ";

    $explanation2 = $_REQUEST['explanation2'];
    $img_name1 = $_REQUEST['img_name1'];
    $sql1_1 = "update image_kno set 
            img_name='$img_name1',
            kno_id='1',
            explanation_im='$explanation2'
            where img_id='1'";

    $explanation3 = $_REQUEST['explanation3'];
    $img_name2 = $_REQUEST['img_name2'];
    $sql1_2 = "update image_kno set 
            img_name='$img_name2',
            kno_id='1',
            explanation_im='$explanation3'
            where img_id='2'";

    $explanation4 = $_REQUEST['explanation4'];
    $img_name3 = $_REQUEST['img_name3'];
    $sql1_3 = "update image_kno set 
            img_name='$img_name3',
            kno_id='1',
            explanation_im='$explanation4'
            where img_id='3'";


    if ($res1 = mysqli_query($conn, $sql1)
            and $res2 = mysqli_query($conn, $sql1_1)
            and $res3 = mysqli_query($conn, $sql1_2)
            and $res4 = mysqli_query($conn, $sql1_3)) {
        header('location: Heart_disease.php');
    }
}

if ($id == 2) {
    $kno_name = $_POST['kno_name'];
    $explanation1 = $_POST['explanation1'];
    $image = $_POST['image'];
    $sql2 = "update knowledge set 
            kno_name='$kno_name',
            explanation='$explanation1',
            image='$image'
            where kno_id='2' ";

    $explanation2 = $_REQUEST['explanation2'];
    $img_name6 = $_REQUEST['img_name6'];
    $sql2_1 = "update image_kno set
            img_name='$img_name6',
            kno_id='2',
            explanation_im='$explanation2'
            where img_id='4'";

    $explanation3 = $_REQUEST['explanation3'];
    $img_name7 = $_REQUEST['img_name7'];
    $sql2_2 = "update image_kno set 
            img_name='$img_name7',
            kno_id='2',
            explanation_im='$explanation3'
            where img_id='5'";

    $explanation4 = $_REQUEST['explanation4'];
    $img_name8 = $_REQUEST['img_name8'];
    $sql2_3 = "update image_kno set 
            img_name='$img_name8',
            kno_id='2',
            explanation_im='$explanation4'
            where img_id='6'";

    if ($res5 = mysqli_query($conn, $sql2)
            and $res6 = mysqli_query($conn, $sql2_1)
            and $res7 = mysqli_query($conn, $sql2_2)
            and $res8 = mysqli_query($conn, $sql2_3)) {
        header('location: diabetes.php');
    }
}

if ($id == 3) {
    $kno_name = $_POST['kno_name'];
    $explanation1 = $_POST['explanation1'];
    $image = $_POST['image'];
    $sql3 = "update knowledge set 
            kno_name='$kno_name',
            explanation='$explanation1',
            image='$image'
            where kno_id='3' ";
    
    $explanation2 = $_REQUEST['explanation2'];
    $img_name10 = $_REQUEST['img_name10'];
    $sql3_1 = "update image_kno set
            img_name='$img_name10',
            kno_id='3',
            explanation_im='$explanation2'
            where img_id='7'";

    $explanation3 = $_REQUEST['explanation3'];
    $img_name11 = $_REQUEST['img_name11'];
    $sql3_2 = "update image_kno set 
            img_name='$img_name11',
            kno_id='3',
            explanation_im='$explanation3'
            where img_id='8'";

    $explanation4 = $_REQUEST['explanation4'];
    $img_name12 = $_REQUEST['img_name12'];
    $sql3_3 = "update image_kno set 
            img_name='$img_name12',
            kno_id='3',
            explanation_im='$explanation4'
            where img_id='9'";

    if ($res9 = mysqli_query($conn, $sql3)
            and $res10 = mysqli_query($conn, $sql3_1)
            and $res11 = mysqli_query($conn, $sql3_2)
            and $res12 = mysqli_query($conn, $sql3_3)) {
        header('location: Gout.php');
    }
}

if ($id == 4) {
    $kno_name = $_POST['kno_name'];
    $explanation1 = $_POST['explanation1'];
    $image = $_POST['image'];
    $sql4 = "update knowledge set 
            kno_name='$kno_name',
            explanation='$explanation1',
            image='$image'
            where kno_id='4' ";
    
    $explanation2 = $_REQUEST['explanation2'];
    $img_name13 = $_REQUEST['img_name13'];
    $sql4_1 = "update image_kno set
            img_name='$img_name13',
            kno_id='4',
            explanation_im='$explanation2'
            where img_id='10'";

    $explanation3 = $_REQUEST['explanation3'];
    $img_name14 = $_REQUEST['img_name14'];
    $sql4_2 = "update image_kno set 
            img_name='$img_name14',
            kno_id='4',
            explanation_im='$explanation3'
            where img_id='11'";

    $explanation4 = $_REQUEST['explanation4'];
    $img_name15 = $_REQUEST['img_name15'];
    $sql4_3 = "update image_kno set 
            img_name='$img_name15',
            kno_id='4',
            explanation_im='$explanation4'
            where img_id='12'";

    if ($res13 = mysqli_query($conn, $sql4)
            and $res14 = mysqli_query($conn, $sql4_1)
            and $res15 = mysqli_query($conn, $sql4_2)
            and $res16 = mysqli_query($conn, $sql4_3)) {
        header('location: High_blood.php');
    }
}
?>