<?php
include("connection.php");
session_start();

if (!$_SESSION['userid']) {
    header("Location: index.php");
} else {
    $sql = "SELECT * FROM newcase";
    if (isset($_GET['search'])) {
        $name = mysqli_real_escape_string($conn, htmlspecialchars($_GET['search']));
        $sql = "SELECT * FROM treatment inner join newcase on treatment.id = newcase.id WHERE firstname LIKE '%" . $name . "%' order by date_appointment DESC";
    }
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
        <marquee direction="left" style="margin:20px 0px 0px 0px; font-size:90px; color:#000000;">CHINESE MEDICINE CLINIC</marquee>
        <h1 style="text-align: center;">You are Case</h1>
        <h3 style="text-align: center;">ยินดีต้อนรับ, คุณ <?php echo $_SESSION['user']; ?></h3>
        <label style="margin: 30px 0px 0px 0px;"></label>
        <div class="container-fluid">
            <div class="jumbotron">
                <table class="table table-bordered">
                    <?php
                    echo "<tr align='center' bgcolor='#CCCCCC'><td>ชื่อ</td><td>นามสกุล</td><td>วันที่เข้ารับการรักษา</td><td>วันนัดครั้งถัดไป</td></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td align='center'>" . $row["firstname"] .  "</td> ";
                        echo "<td align='center'>" . $row["lastname"] .  "</td> ";
                        echo "<td align='center'>" . $row["date_data"] .  "</td> ";
                        echo "<td align='center'>" . $row["date_appointment"] .  "</td> ";
                    }
                    ?>
                </table>
                <div style="text-align: center; margin-top: 50px;">
                    <a href="appointment.php"><button type="button" class="btn btn-outline-primary">กลับไปยังหน้าค้นหา</button></a>
                    <a href="logout.php"><button type="button" class="btn btn-outline-danger">ลงชื่อออก</button></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>