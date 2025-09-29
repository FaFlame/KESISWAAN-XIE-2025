<?php include('session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Category | Doughlicious</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
        </div>
        <div class="sidebar">
            <div class="titleimage">
            <center><a href="dashboard.php"><img src="../admin/img/Title.png" width="95px" alt="Doughlicious"></a></center>
            </div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <center>
            <h2 class="card-title">Category</h2>
            </center>
            <p><a href="kategori_tambah.php">+Add Data</a></p>
            <table border="1" class="table1" width="100%">
                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                <?php
                $no = 1;
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if (mysqli_num_rows($kategori) > 0) {
                    while ($row = mysqli_fetch_array($kategori)) {
                ?>
                
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td>
                            <a href="kategori_edit.php?id=<?php echo $row['category_id'] ?>">Edit</a> || 
                            <a href="hapus_proses.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                        </td>
                    </tr>
                <?php }
                } else { ?>
                    <tr>
                        <td colspan="3">No data available</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>