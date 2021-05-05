<?php
include("connection.php");
session_start();

if (!$_SESSION['userid']) {
    header("Location: index.php");
} else {

    if ($conn->connect_error) {
        die('Error: ' . $conn->connect_error);
    }
    $sql = "SELECT * FROM newcase";
    if (isset($_GET['search'])) {
        $name = mysqli_real_escape_string($conn, htmlspecialchars($_GET['search']));
        $sql = "SELECT * FROM treatment inner join newcase on treatment.id = newcase.id WHERE firstname LIKE '%" . $name . "%' order by date_appointment DESC";
    }
    $result = $conn->query($sql);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Appointment Page</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/case_page.css">
    </head>

    <body>
        <div class="fonttext">
            <marquee direction="left" style="margin:20px 0px 0px 0px; font-size:80px; color:#000000;">CHINESE MEDICINE CLINIC</marquee>
            <div style="text-align: center;">
                <a class="navbar-text" style="color: #000000;">
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
            </div>

            <h1 style="text-align: center;">You are Case</h1>
            <h3 style="text-align: center;">ยินดีต้อนรับ, คุณ <?php echo $_SESSION['user']; ?></h3>

            <form action="appointmentshow.php" method="GET" style="text-align: center;">
                <input type="text" placeholder="กรุณาใส่ชื่อ" name="search" style="font-size:30px; border-radius: 10px 10px 10px 10px;" required>&nbsp;
                <button type="submit" class="btn btn-outline-success" style="font-size: 25px; margin:0px 0px 15px 0px">ค้นหา</button>

            </form>
            <div style="text-align: center; margin-top:20px;">
                <a href="case_page.php"><button type="button" class="btn btn-outline-primary">กลับหน้าหลัก</button></a>
                <a href="logout.php"><button type="button" class="btn btn-outline-danger">ลงชื่อออก</button></a>
            </div>
        </div>

    </body>

    </html>
<?php } ?>