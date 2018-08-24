<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <?php include('menu.php'); ?>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ยินดีต้อนรับสู่ Healthy NCD</title>
        
         

        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dns_9.css" rel="stylesheet">





        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drop Down menu เลือกจังหวัด, อำเภอ, ตำบล ของประเทศไทย โดย www.itangmo.com</title>
        <meta name="description" content="ไอ้แตงโมดอทคอม แจกแอพฟรีประจำวัน สอนทำเว็บไซต์ ด้วย php,ajax,jquery,css,css3,HTML5 แบบง่ายสุดๆ"/>
        <meta name="keywords" content="app ฟรีประจำวัน,สอนทำเว็บไซต์ฟรี,สอนทำเว็บ,สอนทำเว็บไซต์,php,html5,css,css3,jquery,ajax,สอนทำเว็บไซต์ด้วย php,Drop Down menu เลือกจังหวัด"/>


        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- Button trigger modal -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>


    <script language=Javascript>
        function Inint_AJAX() {
            try {
                return new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
            } //IE
            try {
                return new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            } //IE
            try {
                return new XMLHttpRequest();
            } catch (e) {
            } //Native Javascript
            alert("XMLHttpRequest not supported");
            return null;
        }
        ;

        function dochange(src, val) {
            var req = Inint_AJAX();
            req.onreadystatechange = function () {
                if (req.readyState == 4) {
                    if (req.status == 200) {
                        document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
                    }
                }
            };
            req.open("GET", "localtion.php?data=" + src + "&val=" + val); //สร้าง connection
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
            req.send(null); //ส่งค่า
        }

        window.onLoad = dochange('province', -1);
    </script>

    <style>
        .error{
            color:red;
        }
    </style>


    <body>

        <?php
        @SESSION_START();

        include"conn.php";


        $sql = "select * from disease";
        $res = mysqli_query($conn, $sql);
        $data = array();
        ?>
        <div class="panel">
            <div class=" panel-body">

                <form class="form-horizontal" id="regis" method="post" action="insertmember.php">



                    <!--<form class="form-horizontal" action="insertmember.php" method="post" id="regis">-->

                    <div class="three panel panel-primary">
                        <div class=" panel-heading">
                            <h3 class="panel-title"><b>กรุณากรอกประวัติส่วนตัว</b></h3>

                        </div>
                        <br>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="firstname">ชื่อ</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name"/>
                            </div>

                            <label class="col-sm-2 control-label" for="lastname" >นามสกุล</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name"/>
                            </div>
                        </div>

                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" >เพศ</label> 

                                <div class="col-sm-3 ">
                                    <label class="control-label">
                                        <input type="radio" id="male" value="ชาย" name="sex">ชาย  
                                    </label>
                                    <label class="control-label">
                                        <input type="radio" id="female" value="หญิง"  name="sex">หญิง
                                    </label>



                                </div>


                                <label class="col-sm-2 control-label" for="age">อายุ</label>
                                <div class="col-sm-3">

                                    <input type="number" class="form-control" id="age" name="age" required aria-required="true" class="error" aria-invalid="true" placeholder="Age"/>      

                                </div>
                            </div>
                        </fieldset>



                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="phone">เบอร์โทรศัพท์</label>
                            <div class="col-sm-3">
                                <input type="number"  class="form-control" id="phone" name="phone" required aria-required="true" class="error" aria-invalid="true" placeholder="Telephone"/>
                            </div>




                            <label class="col-sm-2 control-label" for="email" >Email</label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                            </div>     
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="line" >Line ID</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="line" name="line" placeholder="Line ID" />
                            </div>

                            <label class="col-sm-2 control-label" for="career" >อาชีพ</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="career" name="career" placeholder="Career"/>
                            </div>
                        </div>




                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="brithday">วันเกิด</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="pass" name="brithday" placeholder="Birthday"/>
                            </div>

                            <label class="col-sm-2 control-label" for="province">จังหวัด</label>
                            <div class="col-sm-3">
                                <div name="province" id="province">

                                    <select>
                                        <option value="0" >- เลือกจังหวัด -</option>
                                    </select>
                                </div>
                            </div>


                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="amphur">อำเภอ : </label>
                            <div class="col-sm-3">


                                <div name="amphur" id="amphur">
                                    <select>
                                        <option value='0' >- เลือกอำเภอ -</option>
                                    </select>
                                </div>
                            </div>

                            <label class="col-sm-2 control-label" for="district">ตำบล : </label>
                            <div class="col-sm-3">

                                <div name="district" id="district">
                                    <select>
                                        <option value='0' >- เลือกตำบล -</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="number_home">บ้านเลขที่</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="number_home" name="number_home" placeholder=""/>
                            </div>

                            <label class="col-sm-2 control-label" for="number_home" >หมู่</label>

                            <div class="col-sm-3">
                                <input type="text" class="form-control"  name="mooban" placeholder="Village"/>
                            </div>




                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="Road" >ถนน:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="Road" name="Road" placeholder="Road"/>
                            </div>


                            <label for="address" class="col-sm-2 control-label">ไปรษณีย์:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="Postcode"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="education" class="col-sm-2 control-label">การศึกษา</label>
                            <div class="col-sm-3 ">
                                <select class=" form-control" name="education" id="education22" size='1'>
                                    <option value=''>การศึกษา</option>
                                    <option value="ประถมศึกษา">ประถมศึกษา</option>
                                    <option value="มัธยมต้น">มัธยมต้น</option>
                                    <option value="มัธยมปลาย">มัธยมปลาย</option>
                                    <option value="อุดมศึกษา">อุดมศึกษา</option>
                                    <option value="ปริญาตรี">ปริญาตรี</option>
                                    <option value="ปริญาโท">ปริญาโท</option>
                                    <option value="ปริญาเอก">ปริญาเอก</option>
                                </select>

                            </div>
                        </div>
                    </div>




            <div class="three panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title"><b>กรุณากรอกประวัติโรคอย่างละเอียด</b></h3>
                </div>

                <br>






                <div class="form-group">
                    <label for="disease" class="col-sm-2 control-label">โรค</label>
                    <div class="col-sm-5 ">
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                            array_push($data, $row['dis_id']);
                            ?>

                            <input type="checkbox" id='disease' value="<?php echo $row['dis_id']; ?> " name="disease[]"  />

                            <?php echo $row['dis_name']; ?>
                        <?php } ?>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="Blood" class="col-sm-2 col-xs-12 control-label">กรุ๊ปเลือด</label>

                        <div class="col-sm-3 ">


                            <select class=" form-control" name="Blood" id='Blood'>
                                <option value=''>กรุณาเลือกกรุ๊ปเลือด</option>
                                <option value="AB">AB</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                            </select>


                        </div> 



                    </div>

                    <div class="form-group">

                        <label for="brithday" class="col-sm-2 control-label">ระยะเวลา</label>

                        <div class="col-sm-3">
                            <input type="number"  class="form-control" id="duration" name="duration"  aria-required="true" class="error" aria-invalid="true" placeholder="Year"/>

                        </div>

                        <label for="brithday" class="col-sm-2 control-label">อาการก่อนหน้า</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="pass" name="Previous_symptoms" placeholder="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="brithday" class="col-sm-2 control-label">อาการล่าสุด</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="pass" name="Recent_symptoms" placeholder="text">
                        </div>

                        <label for="brithday" class="col-sm-2 control-label">อาหารเสริม</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="pass" name="supplementary_food" placeholder="text">
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="inputPassword3" class=" col-sm-2 control-label">กรุณากรอกตัวเลข</label>

                        <div class=" col-sm-2 col-xs-3">
                            <img class="col-sm-12 control-label" border="0" id="captcha" src="showcaptcha.php">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <input class=" form-control" type="number" name="str" size="2"placeholder="กรุณากรอกตัวเลข">
                        </div>
                    </div>

                    <div class="col-md-offset-5">
                        <input type="submit" class="col-sm-2 btn btn-success" value="บันทึกข้อมูล">
                    </div>
                </div>
            </div>
        </form>
    </div><?php include("footer.php") ?>
