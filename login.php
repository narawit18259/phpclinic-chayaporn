<?php
$conn = mysqli_connect("localhost", "root", "", "project");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
session_start();
error_reporting(E_ALL);
if (isset($_POST['username'])) {
    include('connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordenc = md5($password);

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$passwordenc'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION['userid'] = $row['id'];
        $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
        $_SESSION['userlevel'] = $row['userlevel'];

        if ($_SESSION['userlevel'] == 'd') {
            header("Location: docter_page.php");
        }

        if ($_SESSION['userlevel'] == 's') {
            header("Location: service_page.php");
        }
        if ($_SESSION['userlevel'] == 'c') {
            echo "alert('ลงชื่อเข้าใช้สำเร็จ')";
            header("Location: case_page.php");
        }
    } else {
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
            <link rel="stylesheet" href="css/docter.css">
            <!--Animation-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        </head>

        <body>
            <div class="fonttext">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">

                        </div>
                        <div class="col-sm" style="margin-top: 200px;">
                            <div style="text-align: center;"><img src="pict/authentication.png" width="150px" height="150px"></div><br><span class="badge badge-danger" style="font-size: 15px;">Danger</span><label style="margin-left: 10px; font-size: 15px;">Username หรือ Password ไม่ถูกต้อง</label><br>
                            <p style="font-size: 15px;">ยังไม่มีบัญชี ? <a href="register.php" style="font-size: 15px;">สร้างบัญชีใหม่</a></p>
                            <a href="index.php" style="font-size: 15px;">กลับไปยังหน้า Login</a>

                        </div>
                        <div class="col-sm">
                        </div>
                    </div>
                </div>
            </div>
        </body>
<?php
    }
} else {
    header("Location: index.php");
}


?>