<?php

if (isset($_POST['submit'])) {
	include '../koneksi.php';
	$warna = htmlspecialchars($_POST['warna']);
	$ukuran = htmlspecialchars($_POST['ukuran']);
	$harga = htmlspecialchars($_POST['harga']);
	$berat = htmlspecialchars($_POST['berat']);
	$stok = htmlspecialchars($_POST['stok']);
	$id_varian = htmlspecialchars($_POST['id_varian']);
	$id_produk = htmlspecialchars($_POST['id_produk']);

	if ($_FILES['gambar']['name'] != "") {
		$allow = ['jpg','jpeg','png','webp'];
		$nama_file = $_FILES['gambar']['name'];
		$dot = explode('.', $nama_file);
		$ekstensi = strtolower(end($dot));
		$file_tmp =$_FILES['gambar']['tmp_name'];

		if (in_array($ekstensi, $allow) === true) {
			$produk_utama = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk' ");
			$data_produk = mysqli_fetch_assoc($produk_utama);
			$img_produk_utama = '../assets/img-produk/'.$data_produk['gambar_produk'];

			$varian = mysqli_query($koneksi, "SELECT * FROM varian WHERE id_varian='$id_varian' ");
			$data = mysqli_fetch_assoc($varian);
			$img_old = '../assets/img-produk/'.$data['gambar_varian'];

			if ($img_produk_utama !== $img_old) {
				// jika gambar produk utama dan gambar varian tidak sama, maka hapus gambar varian
				unlink($img_old);
			}
			// upload gambar baru
			$img = htmlspecialchars(md5(uniqid($nama_file,true) . time()).'.'.$ekstensi);
			move_uploaded_file($file_tmp, '../assets/img-produk/'.$img);
			// update data varian beserta field gambar_varian
			mysqli_query($koneksi,"UPDATE varian SET warna='$warna',ukuran='$ukuran',harga='$harga',berat='$berat',stok='$stok',gambar_varian='$img' WHERE id_varian='$id_varian' ");
			header("location:varian.php?pesan=edit&id=$id_produk");
		}else{
			header("location:varian.php?pesan=bukanGambar&id=$id_produk");
		}
	}else{
		// update data varian
		mysqli_query($koneksi,"UPDATE varian SET warna='$warna',ukuran='$ukuran',harga='$harga',berat='$berat',stok='$stok' WHERE id_varian='$id_varian' ");
		header("location:varian.php?pesan=edit&id=$id_produk");
	}
}

?>