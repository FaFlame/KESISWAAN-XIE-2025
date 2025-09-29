<?php
// contoh sederhana login handler
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // cek login dummy (ganti sesuai database kamu)
    if ($email === "admin@sekolah.com" && $password === "123456") {
        $_SESSION["login"] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - ADASISWA</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>

  <div class="container">
    <!-- Panel kiri -->
    <div class="login-panel">
      <div class="logo">
        <img src="../img/logo.png" alt="Logo ADASISWA">
        <h1>ADASISWA</h1>
        <p>Berjiwa satu, membangun karakter siswa</p>
      </div>

      <div class="welcome">
        <h2>Halo Admin!</h2>
        <p>Selamat datang di website kesiswaan</p>
      </div>

      <?php if (!empty($error)): ?>
        <p class="error"><?= $error; ?></p>
      <?php endif; ?>

      <!-- Form login -->
      <form method="POST">
        <div class="input-box">
          <input type="email" name="email" placeholder="E-mail" required>
          <img src="../img/user.png" class="icon" alt="user icon">
        </div>

        <div class="input-box">
          <input type="password" name="password" id="password" placeholder="Password" required>
          <img src="../img/invisible.png" class="icon" id="togglePassword" alt="eye icon">
        </div>

        <div class="options">
          <label><input type="checkbox" name="remember"> Remember me</label>
          <a href="#">Lupa Password?</a>
        </div>

        <button type="submit" class="btn">LOGIN</button>
      </form>

      <!-- Ellipse dekorasi -->
      <div class="ellipse e1"></div>
      <div class="ellipse e2"></div>
      <div class="ellipse e3"></div>
    </div>

    <!-- Panel kanan -->
    <div class="image-panel">
      <img src="../img/loginbg1.png" alt="Sekolah">
    </div>
  </div>

  <script>
    // Toggle password
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);
      this.src = type === "password" ? "../img/invisible.png" : "../img/visible.png";
    });
  </script>
</body>
</html>
