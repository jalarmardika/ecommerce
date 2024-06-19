<?php
include '../koneksi.php';
session_start();

if ($_SESSION['status'] == "") {
	header("location:../login.php?pesan=belumLogin");
}elseif ($_SESSION['status'] !== "Login Petugas") {
	http_response_code(403);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Commerce</title>

	<link rel="stylesheet" href="../assets/font-awesome/css/all.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/sweetalert2.min.css">
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="../assets/DataTables/datatables.min.css">
	<script src="../assets/DataTables/datatables.min.js"></script>
	<script src="../assets/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="../assets/AdminLTE/dist/css/adminlte.css">
	<style type="text/css">
		.img-category{
			height: 4rem;
			width: 4rem;
			border-radius: 50%;
		}
		.text-label{
			font-size: 13px;
		}
		.text-purple{
			color: #6f42c1;
		}
		.text-orange{
			color: #fd7e14;
		}
		.nav-tabs .nav-link{
			color: inherit;
		}
		@media print {
			.dataTables_filter,
			.dataTables_info,
			.dataTables_length,
			.dataTables_paginate {
				display: none !important;
			}
			.cetak {
				display: inline-block !important;
			}
		}
		@media (max-width: 768px){
			h5.text-produk{
				font-size: 14px;
			}
		}
	</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">

		</div>

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light shadow ">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="fa fa-user-circle text-muted mb-4"></i>
						<?php 
						$id_petugas = $_SESSION['id_petugas'];
						$petugas = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id='$id_petugas' ");
						$data = mysqli_fetch_assoc($petugas);

						echo $data['nama']." (".$data['level'].")";
						?>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar elevation-4 bg-white">
			<!-- Brand Logo -->
			<a href="#" class="brand-link">
				<span class="brand-text font-weight-light">NIAGASHOP</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel pb-3 d-flex">

					<div class="info">
						<a href="#" class="d-block"></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav >
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<li class="nav-item">
							<a href="index.php" class="nav-link text-dark">
								<i class="nav-icon fas fa-tachometer-alt text-primary"></i>
								<p>
									Dashboard                
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="kategori.php" class="nav-link text-dark">
								<i class="nav-icon fa fa-list-alt text-orange"></i>
								<p>
									Kategori
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="produk.php" class="nav-link text-dark">
								<i class="nav-icon fa fa-box text-success"></i>
								<p>
									Produk   
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pelanggan.php" class="nav-link text-dark">
								<i class="nav-icon fa fa-users text-warning"></i>
								<p>
									Pelanggan
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="transaksi.php" class="nav-link text-dark">
								<i class="nav-icon fas fa-money-bill text-info"></i>
								<p>
									Transaksi
								</p>
							</a>
						</li>
						<?php 
						if ($data['level'] == "Admin") { ?>
							<li class="nav-item">
								<a href="laporan.php" class="nav-link text-dark">
									<i class="nav-icon fas fa-file text-muted"></i>
									<p>
										Laporan
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="petugas.php" class="nav-link text-dark">
									<i class="nav-icon fas fa-user text-purple"></i>
									<p>
										Petugas
									</p>
								</a>
							</li>
						<?php }else{ ?>
							<li class="nav-item">
								<a href="ganti_password.php" class="nav-link text-dark">
									<i class="nav-icon fas fa-lock text-muted"></i>
									<p>
										Ganti Password
									</p>
								</a>
							</li>
						<?php }
						?>

						<li class="nav-item">
							<a href="#" class="nav-link btn-logout text-dark">
								<i class="nav-icon fas fa-sign-out-alt text-danger"></i>
								<p>
									Keluar               
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
