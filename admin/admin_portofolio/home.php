<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home - Admin Portofolio</title>
	<link rel="stylesheet" href="../sidebar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
	<style>
		:root {
			--sidebar-bg: #ffffffff;
			--sidebar-bg-dark: #581B1B;
			--sidebar-hover: #a04a4a;
			--sidebar-active: #581B1B;
			--sidebar-border: #fff2;
			--main-bg: #fff;
			--card-border: #DCDCDC;
			--button-main: #843737;
			--button-main-hover: #581B1B;
			--button-disabled: #ccc;
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
			background: var(--main-bg);
		}

		.topbar {
			display: flex;
			align-items: center;
			background: var(--sidebar-bg);
			padding: 0 0 0 2rem;
			height: 88.8px;
		}

		.menu-icon {
			width: 2rem;
		}

		.content-wrapper {
			position: relative;
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		/* Tambahan headline + box statistik */
		.headline {
			margin-top: 3.5rem;
			/* lebih jauh ke bawah */
			margin-bottom: 1.5rem;
			font-size: 1.5rem;
			font-weight: normal;
			color: #fff;
			z-index: 2;
			text-align: left;
			/* rata kiri */
			width: 89%;
			margin-left: 0;
			font-family: 'Aclonica', Arial, sans-serif;
			/* pastikan tidak center */
		}

		.stats-boxes {
			display: flex;
			gap: 20px;
			justify-content: center;
			margin-bottom: 2.5rem;
			width: 90%;
			z-index: 2;
		}

		.stat-card {
			margin-top: 30px;
			flex: 1;
			background: #fff;
			border: 2px solid var(--card-border);
			border-radius: 8px;
			box-shadow: 0 2px 8px #0001;
			padding: 20px;
			min-width: 200px;
			transition: transform 0.2s ease;
			font-family: 'Poppins', Arial, sans-serif;
		}

		.stat-card:hover {
			transform: translateY(-5px);
		}

		.stat-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			font-size: 1.1em;
			font-weight: 600;
			margin-bottom: 20px;
			color: #333;
			font-family: 'Poppins', Arial, sans-serif;
		}

		.stat-header img.stat-icon {
			width: 24px;
			height: 24px;
			object-fit: contain;
		}

		.stat-body {
			display: flex;
			gap: 30px;
			justify-content: space-around;
			font-family: 'Poppins', Arial, sans-serif;
		}

		.stat-item {
			text-align: center;
			flex: 1;
			font-family: 'Poppins', Arial, sans-serif;
		}

		.stat-number {
			font-size: 2em;
			font-weight: 700;
			color: #000;
			margin-bottom: 8px;
			font-family: 'Poppins', Arial, sans-serif;
		}

		.stat-divider {
			width: 1px;
			height: 60px;
			background: #ddd;
			margin: 0 10px;
		}

		.stat-label {
			font-size: 0.9em;
			color: #666;
			font-family: 'Poppins', Arial, sans-serif;
		}

		.card-form {
			margin-top: 5rem;
			background: #fff;
			border: 2px solid var(--card-border);
			border-radius: 8px;
			padding: 32px 32px 24px 32px;
			margin-bottom: 32px;
			z-index: 1;
			width: 90%;
			box-shadow: 0 2px 8px #0001;
		}

		.card-form input[type="text"],
		.card-form textarea,
		.card-form input[type="date"] {
			width: 100%;
			padding: 10px 14px;
			border-radius: 5px;
			border: 1.5px solid var(--input-border);
			background: var(--input-bg);
			font-size: 1.1em;
			margin-bottom: 18px;
			color: #222;
			font-family: inherit;
		}

		.card-form textarea {
			min-height: 60px;
			resize: vertical;
		}

		.card-form .input-row {
			display: flex;
			gap: 16px;
		}

		.card-form .input-row input[type="date"] {
			flex: 1;
		}

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
			font-size: 1.1em;
		}

		.card-form .file-upload input[type="file"] {
			display: none;
		}

		.card-form .submit-btn {
			background: var(--button-main);
			color: #fff;
			font-size: 1.1em;
			font-weight: 600;
			border: none;
			border-radius: 20px;
			padding: 8px 28px;
			float: right;
			cursor: pointer;
			transition: background 0.2s;
		}

		.card-form .submit-btn:hover {
			background: var(--button-main-hover);
		}

		.table-card {
			background: #fff;
			border: 2px solid var(--card-border);
			border-radius: 8px;
			box-shadow: 0 2px 8px #0001;
			margin-bottom: 32px;
			overflow-x: auto;
			z-index: 1;
			width: 90%;
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 12px 8px;
			text-align: center;
			font-size: 1.1em;
		}

		th,
		td:first-child {
			text-align: left;
		}

		th {
			text-align: center;
			background: #fff;
			font-weight: 700;
			border-bottom: 2px solid #ccc;
		}

		tr:nth-child(even) {
			background: var(--table-row-alt);
		}

		tr:nth-child(odd) {
			background: #fff;
		}

		.table-actions {
			display: flex;
			justify-content: center;
			gap: 10px;
			align-items: center;
		}

		.table-actions i {
			cursor: pointer;
			font-size: 1.2em;
		}

		.banner-box {
			z-index: 0;
			position: absolute;
			width: 100%;
			height: 271px;
			background-color: #953636;
		}

		.upload-icon {
			height: 20px;
		}

		.form-action-row {
			display: flex;
			justify-content: space-between;
			align-items: center;
			gap: 16px;
			margin-bottom: 0;
		}

		.form-action-row .file-upload {
			margin-bottom: 0;
		}

		.form-action-row .submit-btn {
			float: none;
		}

		@media (max-width: 900px) {
			.main-content {
				padding: 20px;
				margin-left: 0;
			}

			.sidebar {
				position: static;
				width: 100%;
				height: auto;
			}

			.topbar {
				padding-left: 0;
			}

			.card-form,
			.table-card {
				width: 98vw;
			}

			.stats-boxes {
				flex-direction: column;
				align-items: center;
			}
		}
	</style>
