<?php
include 'session.php';
include '../db.php';
include 'fungsi_indotgl.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Completed Checkout | Doughlicious</title>
    <link rel="stylesheet" type="text/css" href="../css/stylechartchout.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="container">
        <div class="titleimage">
            <a href="dashboard_user.php">
                <img src="../user/img/clear-logo-invert.png" width="95px" alt="Doughlicious">
            </a>
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
        <h3>Completed Checkouts</h3>
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
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Date</th>
                        <th>Proof</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $admin_id = $_SESSION['id_login'];
                    $produk = mysqli_query($conn, "SELECT 
                        (jml * product_price) AS total,
                        tgl,
                        ck_id,
                        category_name,
                        product_name,
                        product_price,
                        product_image,
                        jml,
                        bukti,
                        validasi,
                        status
                        FROM tb_product
                        JOIN tb_category ON tb_category.category_id = tb_product.category_id
                        JOIN tb_checkout ON tb_checkout.product_id = tb_product.product_id
                        WHERE (status = 'Completed') AND admin_id = $admin_id
                    ");
                    if (mysqli_num_rows($produk) > 0) {
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
                        <td><?php echo $row['jml']; ?></td>
                        <td>IDR <?php echo number_format($row['total']); ?></td>
                        <td>Transfer</td>
                        <td><?php echo tgl_indo($row['tgl']); ?></td>
                        <td>
                            <?php if (!empty($row['bukti'])) { ?>
                                <a href="../bukti_transfer/<?php echo $row['bukti']; ?>" target="_blank">
                                    <img src="../bukti_transfer/<?php echo $row['bukti']; ?>" width="50px">
                                </a>
                            <?php } else { echo '-'; } ?>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="10" style="text-align:center;">No completed data yet</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
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