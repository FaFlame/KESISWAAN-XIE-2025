<?php
include '../db.php';
session_start(); 
if (isset($_POST['submit'])) {
    $jmll       = $_POST['jml'];
    $product_id = $_POST['product_id'];
    $admin_id   = $_SESSION['id_login'];
    $stok       = $_POST['stok'];

    if ($stok < $jmll) {
        echo '<script>alert("Insufficient stock")</script>';
        echo '<script>window.location = "produk_user.php"</script>';
    } elseif ($stok == '0') {
        echo '<script>alert("Out of stock")</script>';
        echo '<script>window.location = "produk_user.php"</script>';
    } else {
        $insert = mysqli_query($conn, "INSERT INTO tb_chart VALUES (
            null, '" . $product_id . "', 
            '" . $jmll . "',
            '" . $admin_id . "'
        ) ");

        if ($insert) {
            echo '<script>alert("Product successfully added to cart")</script>';
            echo '<script>window.location = "produk_user.php"</script>';
        } else {
            echo 'Failed: ' . mysqli_error($conn);
        }
    }
}
?>