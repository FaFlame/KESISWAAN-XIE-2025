<?php include ('session.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Doughlicious</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>

        <div class="sidebar">
            <div class="titleimage">
            <center><a href="dashboard.php"><img src="../admin/img/Title.png" width="95px" alt="FaFlame Vinyl"></a></center>
            </div>
            <ul>
                <?php include 'sidebar.php'?>
            </ul>
        </div>

        <div class="section">
            <div class="container">
                <?php 
                    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION ['id_login'] . "'");
                    $d = mysqli_fetch_array($query);
                    ?>
                    
                    <h2>Add Product Data</h2>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <fieldset>
                            <label>Category Name</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">--Select--</option>
                                <?php
                                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                while($r = mysqli_fetch_array($kategori)) {
                                ?>
                                    <option value="<?php echo $r ['category_id'] ?>"><?php echo $r ['category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </fieldset>

                        <fieldset>
                            <label>Product Name</label>
                            <input type="text" name="nama" placeholder="Product Name..." class="form-control" required>
                        </fieldset>

                        <fieldset>
                            <label>Product Price</label>
                            <input type="text" name="harga" placeholder="Product Price..." class="form-control" required>
                        </fieldset>

                        <fieldset>
                            <label>Product Stock</label>
                            <input type="number" name="stok" placeholder="Product Stock..." class="form-control" required>
                        </fieldset>

                        <fieldset>
                            <label>Product Image</label>
                            <input type="file" name="gambar" placeholder="Product Image..." class="form-control" required>
                        </fieldset>

                        <fieldset>
                            <label>Product Description</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Product Description..."></textarea> <br>
                        </fieldset>

                        <fieldset>
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">--Select--</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </fieldset>

                        <fieldset>
                            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Add</button>
                        </fieldset>
                    
                    </form>

                    <?php
                    if(isset($_POST['submit'])) {
                        $kategori  = $_POST['kategori'];
                        $nama      = $_POST['nama'];
                        $harga     = $_POST['harga'];
                        $stok      = $_POST['stok'];
                        $deskripsi = $_POST['deskripsi'];
                        $status    = $_POST['status'];

                        $filename  = $_FILES['gambar']['name'];
                        $tmp_name  = $_FILES['gambar']['tmp_name'];

                        $type1     = explode('.', $filename);
                        $type2     = $type1[1];
                        $newname   = 'produk' . time(). '.' .$type2;

                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                        if(!in_array($type2, $tipe_diizinkan)) {
                            echo '<script>alert("File format not allowed")</script>';
                        } else {
                            move_uploaded_file($tmp_name, '../produk/' . $newname);

                            $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (null, '$kategori', '$nama', '$harga', '$deskripsi', '$newname', '$status',null, '$stok')");

                            if($insert) {
                                echo '<script>alert("Data added successfully")</script>';
                                echo '<script>window.location="produk_data.php"</script>';
                            } else {
                                echo 'Failed: ' .mysqli_error($conn);
                            }
                        }
                    }
                    ?>
                    
            </div>
        </div>
    </div>
</body>
</html>