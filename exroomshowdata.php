<?php
include("connection.php");
session_start();

$strID = null;

if (isset($_GET["ID"])) {
    $strID = $_GET["ID"];
}
$sql = "SELECT * FROM treatment inner join newcase on treatment.id = newcase.id where treatment.id = '$strID' order by treatment_id desc  " or die("Error:" . mysqli_error());

$query = mysqli_query($conn, $sql);

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Examinationroom Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/case_page.css">
    <!--Animation-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body onload="startTime()" style="margin-top: 0px;" id="gradient">
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
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="docter_page.php" style="color: #FFFFFF;">????????????????????????
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="examinationroom.php" style="color: #FFFFFF;">?????????????????????????????????
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="Medical_certificate.php" style="color: #FFFFFF;">???????????????????????????????????????
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php" style="color: #FFFFFF;">???????????????????????????
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>


                </ul>
                <ul class="nav justify-content-end">
                    <li class="nav-item active">
                        <a class="navbar-text" style="color: #FFFFFF; margin-right:30px;">
                            <script language="javascript">
                                now = new Date();
                                var thday = new Array("?????????????????????", "??????????????????",
                                    "??????????????????", "?????????", "???????????????", "???????????????", "???????????????");
                                var thmonth = new Array("??????????????????", "??????????????????????????????", "??????????????????",
                                    "??????????????????", "?????????????????????", "????????????????????????", "?????????????????????", "?????????????????????", "?????????????????????",
                                    "??????????????????", "???????????????????????????", "?????????????????????");



                                function clock() { // We create a new Date object and assign it to a variable called "time".
                                    var time = new Date(),

                                        // Access the "getHours" method on the Date object with the dot accessor.
                                        hours = time.getHours(),

                                        // Access the "getMinutes" method with the dot accessor.
                                        minutes = time.getMinutes(),


                                        seconds = time.getSeconds();

                                    document.querySelectorAll('.clock')[0].innerHTML = "???????????? " + harold(hours) + ":" +
                                        harold(minutes) + ":" + harold(seconds) + " ???.";

                                    function harold(standIn) {
                                        if (standIn < 10) {
                                            standIn = '0' + standIn
                                        }
                                        return standIn;
                                    }
                                }
                                setInterval(clock, 1000);

                                function checkTime(i) {
                                    if (i < 10) {
                                        i = "0" + i;
                                    }
                                    return i;
                                }

                                document.write("?????????" + thday[now.getDay()] + "????????? " + now.getDate() + " " + thmonth[now.getMonth()] + " " + (0 + now.getFullYear() + 543));
                            </script>
                            <div class="clock"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <marquee direction="left" style="font-size:90px; color:#ffffff;">CHINESE MEDICINE CLINIC</marquee>
        <div class="container-fluid">
            <div class="jumbotron">
                <table class="table table-bordered">
                    <?php
                    echo "<tr align='center' bgcolor='#CCCCCC'><td>????????????????????????????????????????????????????????????</td><td>????????????????????????????????????????????????</td><td>????????????</td><td>?????????????????????</td><td>???????????????</td><td>?????????????????????</td><td>?????????????????????</td><td>?????????????????????</td><td>?????????????????????????????????</td><td>???????????????????????????????????????????????????</td><td>???????????????????????????????????????????????????</td><td>????????????????????????</td><td>???????????????????????????</td><td>???????????????</td><td>???????????????</td></tr>";
                   
                    while ($row = $result->fetch_assoc()) {

                        

                        echo "<td align='center'>" . $row["date_data"] .  "</td> ";
                        echo "<td align='center'>" . $row["date_appointment"] .  "</td> ";
                        echo "<td align='center'>" . $row["firstname"] .  "</td> ";
                        echo "<td align='center'>" . $row["lastname"] .  "</td> ";
                        echo "<td align='center'>" . $row["symptoms"] .  "</td> ";
                        echo "<td align='center'>" . $row["weight"] . " ??????.".  "</td> ";
                        echo "<td align='center'>" . $row["height"] . " ??????.". "</td> ";
                        echo "<td align='center'>" . $row["perssure"] .  "</td> ";
                        if ($row["Af"] == "300") {
                            echo "<td align='center'>" . "<img src='pict/check.png' width='50' height='50'></img>" . "</td> ";
                        }else{
                            echo "<td align='center'>" . "<img src='pict/delete.png' width='50' height='50'></img>" . "</td> ";
                        }

                        if ($row["Beauty_acupuncture"] == "300") {
                            echo "<td align='center'>" . "<img src='pict/check.png' width='50' height='50'></img>" . "</td> ";
                        }else{
                            echo "<td align='center'>" . "<img src='pict/delete.png' width='50' height='50'></img>" . "</td> ";
                        }
                        
                        if ($row["Acupuncture_weight_loss"] == "350") {
                            echo "<td align='center'>" . "<img src='pict/check.png' width='50' height='50'></img>" . "</td> ";
                        }else{
                            echo "<td align='center'>" . "<img src='pict/delete.png' width='50' height='50'></img>" . "</td> ";
                        }

                        if ($row["Cover_glass"] == "150") {
                            echo "<td align='center'>" . "<img src='pict/check.png' width='50' height='50'></img>" . "</td> ";
                        }else{
                            echo "<td align='center'>" . "<img src='pict/delete.png' width='50' height='50'></img>" . "</td> ";
                        }

                        if ($row["Thick_Thui_Massage"] == "500") {
                            echo "<td align='center'>" . "<img src='pict/check.png' width='50' height='50'></img>" . "</td> ";
                        }else{
                            echo "<td align='center'>" . "<img src='pict/delete.png' width='50' height='50'></img>" . "</td> ";
                        }
                        
                        if ($row["Guasa"] == "150") {
                            echo "<td align='center'>" . "<img src='pict/check.png' width='50' height='50'></img>" . "</td> ";
                        }else{
                            echo "<td align='center'>" . "<img src='pict/delete.png' width='50' height='50'></img>" . "</td> ";
                        }
                        
                        if ($row["chinese_medicine"] > "0") {
                            echo "<td align='center'>" . "<img src='pict/check.png' width='50' height='50'></img>" . "</td> ";
                        }else{
                            echo "<td align='center'>" . "<img src='pict/delete.png' width='50' height='50'></img>" . "</td> ";
                        }
                        
                        echo "<tr>";
                    } ?>
                </table>
                <div style="text-align: center; margin-top: 50px;">
                    <?php echo "<a href='exroom.php?ID=" . $strID . "' class='btn btn-outline-primary'>?????????????????????????????????</a>"; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>