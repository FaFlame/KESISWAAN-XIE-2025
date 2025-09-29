<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'session.php';
include '../db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart | Doughlicious</title>
    <link rel="stylesheet" type="text/css" href="../css/stylechartchout.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
            <h3>Your Cart</h3>
            <div class="box">
                <form method="post" action="">
                    <table border="1" cellspacing="0" class="table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $admin_id = $_SESSION['id_login'];
                            $produk = mysqli_query($conn, "SELECT tb_chart.product_id, (jml*product_price) AS total, chart_id, category_name, 
                                product_name, product_price, product_image, jml
                                FROM tb_product, tb_category, tb_chart
                                WHERE tb_category.category_id=tb_product.category_id AND 
                                tb_chart.product_id=tb_product.product_id AND 
                                admin_id=$admin_id
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
                                <td>
                                    <input type="hidden" name="jml[]" value="<?php echo ($row['jml']); ?>">
                                    <input type="hidden" name="product_id[]" value="<?php echo ($row['product_id']); ?>">
                                    <input type="hidden" name="admin_id[]" value="<?php echo ($admin_id); ?>">
                        
                                    Check out <input type="checkbox" id="checkItem" name="check[]" value="<?php echo ($row['chart_id']); ?>"> ||
                                    <a href="hapus_proses.php?idc=<?php echo $row['chart_id']; ?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo '<tr><td colspan="8" style="text-align:center; height:100px;">Your cart is empty</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <button type="submit" class="btn" style="width:100%" name="save">Check Out Selected</button>
                </form>
                <?php
                if (isset($_POST['save'])) {
                    if(!empty($_POST['check'])) {
                        $checkbox = $_POST['check'];
                        $jml = $_POST['jml'];
                        $product_idd = $_POST['product_id'];
                        $admin_idd = $_POST['admin_id'];
                        
                        for ($i = 0; $i < count($checkbox); $i++) {
                            $check_id = (int)$checkbox[$i];
                            $product_id = (int)$product_idd[$i];
                            $quantity = (int)$jml[$i];
                            $admin_id = (int)$admin_idd[$i];
                            
                            if($check_id > 0 && $product_id > 0 && $quantity > 0 && $admin_id > 0) {
                                mysqli_query($conn, "INSERT INTO tb_checkout_temp VALUES ($check_id, $product_id, $quantity, $admin_id)")
                                    or die(mysqli_error($conn));
                                    
                                mysqli_query($conn, "DELETE FROM tb_chart WHERE chart_id=$check_id")
                                    or die(mysqli_error($conn));
                            }
                        }
                        
                        echo '<script>alert("Checkout Successful")</script>';
                        echo '<script>window.location="checkout.php"</script>';
                    } else {
                        echo '<script>alert("Please select products to check out first")</script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

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