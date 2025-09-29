<?php include ('session.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Doughlicious</title>
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
                <?php include'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <h2 class="card-title">Customer Cart</h2>
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Product Category</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php
                $no = 1;
                $produk = mysqli_query($conn, "SELECT admin_name, (jml*product_price) AS total, chart_id, category_name, product_name, product_price, product_image, jml
                    FROM tb_product, tb_category, tb_chart, tb_admin
                    WHERE tb_category.category_id=tb_product.category_id AND
                    tb_chart.product_id=tb_product.product_id AND
                    tb_admin.admin_id=tb_chart.admin_id
                ");
                if(mysqli_num_rows($produk) > 0){
                    while($row = mysqli_fetch_array($produk)){
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['admin_name'] ?></td>
                    <td><?php echo $row['category_name'] ?></td>
                    <td><?php echo $row['product_name'] ?></td>
                    <td>IDR <?php echo number_format($row['product_price']) ?></td>
                    <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="../produk/<?php echo $row['product_image']?>" width="50px"></a></td>
                    <td><?php echo $row['jml'] ?></td>
                    <td>IDR <?php echo number_format($row['total']) ?></td>
                </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="8" style="text-align:center;">No cart data found</td></tr>';
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>