</head>

<body>
	<div class="sidebar">
		<div class="sidebar-header">
			<div class="profile">
				<div class="profile-img">
					<i class="fas fa-user"></i>
				</div>
				<div class="profile-info">
					<h3>admin</h3>
					<p><img src="/img/location-dot-solid-full (1).svg" alt="" class="location-icon" style="width:12px;height:12px;filter:invert(1);">Admin Portofolio</p>
				</div>
			</div>
		</div>

		<nav class="sidebar-nav">
			<div class="nav-item active">
				<a href="#"><i class="fas fa-home" style="margin-right: 10px;"></i> Home</a>
			</div>
			<div class="nav-item">
				<a href=""><i class="fas fa-hands-helping" style="margin-right: 10px;"></i> Portofolio</a>
			</div>
			<div class="nav-item">
				<a href=""><i class="fas fa-user-circle" style="margin-right: 10px;"></i> Profil</a>
			</div>
		</nav>
	</div>
	<div class="main-content">
		<div class="topbar">
			<div class="menu-icon"><img src="/img/bars-solid-full.svg" alt="" style="width: 100%;"></div>
		</div>
		<div class="content-wrapper">
			<div class="banner-box"></div>

			<!-- tulisan kosong (sengaja biar ada spacing) -->
			<h2 class="headline"> ‎ </h2>

			<div class="stats-boxes">
				<div class="stat-card">
					<div class="stat-header">
						<span>Angkatan 25</span>
						<img src="/img/Vector.svg" alt="Angkatan 25" class="stat-icon">
					</div>
					<div class="stat-body">
						<div class="stat-item">
							<div class="stat-number">0</div>
							<div class="stat-label">Total prestasi</div>
						</div>
						<div class="stat-divider"></div>
						<div class="stat-item">
							<div class="stat-number">0</div>
							<div class="stat-label">Total JIWA</div>
						</div>
					</div>
				</div>

				<div class="stat-card">
					<div class="stat-header">
						<span>Angkatan 26</span>
						<img src="/img/Vector.svg" alt="Angkatan 26" class="stat-icon">
					</div>
					<div class="stat-body">
						<div class="stat-item">
							<div class="stat-number">0</div>
							<div class="stat-label">Total prestasi</div>
						</div>
						<div class="stat-divider"></div>
						<div class="stat-item">
							<div class="stat-number">0</div>
							<div class="stat-label">Total JIWA</div>
						</div>
					</div>
				</div>

				<div class="stat-card">
					<div class="stat-header">
						<span>Angkatan 27</span>
						<img src="/img/Vector.svg" alt="Angkatan 27" class="stat-icon">
					</div>
					<div class="stat-body">
						<div class="stat-item">
							<div class="stat-number">0</div>
							<div class="stat-label">Total prestasi</div>
						</div>
						<div class="stat-divider"></div>
						<div class="stat-item">
							<div class="stat-number">0</div>
							<div class="stat-label">Total JIWA</div>
						</div>
					</div>
				</div>
			</div>

			<div class="table-card">
				<table>
					<tbody>
						<tr>
							<td>1</td>
							<td>SPMB 26/27</td>
							<td>10/9/25</td>
							<td></td>
							<td class="table-actions">
								<i title="Edit">&#9998;</i>

								<i title="Delete">&#128465;</i>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>3</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>4</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>5</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>6</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>7</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>8</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</body>

</html>