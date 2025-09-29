<?php
    $conn = mysqli_connect("localhost","root","","");

    if (mysqli_connect_errno()) {
        echo "Database connection failed: " . mysqli_connect_error();
    }
?>