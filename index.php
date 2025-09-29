<?php 
error_reporting(0); 
include 'db.php';

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1"); 
$a = mysqli_fetch_object($kontak); 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Welcome | Doughlicious</title> 
    <link rel="stylesheet" type="text/css" href="css/styleindex.css"> 
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet"> 
    <script>
    window.onload = function() {
        window.scrollTo(0, 0);
    };
    </script>
</head> 
<body> 

    <div class="video-container">
        <video autoplay muted loop id="bg-video" playsinline>
            <source src="video/bg-video.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

    <header> 
        <div class="container"> 
            <div class="titleimage">
                <a href="index.php"><img src="user/img/clear-logo-invert.png" width="95px" alt="Doughlicious"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </nav>
        </div> 
    </header> 
    <br>

    <div class="carousel-container" style="justify-content: center;">
        <button class="carousel-button left" onclick="moveSlide(-1)">&#10094;</button>
        <div class="carousel">
            <div class="carousel-item"><img src="banner/1.png" alt="Banner 1"></div>
            <div class="carousel-item"><img src="banner/2.png" alt="Banner 2"></div>
            <div class="carousel-item"><img src="banner/3.png" alt="Banner 3"></div>
        </div>
        <button class="carousel-button right" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <center>
    <div class="search"> 
        <div class="container"> 
            <form action="index.php" method="get"> 
                <input type="text" name="search" placeholder="Search Product" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>"> 
                <input type="submit" name="cari" value="Search Product"> 
            </form> 
        </div> 
    </div>
    </center>

    <center>
    <div style="text-align:center; margin: 30px 0 10px 0;">
    <p style="font-size:1.2em;">
        Welcome to Doughlicious – where every pastry is a piece of art.<br>
        <a href="register.php" class="btn" style="margin:0 10px;">Register</a>
        or
        <a href="login.php" class="btn" style="margin:0 10px;">Log In</a>
        to continue your delicious journey.
    </p>
    </div>
    </center>

    <div class="section">
        <div class="container">
            <h2><span class="category-label">Category</span></h2>
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
                            <p class="category-label"><?php echo $k['category_name'] ?></p>
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
            <h2><span class="category-label">Products</span></h2>
            <div class="box">
                <?php
                $where = "";
                if (!empty($_GET['search'])) {
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    $where = "AND product_name LIKE '%$search%'";
                }
                $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
                        <div class="col-4">
                            <img src="produk/<?php echo $p['product_image'] ?>" width="400px">
                            <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                            <p class="harga">IDR <?php echo number_format($p['product_price']) ?> (Stock <?php echo $p['stok'] ?>)</p>
                            <a href="login.php" class="btn" style="margin-top:10px;">Login to Buy</a>
                        </div>
                    <?php }
                    } else { ?>
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
        let index = 0;
        function moveSlide(step) {
            const items = document.querySelectorAll('.carousel-item');
            index = (index + step + items.length) % items.length;
            document.querySelector('.carousel').style.transform = `translateX(-${index * 100}%)`;
        }
    </script>
</body>
</html>