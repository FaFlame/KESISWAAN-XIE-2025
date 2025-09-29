<?php include('session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Category | Doughlicious</title>
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
            <div class= "container">
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '". $_GET['id']."'");
                if (mysqli_num_rows($kategori) == 0) {
                    echo '<script>window.location="admin/kategori_data.php"</script>';
                }
                $k = mysqli_fetch_object($kategori);
                ?>
                <form action="" method="post">
                    <h2>Edit Category</h2>
                    <fieldset>
                        <label>Category Name</label>
                        <input type="text" name="nama" value="<?php echo $k->category_name ?>" class="form-control" required>
                    </fieldset>

                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Edit</button>
                    </fieldset>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $nama = ucwords($_POST['nama']);
                    $update = mysqli_query($conn, "UPDATE tb_category SET 
                                                category_name = '$nama' 
                                                WHERE category_id = '$k->category_id'");

                    if ($update) {
                        echo '<script>alert("Category updated successfully") </script>';
                        echo '<script>window.location="kategori_data.php"</script>';
                    } else {
                        echo 'Failed: '. mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>