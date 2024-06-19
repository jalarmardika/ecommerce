<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Niagashop | Registrasi</title>
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
							<div class="card shadow mb-5" style="margin-top: 50px;">
								<div class="card-body">
									<h4 class="text-center mb-5">Halaman Registrasi</h4>
									<form action="" method="post" id="form-register">
										<div class="form-group">
											<label for="nama">Nama</label>
											<input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" autofocus>
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email">
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
										</div>
										<div class="form-group">
											<label for="no_telp">No Handphone</label>
											<input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Masukkan No Handphone" autocomplete="off">
										</div>
										<button type="submit" name="submit" class="btn btn-danger btn-md mb-2 btn-block">Register</button>
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
			$('#form-register').on('submit', function(){
				let email = $('#email').val();
				let password = $('#password').val();
				let nama = $('#nama').val();
				let no_telp = $('#no_telp').val();

				if (email == "" || password == "" || nama == "" || no_telp == "") {
					Swal.fire({
						title : 'Gagal',
						text : 'Semua Field Wajib Di isi',
						icon : 'error'
					});
					return false;
				} else {
					return true;
				}
			})

			<?php 
			if (isset($_POST['submit'])) {
				$email = htmlspecialchars($_POST['email']);
				$password = htmlspecialchars(md5($_POST['password']));
				$nama = htmlspecialchars($_POST['nama']);
				$no_telp = htmlspecialchars($_POST['no_telp']);

				$insert = mysqli_query($koneksi, "INSERT INTO pelanggan (nama, email, password, no_hp) VALUES ('$nama','$email','$password','$no_telp') ");
				if ($insert) { ?>
					
					Swal.fire({
						title: "Berhasil",
						text: "Registrasi Berhasil, Silakan Login",
						icon: "success"
					}).then((hasil) => {
						if (hasil.isConfirmed) {
							window.location.href="login.php";
						}
					})
					
				<?php }else{ ?>
					Swal.fire({
						title: "Terjadi Kesalahan",
						text: "Registrasi Gagal Dilakukan",
						icon: "error"
					})
				<?php }

			} ?>
		})
	</script>
</body>
</html>