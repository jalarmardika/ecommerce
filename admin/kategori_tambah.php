<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';
	$kategori = htmlspecialchars($_POST['kategori']);

	$allow = ['jpg','jpeg','png'];
	$nama_file = $_FILES['gambar']['name'];
	$dot = explode('.', $nama_file);
	$ekstensi = strtolower(end($dot));
	$file_tmp = $_FILES['gambar']['tmp_name'];

	if (in_array($ekstensi, $allow) === true) {
		$img = htmlspecialchars(md5(uniqid($nama_file,true) . time()).'.'.$ekstensi);
		move_uploaded_file($file_tmp, '../assets/img-category/'.$img);

		mysqli_query($koneksi,"INSERT INTO kategori VALUES('','$kategori','$img')");
		header("location:kategori.php?pesan=simpan");
	}else{
		header("location:kategori.php?pesan=bukanGambar");
	}
}
?>