<?php

session_start();

if (!$_SESSION['userid']) {
    header("Location: index.php");
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Case Page</title>
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

    <body onload="startTime()" id="gradient">
        <div class="fonttext">
            <marquee direction="left" style="margin:70px 0px 0px 0px; font-size:90px; color:#000000;">CHINESE MEDICINE CLINIC</marquee>
            <div style="text-align: center;">
                <a class="navbar-text" style="color: #000000; font-size:30px">
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
            <script>
                var TxtType = function(el, toRotate, period) {
                    this.toRotate = toRotate;
                    this.el = el;
                    this.loopNum = 0;
                    this.period = parseInt(period, 10) || 2000;
                    this.txt = '';
                    this.tick();
                    this.isDeleting = false;
                };

                TxtType.prototype.tick = function() {
                    var i = this.loopNum % this.toRotate.length;
                    var fullTxt = this.toRotate[i];

                    if (this.isDeleting) {
                        this.txt = fullTxt.substring(0, this.txt.length - 1);
                    } else {
                        this.txt = fullTxt.substring(0, this.txt.length + 1);
                    }

                    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

                    var that = this;
                    var delta = 200 - Math.random() * 100;

                    if (this.isDeleting) {
                        delta /= 2;
                    }

                    if (!this.isDeleting && this.txt === fullTxt) {
                        delta = this.period;
                        this.isDeleting = true;
                    } else if (this.isDeleting && this.txt === '') {
                        this.isDeleting = false;
                        this.loopNum++;
                        delta = 500;
                    }

                    setTimeout(function() {
                        that.tick();
                    }, delta);
                };

                window.onload = function() {
                    var elements = document.getElementsByClassName('typewrite');
                    for (var i = 0; i < elements.length; i++) {
                        var toRotate = elements[i].getAttribute('data-type');
                        var period = elements[i].getAttribute('data-period');
                        if (toRotate) {
                            new TxtType(elements[i], JSON.parse(toRotate), period);
                        }
                    }
                    // INJECT CSS
                    var css = document.createElement("style");
                    css.type = "text/css";
                    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #000000}";
                    document.body.appendChild(css);
                };
            </script>
            <div style="text-align: center; font-size:40px;margin-top:30px; color:#000000;">
                <a class="typewrite" data-period="2000" data-type='[ "ยินดีต้อนรับ","สวัสดี คุณ <?php echo $_SESSION['user']; ?>"  ]'>
                    <span class="wrap"></span>
                </a>
            </div>
            <div style="text-align: center; margin-top: 30px; font-size:30px;">
                <a href="appointment.php"><button type="button" class="btn btn-outline-primary">วันที่หมอนัด</button></a>
                <a href="logout.php"><button type="button" class="btn btn-outline-danger">ลงชื่อออก</button></a>

            </div>
        </div>
    </body>

    </html>


<?php } ?>