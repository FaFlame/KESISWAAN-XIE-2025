<?php
include '../db.php';

$nama = $_POST['nama'];

$insert = mysqli_query($conn, "insert into tb_category values('', '$nama')");

if ($insert) {
    echo '<script>alert("Data added successfully") </script>';
    echo '<script>window.location="kategori_data.php"</script>';
} else {
    echo 'Failed: ' . mysqli_error($conn); 
}