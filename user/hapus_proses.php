<?php
    include '../db.php';

    if(isset($_GET['idc'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_chart WHERE chart_id = '".$_GET['idc']."'");
        echo '<script>alert("Item successfully deleted from cart")</script>';
        echo '<script>window.location = "chart.php"</script>';
    }
?>