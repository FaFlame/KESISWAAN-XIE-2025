<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit - Admin Bimbingan</title>
    <link rel="stylesheet" href="../sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<style>
		:root {
			--sidebar-bg: #fff;
			--sidebar-bg-dark: #581B1B;
			--sidebar-hover: #a04a4a;
			--sidebar-active: #581B1B;
			--card-border: #DCDCDC;
			--button-main: #843737;
			--button-main-hover: #581B1B;
			--input-bg: #f5f5f5;
			--input-border: #ccc;
			--table-row-alt: #f5f5f5;
		}
		body {
			margin: 0;
			font-family: 'Poppins', Arial, sans-serif;
			background: var(--main-bg);
		}
		.main-content {
			margin-left: 313px;
			min-height: 100vh;
			background: #fff;
		}
		.topbar {
			display: flex;
			align-items: center;
			background: var(--sidebar-bg);
			padding: 0 0 0 2rem;
			height: 88.8px;
		}
		.menu-icon { width: 2rem; }
		.search-bar { flex: 1; display: flex; align-items: center; }
		.search-bar input {
			width: 260px;
			padding: 11px 16px;
			border-radius: 6px;
			border: 1.5px solid #DBD0D0;
			font-size: 1em;
			outline: none;
			box-shadow: 0px 5px 5px rgba(0,0,0,0.37);
		}
		.content-wrapper {
			position: relative;
			display: flex;
			flex-direction: column;
			align-items: center;
		}
        .banner-box{
            z-index: 0;
            position: absolute;
            width: 100%;
            height: 271px;
            background-color: #953636;
        }

		/* === Card Form Edit Berita === */
		.card-form {
			margin-top: 5rem;
			background: #fff;
			border: 2px solid var(--card-border);
			border-radius: 8px;
			padding: 32px;
            padding-top: 10px;
			margin-bottom: 32px;
			z-index: 1;
			width: 90%;
			box-shadow: 0 2px 8px #0001;
		}
		.card-form h2 {
			font-size: 1.4em;
			font-weight: 700;
			margin-bottom: 20px;
			color: #333;
		}
		.card-form input[type="text"], 
		.card-form textarea, 
		.card-form input[type="date"] {
            margin-left: -10px;
			width: 100%;
			padding: 10px 14px;
			border-radius: 5px;
			border: 1.5px solid var(--input-border);
			background: var(--input-bg);
			font-size: 1em;
			margin-bottom: 18px;
			color: #222;
			font-family: inherit;
		}
		.card-form textarea { min-height: 60px; resize: vertical; }

		.card-form .file-upload {
			display: flex;
			width: fit-content;
			align-items: center;
			gap: 10px;
			margin-bottom: 18px;
		}
		.card-form .file-upload label {
			background: var(--input-bg);
			border-radius: 20px;
			padding: 8px 18px;
			font-weight: 600;
			cursor: pointer;
			display: flex;
			align-items: center;
			gap: 8px;
			font-size: 1em;
		}
		.card-form .file-upload input[type="file"] { display: none; }

		.card-form .submit-btn {
			background: var(--button-main);
			color: #fff;
			font-size: 1em;
			font-weight: 600;
			border: none;
			border-radius: 20px;
			padding: 10px 24px;
			float: right;
			cursor: pointer;
			transition: background 0.2s;
		}
		.card-form .submit-btn:hover { background: var(--button-main-hover); }

		@media (max-width: 900px) {
			.main-content { padding: 20px; margin-left: 0; }
			.sidebar { position: static; width: 100%; height: auto; }
			.topbar { padding-left: 0; }
			.card-form { width: 98vw; }
		}
	</style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="profile">
                <div class="profile-img"><i class="fas fa-user"></i></div>
                <div class="profile-info">
                    <h3>M. AUFA RAHMAN</h3>
                    <p><img src="/img/location-dot-solid-full (1).svg" alt="" class="location-icon" style="width:12px;height:12px;filter:invert(1);"> Admin Bimbingan</p>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-item"><a href="#"><i class="fas fa-home" style="margin-right: 10px;"></i> Home</a></div>
            <div class="nav-item active"><a href=""><i class="fas fa-hands-helping" style="margin-right: 10px;"></i> Bimbingan</a></div>
            <div class="nav-item"><a href="#"><i class="fas fa-user-circle" style="margin-right: 10px;"></i> Profil</a></div>
            <div class="nav-item">
                <form action="" method="POST" style="display: inline;">
                    <a href="#" onclick="this.parentElement.submit(); return false;">
                        <i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i> Logout
                    </a>
                </form>
            </div>
        </nav>
    </div>

	<!-- Main Content -->
	<div class="main-content">
		<div class="topbar">
			<div class="menu-icon"><img src="/img/bars-solid-full.svg" alt="" style="width: 100%;"></div>
			<div class="search-bar"><input type="text" placeholder="Search"></div>
		</div>

		<div class="content-wrapper">
            <div class="banner-box"></div>

			<!-- Card Form Edit Berita -->
			<div class="card-form">
				<h2>Edit Berita</h2>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="text" name="judul" placeholder="Judul baru">
					<textarea name="deskripsi" placeholder="Deskripsi baru"></textarea>
					<input type="date" name="tanggal">

					<div class="file-upload">
						<label for="fileInput">
							<span><i class="fas fa-cloud-upload-alt"></i></span> Pilih file
						</label>
						<input type="file" id="fileInput" name="file">
					</div>

					<button type="submit" class="submit-btn">Terbitkan ulang</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
