<?php
session_start();
require_once "connectcase.php";
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
  <form method="post" action="showdatacase.php">
    <div class="fonttext">
      <script>
        function autoTab(obj) {
          var pattern = new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
          var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
          var returnText = new String("");
          var obj_l = obj.value.length;
          var obj_l2 = obj_l - 1;
          for (i = 0; i < pattern.length; i++) {
            if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
              returnText += obj.value + pattern_ex;
              obj.value = returnText;
            }
          }
          if (obj_l >= pattern.length) {
            obj.value = obj.value.substr(0, pattern.length);
          }
        }
      </script>
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
        <marquee direction="left" style="font-size: 50px; margin:20px 0px 0px 0px; color:aliceblue; color:#ffffff;">CHINESE MEDICINE
          CLINIC</marquee>
        <div class="container-fluid">
          <div class="col-75">
            <div class="jumbotron">
              <div style="text-align: center; font-size :30px; margin-bottom:20px;">
                <a>เพิ่มข้อมูล</a>
              </div>
              <div class="form-inline" style="font-size:20px;"><br>
                <label for="firstname" style="margin:0px 10px 0px 10px;">ชื่อ :</label>
                <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="firstname" required maxlength="30" placeholder="ชื่อ">

                <label for="lastname" style="margin:0px 10px 0px 10px;">นามสกุล :</label>
                <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="lastname" required maxlength="30" placeholder="นามสกุล">

                <label for="tel" style="margin:0px 10px 0px 10px;">โทรศัพท์ :</label>
                <input type="tel" class="form-control" name="tel" id="tel" aria-describedby="tel" required maxlength="10" placeholder="0123456789">

                <label for="birthday" style="margin:0px 10px 0px 10px;">วัน/เดือน/ปีเกิด
                  :</label>
                <input type="date" class="form-control" name="birthday" id="birthday" aria-describedby="birthday" required maxlength="8" value="<?= date('d-m-y') ?>">
                <label for="age" style="margin:0px 10px 0px 10px;">อายุ :</label>
                <input type="number" class="form-control" name="age" id="age" aria-describedby="age" required maxlength="3" placeholder="ปี" size=3 onkeypress="return enforcechar(this, 3)">
              </div>


              <div class="col-75">
                <div class="col-75"><br>
                  <div class="form-inline" style="font-size:20px;">
                    <label for="ID_card" style="margin:0px 10px 0px 10px;">เลขที่บัตรประชาชน
                      :</label>
                    <input type="text" class="form-control" name="ID_card" id="ID_card" aria-describedby="ID_card" size=15 onkeyup="autoTab(this, 15)">

                    <label class="my-1 mr-2" for="sex">&nbsp;&nbsp;เพศ</label>
                    <select class="custom-select my-1 mr-sm-2" id="sex" name="sex">
                      <option selected value="ไม่ระบุ">Choose...</option>
                      <option value="ชาย">ชาย</option>
                      <option value="หญิง">หญิง</option>
                    </select>
                  </div>
                </div>
                <br>
                <div class="form-group" style="font-size:20px;">
                  <label for="address">ที่อยู่ :</label>
                  <textarea class="form-control" id="address" rows="3" input type="text" name="address" maxlength="200" onkeyup="return ismaxlength(this)"></textarea><br>


                  <label for="congenital">โรคประจำตัว :</label>
                  <textarea class="form-control" id="congenital" rows="3" input type="text" name="congenital" maxlength="200" onkeyup="return ismaxlength(this)"></textarea>

                  <label for="Drug_allergy">แพ้ยา :</label>
                  <textarea class="form-control" id="Drug_allergy" rows="3" input type="text" name="Drug_allergy" maxlength="200" onkeyup="return ismaxlength(this)"></textarea>
                </div>
                <div style="text-align:center;">
                  <br> <button type="submit" class="btn btn-outline-success">บันทึก</button>
                  <button type="reset" class="btn btn-outline-danger">ยกเลิก</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

</body>

</html>