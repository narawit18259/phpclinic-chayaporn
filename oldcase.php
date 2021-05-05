<?php
include("connection.php");
if ($conn->connect_error) {
    die('Error: ' . $conn->connect_error);
}
$sql = "SELECT * FROM newcase order by id desc";
if (isset($_GET['search'])) {
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM newcase WHERE firstname  LIKE '%" . $name . "%'  ";
}
$result = $conn->query($sql);

?>
<!doctype html>
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
    <!--Animation-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body onload="startTime()" id="gradient">
    <div class="fonttext">
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
        <nav class="navbar navbar-expand" id="gradient" style="font-size: 25px;">
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
        <div class="animate__animated animate__fadeIn">
            <label style="margin: 70px 0px 0px 0px;"></label>
            <div class="container-fluid">
                <div class="jumbotron">

                    <form action="oldcase.php" method="GET" style="text-align: center;">
                        <input type="text" placeholder="กรุณาใส่ชื่อ" name="search" style="font-size:30px; border-radius: 10px 10px 10px 10px;" required>&nbsp;
                        <button type="submit" class="btn btn-outline-primary" style="font-size: 25px; margin:0px 0px 15px 0px">ค้นหา</button>
                    </form>
                    <h2 style="text-align: center; margin-top:30px; margin-bottom:20px;" class="h">รายชื่อผู้ป่วย</h2>
                    <table class="table table-bordered">
                        <?php

                        echo "<tr align='center' bgcolor='#CCCCCC'><td>ชื่อ</td><td>นามสกุล</td><td>เบอร์โทรศัพท์</td><td>วันเดือนปีเกิด</td><td>อายุ</td><td>เพศ</td><td>แก้ไข</td><td>ลบ</td></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td align='center'>" . $row["firstname"] .  "</td> ";
                            echo "<td align='center'>" . $row["lastname"] .  "</td> ";
                            echo "<td align='center'>" . $row["tel"] .  "</td> ";
                            echo "<td align='center'>" . $row["birthday"] .  "</td> ";
                            echo "<td align='center'>" . $row["age"] .  "</td> ";
                            echo "<td align='center'>" . $row["sex"] .  "</td> ";
                            echo "<td align='center'><a href='editdatacase.php?ID=" . $row["id"] . "' class='btn btn-outline-warning'>แก้ไข</a></td> ";
                            echo "<td align='center'><a href='deletedatacase.php?ID=" . $row["id"] . "' class='btn btn-outline-danger' onclick=\"return confirm('คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ? !!!' )\">ลบ</a></td> ";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>