<?php
//1. เชื่อมต่อ database: 
include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

$strID = null;

if (isset($_GET["ID"])) {
  $strID = $_GET["ID"];
}

$server = "localhost";
$user = "root";
$password = "";
$dbName = "project";

$conn = mysqli_connect($server, $user, $password, $dbName);

$sql = "SELECT * FROM `treatment` INNER JOIN newcase ON treatment.id = newcase.id";

$sql1 = "SELECT * FROM newcase WHERE ID = '" . $strID . "' ";

$query = mysqli_query($conn, $sql1);

$result = mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<html lang="en">

<head>
  <title>Examinationroom Page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/docter.css">
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
            <a class="nav-link" href="docter_page.php" style="color: #FFFFFF;">หน้าหลัก
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="examinationroom.php" style="color: #FFFFFF;">ห้องตรวจโรค
              <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="Medical_certificate.php" style="color: #FFFFFF;">ใบรับรองแพทย์
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



                function clock() { // We create a new Date object and assign it to a variable called "time".
                  var time = new Date(),

                    // Access the "getHours" method on the Date object with the dot accessor.
                    hours = time.getHours(),

                    // Access the "getMinutes" method with the dot accessor.
                    minutes = time.getMinutes(),


                    seconds = time.getSeconds();

                  document.querySelectorAll('.clock')[0].innerHTML = "เวลา " + harold(hours) + ":" +
                    harold(minutes) + ":" + harold(seconds) + " น.";

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

                document.write("วัน" + thday[now.getDay()] + "ที่ " + now.getDate() + " " + thmonth[now.getMonth()] + " " + (0 + now.getFullYear() + 543));
              </script>
              <div class="clock"></div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="animate__animated animate__fadeIn">
      <div style="text-align: center;">
        <label style="margin: 70px 0px 50px 0px; font-size:40px; color:#ffffff;">เพิ่มข้อมูล</label>
      </div>
      <form method="post" action="exroomsave.php">
        <script>
          //limit should be an integer representing max # of characters form element accepts
          function enforcechar(what, limit) {
            if (what.value.length >= limit)
              return false
          }
        </script>
        <div class="container">
          <div class="jumbotron">
            <table class="table table-striped" style="font-size: 20px;">
              <tr style="text-align:center; background-color:#CCCCCC">
                <td>ชื่อ</td>
                <td>นามสกุล</td>
                <td>เพศ</td>
                <td>โรคประจำตัว</td>
                <td>ปี/เดือน/วันเกิด</td>
                <td>อายุ</td>
                <td>เบอร์โทรศัทพ์</td>
              </tr>
              <td style="text-align: center;"><?php echo $result["firstname"]; ?></td>
              <td style="text-align: center;"><?php echo $result["lastname"]; ?></td>
              <td style="text-align: center;"><?php echo $result["sex"]; ?></td>
              <td style="text-align: center;"><?php echo $result["congenital"]; ?></td>
              <td style="text-align: center;"><?php echo $result["birthday"]; ?></td>
              <td style="text-align: center;"><?php echo $result["age"]; ?></td>
              <td style="text-align: center;"><?php echo $result["tel"]; ?></td>
            </table>
            <tr>
              <th width="100"></th>
              <td><input type="hidden" name="id" value="<?php echo $result["id"]; ?>" readonly> </td>
            </tr>
            <div class="form-inline" style="font-size:20px;"><br>
              <label for="weight" style="margin:0px 10px 0px 10px;">น้ำหนัก :</label>
              <input type="number" class="form-control" name="weight" id="weight" aria-describedby="weight" required maxlength="3" size=3 onkeypress="return enforcechar(this, 3)">

              <label for="height" style="margin:0px 10px 0px 10px;">ส่วนสูง :</label>
              <input type="number" class="form-control" name="height" id="height" aria-describedby="height" required maxlength="3" size=3 onkeypress="return enforcechar(this, 3)">

              <label for="perssure" style="margin:0px 10px 0px 10px;">ความดัน :</label>
              <input type="number" class="form-control" name="perssure" id="perssure" aria-describedby="perssure" required maxlength="8" size=8 onkeypress="return enforcechar(this, 8)">
            </div>

            <td><input type="hidden" name="id" value="<?php echo $result["id"]; ?>" readonly>
              </tr>
              <label for="symptoms" style="margin-top:20px ; font-size:20px;">อาการ :</label>
              <textarea class="form-control" id="symptoms" rows="5" input type="text" name="symptoms" size=200 onkeypress="return enforcechar(this, 200)"></textarea><br>
              <div style="text-align:center;">

                <div class="col-sm">
                  <label style="font-size: 20px;">วิธีการรักษา</label><br>
                  <div class="form-inline">
                    <div style="text-align:center;" class="form-inline">
                      <label class="my-1 mr-2" for="sex">ฝังเข็มรมยา</label>
                      <select class="custom-select my-1 mr-sm-2" id="Af" name="Af">
                        <option selected value="0">ไม่ระบุ</option>
                        <option value="300">ทำการรักษา</option>
                      </select>
                    </div>

                    <div style="text-align:center;" class="form-inline">
                      <label class="my-1 mr-2" for="sex">ฝังเข็มความสวยงาม</label>
                      <select class="custom-select my-1 mr-sm-2" id="Beauty_acupuncture" name="Beauty_acupuncture">
                        <option selected value="0">ไม่ระบุ</option>
                        <option value="300">ทำการรักษา</option>
                      </select>
                    </div>

                    <div style="text-align:center;" class="form-inline">
                      <label class="my-1 mr-2" for="sex">ฝังเข็มลดความอ้วน</label>
                      <select class="custom-select my-1 mr-sm-2" id="Acupuncture_weight_loss" name="Acupuncture_weight_loss">
                        <option selected value="0">ไม่ระบุ</option>
                        <option value="350">ทำการรักษา</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-inline">
                    <div style="text-align:center;" class="form-inline">
                      <label class="my-1 mr-2" for="sex">ครอบแก้ว</label>
                      <select class="custom-select my-1 mr-sm-2" id="Cover_glass" name="Cover_glass">
                        <option selected value="0">ไม่ระบุ</option>
                        <option value="150">ทำการรักษา</option>
                      </select>
                    </div>

                    <div style="text-align:center;" class="form-inline">
                      <label class="my-1 mr-2" for="sex">นวดทุยหนา</label>
                      <select class="custom-select my-1 mr-sm-2" id="Thick_Thui_Massage" name="Thick_Thui_Massage">
                        <option selected value="0">ไม่ระบุ</option>
                        <option value="500">ทำการรักษา</option>
                      </select>
                    </div>

                    <div style="text-align:center;" class="form-inline">
                      <label class="my-1 mr-2" for="sex">กัวซา</label>
                      <select class="custom-select my-1 mr-sm-2" id="Guasa" name="Guasa">
                        <option selected value="0">ไม่ระบุ</option>
                        <option value="150">ทำการรักษา</option>
                      </select>
                    </div>
                  </div>
                </div>
                <br>

                <div class="input-group mb-3">
                  <div class="input-group-text">
                    <label style="font-size: 16px; margin-right:10px">ยาจีน :</label>
                    <input type="number" class="form-control" name="chinese_medicine" value="0" id="chinese_medicine" aria-describedby="chinese_medicine" maxlength="5" size=5 onkeypress="return enforcechar(this, 5)">
                  </div>
                </div>

                <div class="col-75"><br>
                  <div class="form-inline" style="font-size:20px;">
                    <label for="date_appointment" style="margin:0px 10px 0px 10px;">วันนัดครั้งถัดไป :</label>
                    <input type="date" class="form-control" name="date_appointment" id="date_appointment" aria-describedby="date_appointment" maxlength="8">
                  </div>

                  <br> <button type="submit" class="btn btn-outline-success">บันทึก</button>
                  <a href="examinationroom.php"><button type="button" class="btn btn-outline-danger" name="cencle">ยกเลิก</button></a>
                </div>
              </div>
            </td>
          </div>
        </div>
      </form>
      <div style="margin-bottom: 30px;">
      </div>
    </div>
  </div>
</body>