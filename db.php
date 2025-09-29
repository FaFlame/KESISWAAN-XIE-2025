<?php
    $conn = mysqli_connect("localhost","root","","doughlicious");

    if (mysqli_connect_errno()) {
        echo "Database connection failed: " . mysqli_connect_error();
    }
?>