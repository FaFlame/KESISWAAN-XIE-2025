<?php
    include '../db.php';

    if(isset($_GET['ck_id'])) {
        $update = mysqli_query($conn, "UPDATE tb_checkout SET status='Completed' WHERE ck_id = '".$_GET['ck_id']."' ");
        echo '<script>window.location="selesai.php"</script>';
    }
?>