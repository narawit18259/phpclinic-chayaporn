<?php
include("connection.php");
ini_set('display_errors', 1);
error_reporting(~0);

$server = "localhost";
$user = "root";
$password = "";
$dbName = "project";
$id = $_POST["id"];

$conn = mysqli_connect($server, $user, $password, $dbName);

$query = "UPDATE newcase SET 
			firstname = '" . $_POST["firstname"] . "' ,
			lastname = '" . $_POST["lastname"] . "' ,
			tel = '" . $_POST["tel"] . "' ,
			birthday = '" . $_POST["birthday"] . "' ,
			age = '" . $_POST["age"] . "',
            address = '" . $_POST["address"] . "',
            congenital = '" . $_POST["congenital"] . "',
            sex = '" . $_POST["sex"] . "',
            date_new = NOW()
			WHERE id = '" . $id . "' ";

$data = mysqli_query($conn, $query);

if ($query) {
}

mysqli_close($conn);
?>
<html lang="en">

<head>
    <title>Service Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/editdata.css">
</head>

<body onload="startTime()" id="gradient">
    <div class="fonttext">
        <script>
            function autoTab(obj) {
                var pattern = new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
                var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
                var returnText = new String("");
                var obj_l = obj.value.length;
                var obj_l2 = obj_l - 1;
                for (i = 0; i < pattern.length; i++) {
                    if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                        returnText += obj.value + pattern_ex;
                        obj.value = returnText;
                    }
                }
                if (obj_l >= pattern.length) {
                    obj.value = obj.value.substr(0, pattern.length);
                }
            }
        </script>
        <script>
            var colors = new Array(
                [62, 35, 255],
                [60, 255, 60],
                [255, 35, 98],
                [45, 175, 230],
                [255, 0, 255],
                [255, 128, 0]);

            var step = 0;
            //color table indices for: 
            // current color left
            // next color left
            // current color right
            // next color right
            var colorIndices = [0, 1, 2, 3];

            //transition speed
            var gradientSpeed = 0.002;

            function updateGradient() {

                if ($ === undefined) return;

                var c0_0 = colors[colorIndices[0]];
                var c0_1 = colors[colorIndices[1]];
                var c1_0 = colors[colorIndices[2]];
                var c1_1 = colors[colorIndices[3]];

                var istep = 1 - step;
                var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
                var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
                var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
                var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

                var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
                var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
                var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
                var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

                $('#gradient').css({
                    background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
                }).css({
                    background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
                });

                step += gradientSpeed;
                if (step >= 1) {
                    step %= 1;
                    colorIndices[0] = colorIndices[1];
                    colorIndices[2] = colorIndices[3];

                    //pick two new target color indices
                    //do not pick the same as the current one
                    colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
                    colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

                }
            }

            setInterval(updateGradient, 10);
        </script>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <nav class="navbar navbar-expand" style="font-size: 25px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" target="_blank">
                <img src="pict/logo.png" width="100px" height="100px">
            </a>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="service_page.php" style="color: #FFFFFF;">หน้าหลัก
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF;">ผู้ป่วย</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="newcase.php" style="color: #000000; font-size:25px">ผู้ป่วยใหม่</a>
                            <a class="dropdown-item" href="oldcase.php" style="color: #000000; font-size:25px">ผู้ป่วยเก่า</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="receipt.php" style="color: #FFFFFF;">ใบเสร็จ
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="drug.php" style="color: #FFFFFF;">การรักษา
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php" style="color: #FFFFFF;">ลงชื่อออก
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>


                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item active">
                        <a class="navbar-text" style="color: #FFFFFF; margin-right:30px;">
                            <script language="javascript">
                                now = new Date();
                                var thday = new Array("อาทิตย์", "จันทร์",
                                    "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์");
                                var thmonth = new Array("มกราคม", "กุมภาพันธ์", "มีนาคม",
                                    "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน",
                                    "ตุลาคม", "พฤศจิกายน", "ธันวาคม");


                                function startTime() {
                                    var today = new Date();
                                    var h = today.getHours();
                                    var m = today.getMinutes();
                                    var s = today.getSeconds();
                                    // add a zero in front of numbers<10
                                    m = checkTime(m);
                                    s = checkTime(s);
                                    document.getElementById('txt_time').innerHTML = "เวลา " + h + ":" + m + ":" + s + " น.";
                                    t = setTimeout(function() {
                                        startTime()
                                    }, 500);
                                }

                                function checkTime(i) {
                                    if (i < 10) {
                                        i = "0" + i;
                                    }
                                    return i;
                                }

                                document.write("วัน" + thday[now.getDay()] + "ที่ " + now.getDate() + " " + thmonth[now.getMonth()] + " " + (0 + now.getFullYear() + 543));
                            </script>
                            <div id="txt_time"></div>

                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm" style="margin-top: 200px; font-size:25px">
                    <div class="container">
                        <div class="alert alert-success" role="alert">
                            บันทึกเสร็จสิ้น
                            <div style="text-align: right; font-size:25px">
                                <a href="oldcase.php"><button type="button" class="btn btn-outline-success">ตกลง</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">

                </div>
            </div>
        </div>
    </div>
</body>

</html>