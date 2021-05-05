<?php 

    $conn = mysqli_connect("localhost", "root", "", "project");

    if (!$conn) {
        die("Failed to connect to databse " . mysqli_error($conn));
    }

?>