<?php 

    $conn = mysqli_connect("localhost", "root", "", "project");

    if (!$con) {
        die("Failed to connect to databse " . mysqli_error($con));
    }

?>