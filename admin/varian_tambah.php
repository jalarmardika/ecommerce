<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';
	$id_produk = htmlspecialchars($_POST['id_produk']);
	$warna = htmlspecialchars($_POST['warna']);
	$ukuran = htmlspecialchars($_POST['ukuran']);
	$stok = htmlspecialchars($_POST['stok']);
	$harga = htmlspecialchars($_POST['harga']);
	$berat = htmlspecialchars($_POST['berat']);

	$nama_file = $_FILES['gambar']['name'];
	if ($nama_file == "") {
		$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
		$array_produk = mysqli_fetch_assoc($produk);
		// jika user tidak memilih gambar maka gambar produk varian sama dengan gambar produk utama
		$img = $array_produk['gambar_produk'];
	}else{
		$allow = ['jpg','jpeg','png','webp'];
		$dot = explode('.', $nama_file);
		$ekstensi = strtolower(end($dot));
		$file_tmp =$_FILES['gambar']['tmp_name'];

		if (in_array($ekstensi, $allow) === true) {
			$img = htmlspecialchars(md5(uniqid($nama_file,true) . time()).'.'.$ekstensi);
			move_uploaded_file($file_tmp, '../assets/img-produk/'.$img);
		}else{
			header("location:varian.php?pesan=bukanGambar&id=$id_produk");
			die();
		}
	}

	mysqli_query($koneksi,"INSERT INTO varian VALUES('','$id_produk','$warna','$ukuran','$harga','$berat','$stok','','$img')");
	header("location:varian.php?pesan=simpan&id=$id_produk");	
}

?>