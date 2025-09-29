<?php include('session.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product | Doughlicious</title>
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
                <?php include 'sidebar.php'; ?>
            </ul>
        </div>

        <div class="section">
            <div class="container">
                <?php
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] ."' ");
                    if (mysqli_num_rows($produk) == 0) {
                        echo '<script>window.location="produk_data.php"</script>';
                    }
                    $p = mysqli_fetch_object($produk);
                    ?>
                <h2>Edit Product Data</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <label>Category Name</label>
                        <select class="form-control" name="kategori" required>
                            <option value="">--Select--</option>
                            <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while ($r = mysqli_fetch_array($kategori)) {
                                ?>
                                   <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id) ? 'selected' : ''; ?>><?php echo $r['category_name'] ?></option>
                                <?php  } ?>
                        </select>
                    </fieldset> 
                    <fieldset>
                        <label>Product Name</label>
                        <input type="text" name="nama" value="<?php echo $p->product_name ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Price</label>
                        <input type="text" name="harga"  value="<?php echo $p->product_price ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Stock</label>
                        <input type="number" name="stok"  value="<?php echo $p->product_stok ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Image</label>
                        <img src="../produk/<?php echo $p->product_image ?>" width="100px"> <input type="hidden" name="foto" value="<?php echo $p->product_image ?>"> <input type="file" name="gambar" placeholder="...Product Image..." class="form-control">
                    </fieldset>
                    <fieldset>
                        <label>Product Description</label>
                        <textarea class="form-control" name="deskripsi"><?php echo $p->product_description ?></textarea> <br>
                    </fieldset>
                    <fieldset>
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="">--Select--</option>
                            <option value="1"<?php echo($p->product_status == 1) ? 'selected' : ''; ?>>Active</option>
                            <option value="0"<?php echo($p->product_status == 0) ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Update</button>
                    </fieldset>
                </form>
                <?php
                if (isset ($_POST['submit'])) {
                    $kategori   = $_POST['kategori'];
                    $nama       = $_POST['nama'];
                    $harga      = $_POST['harga'];
                    $stok       = $_POST['stok'];
                    $deskripsi  = $_POST['deskripsi'];
                    $status     = $_POST['status'];
                    $foto       = $_POST['foto'];

                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    if ($filename != '') {
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'produk' . time() . '.' . $type2;
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');

                        if (!in_array($type2, $tipe_diizinkan)) {
                            echo '<script>alert("File format not allowed")</script>';
                        } else {
                            unlink('../produk/' . $foto);
                            move_uploaded_file($tmp_name, '../produk/' . $newname);
                            $namagambar = $newname;
                        }
                    } else {
                        $namagambar = $foto;                    
                    }
                    
                    $update = mysqli_query($conn, "UPDATE tb_product SET 
                    category_id = '" . $kategori . "',
                    product_name = '" . $nama . "', 
                    product_price = '" . $harga . "',  
                    product_description = '" . $deskripsi . "', 
                    product_image = '" . $namagambar . "', 
                    stok = '" . $stok . "',
                    product_status = '" . $status . "' 
                    WHERE product_id = '" . $p->product_id . "' ");

                    if ($update) {
                        echo '<script>alert("Product updated successfully")</script>';
                        echo '<script>window.location="produk_data.php"</script>';
                    } else {
                        echo 'Failed: ' . mysqli_error($conn);
                    }

                }
                ?>    
                    
            </div>
        </div>
    </div>
</body>
</html>