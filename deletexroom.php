<?php
include("connection.php");
$row = $_GET['treatment_id'];
$query = "DELETE FROM treatment WHERE treatment_id='$row'";
$data = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
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

<body onload="startTime()">
    <div class="fonttext">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <nav class="navbar navbar-expand" style="background-color: #CD8DB1;">
            <a class="navbar-brand" href="service_page.php" style="color: #FFFFFF;">หน้าหลัก</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF;">ผู้ป่วย</a>
                        <div class="dropdown-menu" style="background-color: #b48ab9;">
                            <a class="dropdown-item" href="newcase.php" style="color: #000000;">ผู้ป่วยใหม่</a>
                            <a class="dropdown-item" href="oldcase.php" style="color: #000000;">ผู้ป่วยเก่า</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="drug.php" style="color: #FFFFFF;">ยา
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
                        <a class="navbar-text" style="color: #FFFFFF; margin-left:10px;">
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
        <label style="margin: 100px 0px 0px 0px;"></label>
        <div class="container-fluid">
            <div class="jumbotron">
                <h2 style="text-align: center;" class="h">ลบข้อมูลเสร็จสิ้น</h2>
                <table class="table table-striped">
            </div>
        </div>
    </div>
</body>

</html>