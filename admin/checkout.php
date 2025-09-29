<?php include ('session.php');

include 'fungsi_indotgl.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" shrink-to-fit=no>
        <title>Checkout | Doughlicious</title>
        <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="header"></div>
            <div class="sidebar">
                <div class="titleimage">
                <center><a href="dashboard.php"><img src="../admin/img/Title.png" width="95px" alt="Doughlicious"></a></center>
                </div>
                    <ul>
                        <?php include "sidebar.php" ?>
                    </ul>
            </div>
            <div class="section">

                <h2 class="card-title">Pending Checkout Data for Validation and Shipping</h2>
                <table class="table1">
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Proof</th>
                        <th>Validation</th>
                        <th>Shipping</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>Phone</th>
                    </tr>
                    <?php
                        $no = 1;
                        $admin_id = $_SESSION['id_login'];
                        $produk = mysqli_query($conn, "SELECT admin_name, admin_telp, admin_address, (jml*product_price) AS total, tgl, ck_id, product_name, product_price, product_image, jml, bukti, validasi, status FROM tb_checkout, tb_product, tb_admin WHERE tb_admin.admin_id = tb_checkout.admin_id AND tb_checkout.product_id = tb_product.product_id AND status != 'Selesai' AND status != 'Batal' ");
                        if(mysqli_num_rows($produk) > 0){
                            while ($row = mysqli_fetch_array($produk)) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td>IDR <?php echo number_format($row['product_price'])?></td>
                        <td>
                            <a href="../produk/<?php echo $row['product_image'] ?>" target="_blank">
                            <img src="../produk/<?php echo $row['product_image'] ?>" width="50px">
                            </a>
                        </td>
                        <td><?php echo $row['jml'] ?></td>
                        <td>IDR <?php echo number_format($row['total']) ?></td>
                        <td><?php echo tgl_indo($row['tgl']) ?></td>
                        <td><a href="../bukti_transfer/<?php echo $row['bukti'] ?>" target="_blank"><img src="../bukti_transfer/<?php echo $row['bukti'] ?>" width="50px"></a></td>
                        <?php
                        if ($row['validasi'] == 'Menunggu' || $row['validasi'] == 'Waiting') { ?>
                        <td>
                            <mark><?php echo 'Waiting'; ?></mark><br>
                            <a class="text-black" href="proses_valid.php?ck_id=<?php echo $row['ck_id'] ?>" onclick="return confirm('Are you sure the proof is valid?')">
                                <strong>Valid</strong>
                            </a>
                            <br>
                            <a class="text-black" href="proses_nonvalid.php?ck_id=<?php echo $row['ck_id'] ?>" onclick="return confirm('Are you sure the proof is not valid?')">
                                <strong>Not Valid</strong>
                            </a>
                        </td>
                        <?php } else { ?>
                        <td>
                            <mark>
                                <?php
                                    if ($row['validasi'] == 'Valid') echo 'Valid';
                                    else if ($row['validasi'] == 'Tidak Valid' || $row['validasi'] == 'Not Valid') echo 'Not Valid';
                                    else if ($row['validasi'] == 'Menunggu' || $row['validasi'] == 'Waiting') echo 'Waiting';
                                    else echo $row['validasi'];
                                ?>
                            </mark><br>
                        </td>
                        <?php } ?>
                        <td>
                            <?php
                                if ($row['status'] == 'Menunggu') echo 'Waiting';
                                else if ($row['status'] == 'Dikirim') echo 'Shipped';
                                else echo $row['status'];
                            ?>
                        </td>
                        <td><?php echo $row['admin_name'] ?></td>
                        <td><?php echo $row['admin_address'] ?></td>
                        <td><?php echo $row['admin_telp'] ?></td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo '<tr><td colspan="13" style="text-align:center;">No checkout data found</td></tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>