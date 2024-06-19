<?php

if (isset($_POST['submit'])) {
	include '../koneksi.php';
	$id = htmlspecialchars($_POST['id']);
	$nama = htmlspecialchars($_POST['nama']);
	$email = htmlspecialchars($_POST['email']);
	$level = htmlspecialchars($_POST['level']);
	$no_hp = htmlspecialchars($_POST['no_hp']);

	if ($_POST['password'] == null) {
		$update = mysqli_query($koneksi,"UPDATE petugas SET nama='$nama',email='$email',no_hp='$no_hp',level='$level' WHERE id='$id' ");
	}else{
		$password = htmlspecialchars(md5($_POST['password']));
		$update = mysqli_query($koneksi,"UPDATE petugas SET nama='$nama',email='$email',password='$password',no_hp='$no_hp',level='$level' WHERE id='$id' ");
	}

	if ($update) {
		header("location:petugas.php?pesan=edit");
	}else{
		header("location:petugas.php?pesan=gagalEdit");
	}
}
?>