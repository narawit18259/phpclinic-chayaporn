<?php

session_start();

require_once "connection.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    if ($user['username'] === $username) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        $passwordenc = md5($password);

        $query = "INSERT INTO user (username, password, firstname, lastname, userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', 'c')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = "Insert user successfully";
            header("Location: index.php");
        } else {
            $_SESSION['error'] = "Something went wrong";
            header("Location: index.php");
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body onload="startTime()">
    <div class="fonttext">
        <div class="animate__animated animate__bounceIn">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <a class="navbar-text" style="color: #000000; margin-left:10px; font-size:20px">
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
                        </a>
                    </div>
                    <div class="col-5">
                    </div>
                    <div class="col" style="font-size: 20px;text-align:right;">
                        คลินิกการประกอบวิชาชีพสาขาการแพทย์แผนจีน <br>
                        105 ม.5 ต.เมืองการุ้ง อ.บ้านไร่ จ.อุทัยธานี 61180 <br>
                        โทรศัทพ์ 091-3337628 
                    </div>
                </div>
            </div>
        </div>
        <span class="sr-only">(current)</span>

        <div style="text-align: center;">
            <img src="pict/logo.png" width="250px" height="250px">
        </div>
        <div style="text-align: center; font-size:50px" class="animate__animated animate__bounceIn">
            <img src="pict/acupuncture (2).png" width="50" height="50" style="margin-bottom: 30px;"></img>
            <h> CHINESE MEDICINE CLINIC </h>
            <img src="pict/acupuncture.png" width="50" height="50" style="margin-bottom: 30px;"></img>
        </div>

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <strong>สมัครเสร็จสิ้น</strong>
            </div>
        <?php endif; ?>


        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <?php
                echo $_SESSION['error'];
                ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="margin-bottom: 50px;">
            <script>
                //limit should be an integer representing max # of characters form element accepts
                function enforcechar(what, limit) {
                    if (what.value.length >= limit)
                        return false
                }
            </script>
            <div class="container">
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-6">
                        <div class="form-outline" style="font-size: 20px;">
                            <label for="username" class="form-label">Username</label>
                            <input style="font-size:20px;" class="form-control" type="text" name="username" placeholder="Username" required size=50 onkeypress="return enforcechar(this, 50)">
                            <br>
                        </div>

                        <div class="form-outline" style="font-size: 20px;">
                            <label for="password" class="form-label">password</label>
                            <input style="font-size:20px;" class="form-control" type="password" name="password" placeholder="password" required size=50 onkeypress="return enforcechar(this, 50)">
                            <br>
                        </div>

                        <div class="form-outline" style="font-size: 20px;">
                            <label for="firstname" class="form-label">Firstname</label>
                            <input style="font-size:20px;" class="form-control" type="text" name="firstname" placeholder="firstname" required size=50 onkeypress="return enforcechar(this, 50)">
                            <br>
                        </div>

                        <div class="form-outline" style="font-size: 20px;">
                            <label for="lastname" class="form-label">Lastname</label>
                            <input style="font-size:20px;" class="form-control" type="text" name="lastname" placeholder="lastname" required size=50 onkeypress="return enforcechar(this, 50)">
                            <br>
                        </div>

                        <div style="text-align: center;">

                            <button type="submit" name="submit" class="btn btn-outline-primary btn-lg" onclick="alert('สมัครเสร็จสิ้น')">Register</button>
                        </div>
                        <div style="font-size: 20px;margin-top:20px">
                            <p>Already a member? <a href="index.php">Sign In</a></p>
                        </div>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
</body>

</html>
<?php

if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
    session_destroy();
}

?>