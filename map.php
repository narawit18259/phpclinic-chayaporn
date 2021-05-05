<?php

session_start();
require_once "connection.php";
error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Map Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!--Animation-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>
    <div class="animate__animated animate__bounceIn">
        <div class="fonttext">
            <div style="text-align: center;" class="animate__animated animate__bounceIn">
                <img src="pict/acupuncture (2).png" width="50" height="50" style="margin-bottom: 30px;"></img>
                <h class="header1"> CHINESE MEDICINE CLINIC </h>
                <img src="pict/acupuncture.png" width="50" height="50" style="margin-bottom: 30px;"></img>
            </div>

            <div style="text-align: center;">
                <h2>MAP</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1925.091823665521!2d99.69271965799697!3d15.203112997355296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTXCsDEyJzExLjIiTiA5OcKwNDEnMzcuNyJF!5e0!3m2!1sth!2sth!4v1616477172746!5m2!1sth!2sth" width="1700" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div><br>
            <div style="text-align: center;">
                <a href="index.php">
                    <button type="button" class="btn btn-outline-primary" name="map">หน้าหลัก</button>
                </a>
            </div>
        </div>
    </div>
</body>

</html>