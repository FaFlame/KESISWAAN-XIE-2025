<?php include('session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Category | Doughlicious</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
        </div>
        <div class="sidebar">
            <div class="titleimage">
            <center><a href="dashboard.php"><img src="../admin/img/Title.png" width="95px" alt="FaFlame Vinyl"></a></center>
            </div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <div class="container">
                <form action="kategori_proses.php" method="post">
                    <h2>Add Category Data</h2>
                    <fieldset>
                        <input type="text" name="nama" placeholder="... Category Name ..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Add</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>
</html>