<?php 
include 'koneksi.php';
session_start();
if (isset($_SESSION['status'])) {
	if ($_SESSION['status'] == "Login Pelanggan") {
		header("location:index.php?pesan=sudahLogin");
	}elseif ($_SESSION['status'] == "Login Petugas") {
		header("location:admin/index.php?pesan=sudahLogin");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Niagashop | Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/font-awesome/css/all.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand-md navbar-light bg-white" style="z-index: 99;">
			<div class="container">
				<a href="#" class="navbar-brand">
					<span class="brand-text font-weight-light text-danger"><b>NIAGASHOP</b></span>
				</a>
				<!-- Right navbar links -->
				<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
					<li class="nav-item">
						<a href="./" class="nav-link text-white btn btn-sm btn-danger">Home</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="content-wrapper">
			<div class="content">
				<div class="container">
					<div class="d-flex justify-content-center">
						<div class="col-md-6">
							<div class="card shadow mb-5" style="margin-top: 100px;">
								<div class="card-body">
									<h4 class="text-center mb-5">Halaman Login</h4>
									<form action="login_aksi.php" method="post" id="form-login">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email" autofocus>
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
										</div>
										<button type="submit" name="submit" class="btn btn-danger btn-md mb-2 btn-block">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="main-footer">
		  <div class="container">
		    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
		    All rights reserved.
		    <div class="float-right d-none d-sm-inline-block">
		      <b>Version</b> 3.2.0
		    </div>
		  </div>
		</footer>
	</div>
	<script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#form-login').on('submit', function(){
				let email = $('#email').val();
				let password = $('#password').val();

				if (email == "" || password == "") {
					Swal.fire({
						title : 'Gagal',
						text : 'Email & Password Wajib Di isi',
						icon : 'error'
					});
					return false;
				} else {
					return true;
				}
			})

			<?php

			if (isset($_GET['pesan'])) {
				if ($_GET['pesan'] == "belumLogin") { ?>

					Swal.fire({
						title: "Peringatan",
						text: "Anda Harus Login Terlebih Dahulu",
						icon: "warning"
					})

				<?php }elseif ($_GET['pesan'] == "gagal") { ?>

					Swal.fire({
						title: "Gagal",
						text: "Email & Password Tidak Sesuai",
						icon: "error"
					})

				<?php }

			} 

			?>
		})
	</script>
</body>
</html>