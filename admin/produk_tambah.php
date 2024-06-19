<?php

if (isset($_POST['submit'])) {
	include '../koneksi.php';
	$nama = htmlspecialchars($_POST['nama']);
	$harga = htmlspecialchars($_POST['harga']);
	$warna = htmlspecialchars($_POST['warna']);
	$ukuran = htmlspecialchars($_POST['ukuran']);
	$berat = htmlspecialchars($_POST['berat']);
	$kategori = htmlspecialchars($_POST['kategori']);
	$stok = htmlspecialchars($_POST['stok']);
	$deskripsi = $_POST['deskripsi'];

	$allow = ['jpg','jpeg','png','webp'];
	$nama_file = $_FILES['gambar']['name'];
	$dot = explode('.', $nama_file);
	$ekstensi = strtolower(end($dot));
	$file_tmp = $_FILES['gambar']['tmp_name'];
	if (in_array($ekstensi, $allow) === true) {
		$img = htmlspecialchars(md5(uniqid($nama_file,true) . time()).'.'.$ekstensi);
		move_uploaded_file($file_tmp, '../assets/img-produk/'.$img);

		mysqli_query($koneksi,"INSERT INTO produk VALUES('','$nama','$kategori','$warna','$ukuran','$harga','$berat','$deskripsi','$stok','','$img')");
		header("location:produk.php?pesan=simpan");
	}else{
		header("location:produk.php?pesan=bukanGambar");
	}
	
}

?>