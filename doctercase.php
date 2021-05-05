<?php include 'connectcase.php';
//แสดงข้อมูล
$server = "localhost";
$user = "root";
$password = "";
$dbName = "project";
$strID = null;

if (isset($_GET["ID"])) {
    $strID = $_GET["ID"];
}
$conn = mysqli_connect($server, $user, $password, $dbName);
$id = "id";
$sql = "SELECT * FROM newcase WHERE ID = '" . $strID . "' ";
$query = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM treatment WHERE ID = '" . $strID . "' ";
$query1 = mysqli_query($conn, $sql1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Docter Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/docter.css">
</head>

<body>
    <div class="fonttext">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <nav class="navbar navbar-expand" style="background-color: #CD8DB1;">
            <a class="navbar-brand" href="docter_page.php" style="color: #FFFFFF;">หน้าหลัก</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="examinationroom.php" style="color: #FFFFFF;">ห้องตรวจโรค
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php" style="color: #FFFFFF;">ลงชื่อออก
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <form method="post" action="showupdate.php">
            <label style="margin: 100px 0px 0px 0px;"></label>
            <div class="container-fluid">
                <div class="jumbotron">
                    <h2 style="text-align: center;" class="h">ข้อมูลการรักษา</h2>
                    <table class="table table-striped">
                        <?php
                        //หัวข้อตาราง
                        echo "<tr align='center' bgcolor='#CCCCCC'><<td>ชื่อ</td><td>นามสกุล</td><td>น้ำหนัก</td><td>ส่วนสูง</td><td>ความดัน</td></tr>";
                        echo "<tr>";
                        $row = mysqli_fetch_array($query);
                        echo "<td align='center'>" . $row["firstname"] .  "</td> ";
                        echo "<td align='center'>" . $row["lastname"] .  "</td> ";
                        $row1 = mysqli_fetch_array($query1);
                        echo "<td align='center'>" . $row1["weight"] .  "</td> ";
                        echo "<td align='center'>" . $row1["height"] .  "</td> ";
                        echo "<td align='center'>" . $row1["perssure"] .  "</td> ";
                        echo "</tr>";
                        mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </div>
        </form>
    </div>
</body>

</html>