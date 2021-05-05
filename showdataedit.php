<?php
//1. เชื่อมต่อ database: 
include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT * FROM newcase ORDER BY id asc" or die("Error:" . mysqli_error($result));
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 
?>
<html lang="en">

<head>
    <title>Service Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
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
                    <div class="dropdown-menu" style="background-color: #CD8DB1;">
                        <a class="dropdown-item" href="newcase.php">ผู้ป่วยใหม่</a>
                        <a class="dropdown-item" href="oldcase.php">ผู้ป่วยเก่า</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="logout.php" style="color: #FFFFFF;">ลงชื่อออก
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <table class="table table-striped">
        <?php
        //หัวข้อตาราง
        echo "<tr align='center' bgcolor='#CCCCCC'><td>ชื่อ</td><td>นามสกุล</td><td>เบอร์โทรศัทพ์</td><td>วัน/เดือน/ปีเกิด</td><td>อีเมล์</td><td>แก้ไข</td><td>ลบ</td></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td align='center'>" . $row["id"] .  "</td> ";
            echo "<td align='center'>" . $row["firstname"] .  "</td> ";
            echo "<td align='center'>" . $row["lastname"] .  "</td> ";
            echo "<td align='center'>" . $row["tel"] .  "</td> ";
            echo "<td align='center'>" . $row["birthday"] .  "</td> ";
            //แก้ไขข้อมูล
            echo "<td align='center'>  <a href='editdatacase.php?ID=$row[0]' class='btn btn-outline-warning'>แก้ไข</a></td> ";

            //ลบข้อมูล
            echo "<td align='center'><a href='deletedatacase.php?ID=$row[0]' class='btn btn-outline-danger' onclick=\"return confirm('Do you want to delete this record? !!!')\">ลบ</a></td> ";
            echo "</tr>";
        }
        //5. close connection
        mysqli_close($conn);
        ?></table>
</body>

</html>