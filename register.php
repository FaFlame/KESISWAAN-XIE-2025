<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Doughlicious</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
        <div class="box-login">
        <h2>Fill in Your Data</h2>
        <a href="index.php" style="display:inline-block; margin-bottom:15px;">
        <img src="user/img/clear-logo-invert.png" width="95px" alt="Doughlicious Logo">
        </a>
        <form action="" method="POST">
            <input type="text" name="nama" placeholder="Full Name" class="input-control" required>
            <input type="text" name="alamat" placeholder="Address" class="input-control" required>
            <input type="text" name="telpon" placeholder="Phone" class="input-control" required>
            <input type="text" name="email" placeholder="Email" class="input-control" required>
            <hr><br>
            <input type="text" name="user" placeholder="Username" class="input-control" required>
            <input type="password" name="pass" placeholder="Password" class="input-control" required>
            <input type="submit" name="submit" value="Register" class="btn">
        </form>
        <?php
        include('db.php');
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telpon = $_POST['telpon'];
            $email = $_POST['email'];
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (null, '$nama', '$username', '$password', '$telpon', '$email', '$alamat', 'pelanggan')");
            if ($insert) {
                echo "<script>alert('Registration successful, please login')</script>";
                echo '<script type="text/javascript">window.location="login.php"</script>';
            } else {
                echo "<script>alert('Registration failed')</script>";
                echo '<script type="text/javascript">window.location="register.php"</script>';
            }
        }
        ?>
    </div>
</body>
</html>