<?php 
include('session.php'); 
include 'fungsi_indotgl.php'; 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <title>Completed Checkout | Doughlicious</title> 
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
            <h2 class="card-title">Completed Checkouts</h2> 
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
                    <th>Customer</th> 
                    <th>Address</th> 
                    <th>Phone</th> 
                </tr> 
                <?php 
                $no = 1; 
                $admin_id = $_SESSION['id_login'];
                $produk = mysqli_query($conn, "SELECT 
                    admin_name, 
                    admin_telp, 
                    admin_address, 
                    (jml * product_price) AS total, 
                    tgl, 
                    ck_id, 
                    product_name, 
                    product_price, 
                    product_image, 
                    jml, 
                    bukti, 
                    validasi, 
                    status 
                    FROM tb_product 
                    JOIN tb_checkout ON tb_checkout.product_id = tb_product.product_id 
                    JOIN tb_admin ON tb_admin.admin_id = tb_checkout.admin_id 
                    WHERE status = 'Completed'"); 
                
                if(mysqli_num_rows($produk) > 0) {
                    while ($row = mysqli_fetch_array($produk)) { 
                ?>
                <tr> 
                    <td><?php echo $no++; ?></td> 
                    <td><?php echo $row['product_name']; ?></td> 
                    <td>IDR <?php echo number_format($row['product_price']); ?></td> 
                    <td>
                        <a href="../produk/<?php echo $row['product_image']; ?>" target="_blank">
                            <img src="../produk/<?php echo $row['product_image']; ?>" width="50px">
                        </a>
                    </td> 
                    <td><?php echo $row['jml']; ?></td> 
                    <td>IDR <?php echo number_format($row['total']); ?></td> 
                    <td><?php echo tgl_indo($row['tgl']); ?></td> 
                    <td>
                        <a href="../bukti_transfer/<?php echo $row['bukti']; ?>" target="_blank">
                            <img src="../bukti_transfer/<?php echo $row['bukti']; ?>" width="50px">
                        </a>
                    </td> 
                    <td><?php echo $row['admin_name']; ?></td> 
                    <td><?php echo $row['admin_address']; ?></td> 
                    <td><?php echo $row['admin_telp']; ?></td> 
                </tr> 
                <?php 
                    }
                } else {
                    echo '<tr><td colspan="11" style="text-align:center;">No completed checkout data found</td></tr>';
                }
                ?>
            </table> 
        </div> 
    </div> 
</body> 
</html>