</div>
<script>


    $(document).ready(function () {
        $("#regis").validate({
            rules: {
                firstname: "required",
                lastname: "required",
                district: "required",
                province: "required",
                amphur: "required",
                //                        sex: "required",

                phone: {
                    required: true,
                    number: true,
                    maxlength: 10,
                    minlength: 10

                },
                Age: {
                    required: true,
                    number: true,
                    maxlength: 2

                },
                //                        career: {
                //                            required: true,
                //                            minlength: 2
                //                        },
                number_home: {
                    required: true,

                },

                //                        Road: {
                //                            required: true,
                //                            minlength: 5
                //                        },
                tumbon: {
                    required: true,
                    minlength: 5
                },
                aumpher: {
                    required: true,
                    minlength: 5
                },
                // province: {
                //     required: true,
                //     minlength: 5
                // },
                postalcode: {
                    required: true,
                    minlength: 5,
                    maxlength: 5,
                    number: true
                },
                Blood: {
                    required: true
                },
                education: {
                    required: true
                },
                'disease[]': {
                    required: true
                },

                str: {
                    required: true,
                    minlength: 4
                },
                line: {
                    required: true,
                    minlength: 4
                },

            },
            messages: {
                firstname: "กรุณากรอก ชื่อ ของท่านค่ะ",
                lastname: "กรุณากรอก นามสกุล",
                district: "กรุณากรอกตำบล",
                amphur: "กรุณากรอกอำเภอ",
                province: "กรุณากรอกจังหวัด",
                phone: {
                    required: "กรุณากรอกเบอร์โทรศัพท์",
                    minlength: "กรุณากรอกให้ครบ 10 หลัก ค่ะ",
                    maxlength: "กรุณากรอกไม่เกิน 10 หลัก ค่ะ",
                    number: "กรุณากรอกเฉพาะตัวเลขเท่านั้น ค่ะ"

                            // rangelength: "กรุณากรอกเฉพราะตัวเลข"
                },
                age: {
                    required: "กรุณากรอก อายุ ของท่านค่ะ",
                    maxlength: "กรุณากรอกไม่เกิน 2 หลัก ค่ะ",
                    number: "กรุณากรอกเฉพาะตัวเลขเท่านั้น ค่ะ"
                },
                brithday: {
                    required: "กรุณากรอก วัน/เดือน/ปีเกิด ของท่านค่ะ",
                    minlength: "Your password must be at least 5 characters long"

                },
                number_home: {
                    required: "กรุณากรอก บ้านเลขที่ ของท่าค่ะ"
                },

                //                        Road: {
                //                            required: "กรุณากรอก ถนน/ซอย ของท่านค่ะ"
                //                        },

                tumbon: {
                    required: "กรุณากรอก ตำบล ของท่านค่ะ"
                },
                //                        sex: {
                //                            required: "กรุณากรอก เพศ"
                //                        },
                aumpher: {
                    required: "กรุณากรอก อำเภอ ของท่านค่ะ"
                },
                province: {
                    required: "กรุณากรอก จังหวัด ของท่านค่ะ"
                },
                postalcode: {
                    required: "กรุณากรอก รหัสไปรษณีย์ ของท่านค่ะ",
                    minlength: "กรุณากรอกเลขไปรษณีย์ 5 หลัก ค่ะ",
                    maxlength: "กรุณากรอกเลขไปรษณีย์ 5 หลัก ค่ะ",
                    number: "กรุณากรอกเฉพาะตัวเลขเท่านั้น ค่ะ"

                },

                Blood: {
                    required: "กรุณาเลือก กรุ๊ปเลือด ของท่านค่ะ"
                },

                education: {
                    required: "กรุณาเลือก การศึกษา ของท่านค่ะ"
                },

                disease: {
                    required: "กรุณากรอก โรค ของท่านค่ะ"
                },

                str: {
                    required: "กรุณากรอก ตัวเลขที่ปรากฏ ค่ะ",
                    minlength: "กรุณากรอกตัวเลขที่ปรากฏทั้งหมดค่ะ"

                },

                line: {
                    required: "กรุณากรอก ID Line ค่ะ",
                    minlength: "กรุณากรอก ID Line อย่างน้อย 4 ตัว"
                },

            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");
                // Add `has-feedback` class to the parent div.form-group
                // in order to add icons to inputs
                element.parents(".col-sm-3").addClass("has-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }

                // Add the span element, if doesn't exists, and apply the icon classes to it.
                if (!element.next("span")[ 0 ]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                }
            },
            success: function (label, element) {
                // Add the span element, if doesn't exists, and apply the icon classes to it.
                if (!$(element).next("span")[ 0 ]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(".col-sm-3").addClass("has-error").removeClass("has-success");
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");

                $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".col-sm-3").addClass("has-success").removeClass("has-error");
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");

                $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
            }
        });
    });
</script>

        <!-- <p>ส่วนของจังหวัด อำเภอ และ ตำบล</p> -->
<script language=Javascript>
    function Inint_AJAX() {
        try {
            return new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
        } //IE
        try {
            return new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
        } //IE
        try {
            return new XMLHttpRequest();
        } catch (e) {
        } //Native Javascript
        alert("XMLHttpRequest not supported");
        return null;
    }
    ;

    function dochange(src, val) {
        var req = Inint_AJAX();
        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                if (req.status == 200) {
                    document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
                }
            }
        };
        req.open("GET", "localtion.php?data=" + src + "&val=" + val); //สร้าง connection
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
        req.send(null); //ส่งค่า
    }

    window.onLoad = dochange('province', -1);
</script>

</body>
</html>
