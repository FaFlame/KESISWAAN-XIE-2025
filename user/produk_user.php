<?php 
error_reporting(0); 
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
    <title>Products | Doughlicious</title> 
    <link rel="stylesheet" type="text/css" href="../css/styleprodukuser.css"> 
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet"> 

    <script>
    window.onload = function() {
        window.scrollTo(0, 0);
    };
    document.addEventListener("DOMContentLoaded", function() {
        console.log(document.activeElement);
    });
    </script>
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
    <br>
    
    <center>
        <div class="search"> 
            <div class="container"> 
                <form action="produk_user.php"> 
                    <input type="text" name="search" placeholder="Search Product" value="<?php echo $_GET['search'] ?>"> 
                    <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>"> 
                    <input type="submit" name="cari" value="Search Product"> 
                </form> 
            </div> 
        </div>
    </center>

    <div class="carousel-container" style="justify-content: center;">
        <button class="carousel-button left" onclick="moveSlide(-1)">&#10094;</button>
        <div class="carousel">
            <div class="carousel-item"><img src="../banner/1.png" alt="Banner 1"></div>
            <div class="carousel-item"><img src="../banner/2.png" alt="Banner 2"></div>
            <div class="carousel-item"><img src="../banner/3.png" alt="Banner 3"></div>
        </div>
        <button class="carousel-button right" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <div class="section">
        <div class="container">
            <h2>Category</h2>
            <div class="box">
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if (mysqli_num_rows($kategori) > 0) {
                    while ($k = mysqli_fetch_array($kategori)) {
                        $img = 'logo.png'; // default
                        if (stripos($k['category_name'], 'cake') !== false) {
                            $img = 'cake.png';
                        } else if (stripos($k['category_name'], 'cookie') !== false) {
                            $img = 'cookies.png';
                        } else if (stripos($k['category_name'], 'pastry') !== false) {
                            $img = 'pastry.png';
                        }
                ?>
                <div class="col-4">
                    <img src="img/<?php echo $img ?>" width="50px" style="margin-bottom: 5px;">
                    <p><?php echo $k['category_name'] ?></p>
                </div>
                <?php 
                    } 
                } else { 
                ?>
                    <p>No categories available</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h2>Products</h2>
            <div class="box">
                <?php
                if ($_GET['search'] !='' || $_GET['kat'] !='') {
                    $where = "AND product_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['kat'] . "%' ";
                }

                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
                <div class="col-4">
                    <a href="detail_produk_user.php?id=<?php echo $p['product_id'] ?>" title="Product Details"></a>
                    <img src="../produk/<?php echo $p['product_image'] ?>" width="400px">
                    <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                    <p class="harga">IDR <?php echo number_format($p['product_price']) ?> (Stock <?php echo $p['stok'] ?>)</p>
                    <form action="chart_proses.php" method="POST">
                        <input type="hidden" name="product_id" class="form-control" value="<?php echo $p['product_id']; ?>">
                        <input type="hidden" name="stok" class="form-control" value="<?php echo $p['stok']; ?>">
                        <input type="hidden" name="admin_id" class="form-control" value="<?php echo $_SESSION['admin_id']; ?>">
                        <input type="number" name="jml" style="width: 40px;" autofocus required min="1">
                        <button type="submit" name="submit" title="Add to cart">+</button>
                    </form>
                </div>
                <?php 
                    }
                } else { 
                ?>
                    <center><p style="color: #d4a373">No products available</p></center>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <center>
            <div class="container">
                <h4>Address</h4>
                <p><?php echo $a->admin_address ?></p>
                <h4>Email</h4>
                <p><?php echo $a->admin_email ?></p>
                <h4>Phone</h4>
                <p><?php echo $a->admin_telp ?></p>
                <i><small>Copyright &copy; 2025 - Doughlicious. All Rights Reserved.</small></i>
            </div>
        </center>
    </div>
    
    <script>
        //rumus carousel
        let index = 0;
        function moveSlide(step) {
            const items = document.querySelectorAll('.carousel-item');
            index = (index + step + items.length) % items.length;
            document.querySelector('.carousel').style.transform = `translateX(-${index * 100}%)`;
        }
        
        //listener buat tombol keyboard
        document.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowLeft') {
                moveSlide(-1);
            } else if (event.key === 'ArrowRight') {
                moveSlide(1);
            }
        });
    </script>
</body>
</html>