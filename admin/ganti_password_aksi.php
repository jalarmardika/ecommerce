<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';

	$pass_lama =htmlspecialchars(md5($_POST['pass_lama']));
	$pass_baru =htmlspecialchars(md5($_POST['pass_baru']));
	$konfirm =htmlspecialchars(md5($_POST['konfirm']));
	$id = htmlspecialchars($_POST['id']);
	// cek apakah petugas benar memasukkan password lama
	$cek = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id='$id' and password='$pass_lama' ");
	// jika benar
	if (mysqli_num_rows($cek) > 0) {
		if ($pass_baru == $konfirm) {
			mysqli_query($koneksi,"UPDATE petugas SET password='$pass_baru' WHERE id='$id'");
			header("location:ganti_password.php?pesan=ganti_password");
		} else {
			header("location:ganti_password.php?pesan=konfirmasi_password_gagal");
		}
	}else{
		header("location:ganti_password.php?pesan=password_lama_salah");
	}

}	

?>