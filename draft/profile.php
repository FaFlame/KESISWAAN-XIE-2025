
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profil Admin</title>
	<link rel="stylesheet" href="sidebar.css">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<style>
		body {
			margin: 0;
			font-family: 'Poppins', Arial, sans-serif;
			background: #fff;
		}
		
		   .main-content {
			   margin-left: 313px;
			   padding: 40px 40px 40px 40px;
			   min-height: 100vh;
			   background: #fff;
		   }
		   @media (max-width: 900px) {
			   .main-content { padding: 20px; margin-left: 0; }
			   .sidebar { position: static; width: 100%; height: auto; }
		   }
		.profile-header {
			background: #fff;
			border: 3px solid #DCDCDC;
			border-radius: 8px;
			padding: 40px 32px 40px 32px;
			display: flex;
			align-items: center;
			margin-bottom: 32px;
		}
		.profile-header .avatar {
			width: 110px;
			height: 110px;
			border-radius: 50%;
			background: #eee;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 70px;
			margin-right: 32px;
		}
		.profile-header .profile-details {
			display: flex;
			flex-direction: column;
		}
		.profile-header .profile-details .name {
			font-size: 2.2em;
			font-weight: 700;
			margin-bottom: 4px;
		}
		.profile-header .profile-details .role {
			font-size: 1.2em;
			color: #666;
			display: flex;
			align-items: center;
		}
		.profile-header .profile-details .role i {
			margin-right: 6px;
		}
		.card {
			background: #fff;
			border: 3px solid #DCDCDC;
			border-radius: 8px;
			padding: 28px 32px 24px 32px;
			margin-bottom: 24px;
		}
		.card h2 {
			font-size: 1.5em;
			font-weight: 700;
			margin-bottom: 18px;
		}
		.card label {
			color: #888;
			font-size: 1.1em;
			margin-bottom: 6px;
			display: block;
		}
		.card .input-view {
			background: #f5f5f5;
			border: none;
			border-radius: 5px;
			padding: 10px 14px;
			font-size: 1.1em;
			font-weight: 600;
			margin-bottom: 18px;
			width: 100%;
			color: #222;
		}
		@media (max-width: 900px) {
			.main-content { padding: 20px; margin-left: 0; }
			.sidebar { position: static; width: 100%; height: auto; }
		}
	</style>
</head>
<body style="margin:0;">
		<div class="sidebar">
            <div class="sidebar-header">
                <div class="profile">
                    <div class="profile-img">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="profile-info">
                        <h3>M. AUFA RAHMAN</h3>
                        <p><img src="/img/location-dot-solid-full (1).svg" alt="" class="location-icon" style="width:12px;height:12px;filter:invert(1);">Admin Ekskul</p>
                    </div>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a href="#"><i class="fas fa-home" style="margin-right: 10px;"></i> Home</a>
                </div>
                    <div class="nav-item">
                        <a href=""><i class="fas fa-hands-helping" style="margin-right: 10px;"></i> Bimbingan</a>
                    </div>
                    <div class="nav-item">
                        <a href=""><i class="fas fa-trophy" style="margin-right: 10px;"></i> Prestasi</a>
                    </div>
                    <div class="nav-item">
                        <a href=""><i class="fas fa-calendar-alt" style="margin-right: 10px;"></i> Ekskul</a>
                    </div>
                <div class="nav-item active">
                    <a href=""><i class="fas fa-user-circle" style="margin-right: 10px;"></i> Profil</a>
                </div>
                <div class="nav-item">
                    <form action="" method="POST" style="display: inline;">
                        <a href="#" onclick="this.parentElement.submit(); return false;">
                            <i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i> Logout
                        </a>
                    </form>
                </div>
            </nav>
        </div>
        

		<div class="main-content" style="flex:1;min-width:0;">
		<div class="profile-header">
			   <div class="avatar" style="width:110px;height:110px;border-radius:50%;background:#eee;display:flex;align-items:center;justify-content:center;overflow:hidden;">
				   <!-- <img src="../img/user.png" alt="User" style="width:100px;height:100px;object-fit:cover;"> -->
			   </div>
			<div class="profile-details">
				<div class="name">M. AUFA RAHMAN</div>
				<div class="role"><i class="fa fa-map-marker"></i> Admin Ekskul</div>
			</div>
		</div>
		<div class="card">
			<h2>Informasi Pribadi</h2>
			<label>Alamat E-Mail</label>
			<div class="input-view">aufa123@gmail.com</div>
			<label>No. Telp</label>
			<div class="input-view">000000000000</div>
		</div>
		<div class="card">
			<h2>Sosial Media</h2>
			<label>Instagram</label>
			<div class="input-view">https://www.instagram.com/mhmmd_kmalll</div>
			<label>Facebook</label>
			<div class="input-view">https://www.facebook.com/mhmmd_kmalll</div>
		</div>
	</div>
