<?php include ('session.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | Doughlicious</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar">
            <div class="titleimage">
                <center>
                    <a href="dashboard.php">
                        <img src="../admin/img/Title.png" width="95px" alt="Doughlicious">
                    </a>
                </center>
            </div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <center>
                <h1>Welcome, Admin: <?php echo $user_row["admin_name"]?></h1>
            </center>
        </div>
    </div>
</body>
</html>