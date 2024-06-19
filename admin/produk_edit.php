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
	$id = htmlspecialchars($_POST['id']);

	if ($_FILES['gambar']['name'] != "") {
		$allow = ['jpg','jpeg','png','webp'];
		$nama_file = $_FILES['gambar']['name'];
		$dot = explode('.', $nama_file);
		$ekstensi = strtolower(end($dot));
		$file_tmp =$_FILES['gambar']['tmp_name'];

		if (in_array($ekstensi, $allow) === true) {
			// hapus gambar lama dulu
			$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id' ");
			$data = mysqli_fetch_assoc($produk);
			$img_old = '../assets/img-produk/'.$data['gambar_produk'];
			unlink($img_old);
			// 	upload gambar baru
			$img = htmlspecialchars(md5(uniqid($nama_file,true) . time()).'.'.$ekstensi);
			move_uploaded_file($file_tmp, '../assets/img-produk/'.$img);
			// update data produk beserta field gambar_produk
			mysqli_query($koneksi,"UPDATE produk SET nama_produk='$nama',harga='$harga',warna='$warna',ukuran='$ukuran',id_kategori='$kategori',berat='$berat',stok='$stok',deskripsi='$deskripsi',gambar_produk='$img' WHERE id_produk='$id' ");
			header("location:produk.php?pesan=edit");
		}else{
			header("location:produk.php?pesan=bukanGambar");
		}
		
	} else {
		// update data produk
		mysqli_query($koneksi,"UPDATE produk SET nama_produk='$nama',harga='$harga',warna='$warna',ukuran='$ukuran',id_kategori='$kategori',berat='$berat',stok='$stok',deskripsi='$deskripsi' WHERE id_produk='$id' ");
		header("location:produk.php?pesan=edit");
	}
}
?>