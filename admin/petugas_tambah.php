<?php

if (isset($_POST['submit'])) {
	include '../koneksi.php';
	$nama = htmlspecialchars($_POST['nama']);
	$email = htmlspecialchars($_POST['email']);
	$level = htmlspecialchars($_POST['level']);
	$password = htmlspecialchars(md5($_POST['password']));
	$no_hp = htmlspecialchars($_POST['no_hp']);

	$simpan = mysqli_query($koneksi,"INSERT INTO petugas(nama, email, password, no_hp, level) VALUES('$nama','$email','$password','$no_hp','$level')");
	if ($simpan) {
		header("location:petugas.php?pesan=simpan");
	}else{
		header("location:petugas.php?pesan=gagalSimpan");
	}
}

?>