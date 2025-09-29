<?php 
session_start(); 
include '../db.php'; 
?> 
<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Payment | Doughlicious</title>
    <link rel="stylesheet" type="text/css" href="../css/stylechout.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">

            <div class="titleimage">
                <a href="dashboard_user.php"><img src="../user/img/clear-logo-invert.png" width="95px" alt="Doughlicious"></a>
            </div>

            <nav>
                <ul> 
                    <?php include 'navbar.php' ?> 
                </ul> 
            </nav>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <h3>Checkout Products</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1; 
                        $admin_id = $_SESSION['id_login']; 
                        $produk = mysqli_query($conn, "SELECT tb_checkout_temp.product_id, (jml * product_price) AS total, category_name, product_name, product_price, product_image, jml 
                            FROM tb_product 
                            JOIN tb_category ON tb_category.category_id = tb_product.category_id 
                            JOIN tb_checkout_temp ON tb_checkout_temp.product_id = tb_product.product_id 
                            WHERE admin_id = $admin_id");
                        while ($row = mysqli_fetch_array($produk)) { 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td>IDR <?php echo number_format($row['product_price']); ?></td>
                            <td>
                                <a href="../produk/<?php echo $row['product_image']; ?>" target="_blank">
                                    <img src="../produk/<?php echo $row['product_image']; ?>" width="50px">
                                </a>
                            </td>
                            <td align="center"><?php echo $row['jml']; ?></td>
                            <td align="center">IDR <?php echo number_format($row['total']); ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <?php 
                            $produk = mysqli_query($conn, "SELECT SUM(jml) AS jumlah, SUM(jml * product_price) AS total 
                                FROM tb_product 
                                JOIN tb_category ON tb_category.category_id = tb_product.category_id 
                                JOIN tb_checkout_temp ON tb_checkout_temp.product_id = tb_product.product_id 
                                WHERE admin_id = $admin_id");
                            $row = mysqli_fetch_array($produk); 
                            ?>
                            <th colspan="5">Total</th>
                            <th><?php echo $row['jumlah']; ?></th>
                            <th>IDR <?php echo number_format($row['total']); ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <center>
            <h3>Payment</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Bank Account Options:</label><br>
                    <label>BRI 089520984082 </label><br>
                    <label>BNI 089520984082 </label><br>
                    <label>MANDIRI 089520984082 </label><br>
                    <label>BCA 089520984082 </label><br>
                    <label>BSI 089520984082 </label><hr>
                    <label>Upload Transfer Proof</label><br>
                    <input type="file" name="gambar" class="form-control" required>
                    <input type="submit" name="proses" value="Submit" class="btn">
                </form>
            </center>
                <?php
                if (isset($_POST['proses'])) { 
                    $tgl = date('Y-m-d');
                    $filename = $_FILES['gambar']['name']; 
                    $tmp_name = $_FILES['gambar']['tmp_name']; 
                    $type1 = explode('.', $filename); 
                    $type2 = strtolower(end($type1)); 
                    $newname = 'tf' . time() . '.' . $type2; 
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif'); 

                    if (!in_array($type2, $tipe_diizinkan)) { 
                        echo '<script>alert("File format not allowed")</script>';
                    } else { 
                        move_uploaded_file($tmp_name, '../bukti_transfer/' . $newname); 
                        $query = mysqli_query($conn, "SELECT * FROM tb_checkout_temp NATURAL JOIN tb_product"); 
                        while ($r = mysqli_fetch_array($query)) { 
                            $jml = $r['jml']; 
                            $product_price = $r['product_price']; 
                            $total = $jml * $product_price; 
                            $insert = mysqli_query($conn, "INSERT INTO tb_checkout VALUES (null, '{$r['product_id']}', '$jml', '{$r['admin_id']}', '$total', '$newname', 'Waiting', 'Pending', '$tgl')"); 
                            mysqli_query($conn, "UPDATE tb_product SET stok = stok - '$jml' WHERE product_id = '{$r['product_id']}'"); 
                        } 
                        mysqli_query($conn, "TRUNCATE tb_checkout_temp"); 
                        if ($insert) { 
                            echo '<script>alert("Payment Successful")</script>'; 
                            echo '<script>window.location="checkout_data.php"</script>'; 
                        } else { 
                            echo '<script>alert("Payment Failed")</script>'; 
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    $admin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($admin);
    ?>

    <div class="footer">
        <div class="container">
            <h4>Address</h4>
            <p><?php echo $a->admin_address; ?></p>

            <h4>Email</h4>
            <p><?php echo $a->admin_email; ?></p>

            <h4>Phone</h4>
            <p><?php echo $a->admin_telp; ?></p>
            <i><small>Copyright &copy; 2025 - Doughlicious. All Rights Reserved.</small></i>
        </div>
    </div>
</body>
</html>