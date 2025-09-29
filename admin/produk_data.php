<?php include ('session.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | Doughlicious</title>
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
            <?php include 'sidebar.php'?>
        </ul>
    </div>

    <div class="section">
        <center>
        <h2 class="card-title">Product Data</h2>
        </center>
        <p> <a href="produk_tambah.php"> +Add Data </a></p>
        <table  border="1" class="table1" width="100%">
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Product Details</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1;
            $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
            if(mysqli_num_rows($produk) > 0) {
                while($row = mysqli_fetch_array($produk)) {
            ?>
                    <tr>
                        <td> <?php echo $no++; ?> </td>

                        <td> <?php echo $row['category_name']; ?> </td>

                        <td> <?php echo $row['product_name']; ?> </td>

                        <td> <?php echo $row['product_description']; ?> </td>

                        <td>IDR <?php echo number_format ($row['product_price']); ?> </td>

                        <td> <?php echo $row['stok']; ?> </td>

                        <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="../produk/<?php echo $row['product_image'] ?>" width="150px"> </a></td>
                        
                        <td> <?php echo ($row['product_status'] == 0) ? 'Inactive' : 'Active'; ?> </td>

                        <td>
                            <a href="produk_edit.php?id=<?php echo $row ['product_id'] ?>"> Edit </a> || <a href="hapus_proses.php?idp=<?php echo $row ['product_id'] ?>" onclick="return confirm('Are you sure you want to delete this product?')"> Delete </a>
                        </td>
                    </tr>
                 <?php }
                 } else { ?>
                    <tr>
                        <td colspan="9">No Data Available</td>
                    </tr>
                <?php } ?>
        </table>
    </div>
    </div>

</body>
</html>