</div>

<div id="logoutModal" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);justify-content:center;align-items:center;">
	<div style="background:#fff;padding:48px 32px 36px 32px;border-radius:6px;box-shadow:0 2px 16px #0002;min-width:400px;max-width:90vw;text-align:center;">
		<div style="font-size:2em;font-weight:500;margin-bottom:36px;color:black;">YAKIN INGIN LOGOUT?</div>
		<div style="display:flex;justify-content:center;gap:32px;">
			<button id="logoutYes" style="background:#7cf34a;color:#111;font-size:2em;font-weight:600;padding:8px 38px;border:none;border-radius:6px;box-shadow:0 2px 4px #0001;cursor:pointer;">YA</button>
			<button id="logoutNo" style="background:#d81c1c;color:#111;font-size:2em;font-weight:600;padding:8px 28px;border:none;border-radius:6px;box-shadow:0 2px 4px #0001;cursor:pointer;">TIDAK</button>
		</div>
	</div>
</div>
<script>
// Show modal on logout click
document.getElementById('logoutBtn').onclick = function(e) {
	e.preventDefault();
	document.getElementById('logoutModal').style.display = 'flex';
	document.body.style.overflow = 'hidden';
}
// Hide modal on TIDAK
document.getElementById('logoutNo').onclick = function() {
	document.getElementById('logoutModal').style.display = 'none';
	document.body.style.overflow = '';
}
// Redirect or handle logout on YA
document.getElementById('logoutYes').onclick = function() {
	window.location.href = '../login.html'; // Ganti ke proses logout jika ada
}
</script>
<script>
// Show modal on logout click
document.getElementById('logoutBtn').onclick = function(e) {
	e.preventDefault();
	document.getElementById('logoutModal').style.display = 'flex';
	document.body.style.overflow = 'hidden';
}
// Hide modal on TIDAK
document.getElementById('logoutNo').onclick = function() {
	document.getElementById('logoutModal').style.display = 'none';
	document.body.style.overflow = '';
}
// Redirect or handle logout on YA
document.getElementById('logoutYes').onclick = function() {
	window.location.href = '../login.html'; // Ganti ke proses logout jika ada
}
</script>
<script>
// Show modal on logout click
document.getElementById('logoutBtn').onclick = function(e) {
	e.preventDefault();
	document.getElementById('logoutModal').style.display = 'flex';
	document.body.style.overflow = 'hidden';
}
// Hide modal on TIDAK
document.getElementById('logoutNo').onclick = function() {
	document.getElementById('logoutModal').style.display = 'none';
	document.body.style.overflow = '';
}
// Redirect or handle logout on YA
document.getElementById('logoutYes').onclick = function() {
	window.location.href = '../login.html'; // Ganti ke proses logout jika ada
}
</script>
<script>
// Show modal on logout click
document.getElementById('logoutBtn').onclick = function(e) {
	e.preventDefault();
	document.getElementById('logoutModal').style.display = 'flex';
	document.body.style.overflow = 'hidden';
}
// Hide modal on TIDAK
document.getElementById('logoutNo').onclick = function() {
	document.getElementById('logoutModal').style.display = 'none';
	document.body.style.overflow = '';
}
// Redirect or handle logout on YA
document.getElementById('logoutYes').onclick = function() {
	window.location.href = '../login.html'; // Ganti ke proses logout jika ada
}
</script>

</body>
</html>
