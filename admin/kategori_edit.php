<?php
if (isset($_POST['submit'])) {
	include '../koneksi.php';
	$id = htmlspecialchars($_POST['id']);
	$kategori = htmlspecialchars($_POST['kategori']);

	if ($_FILES['gambar']['name'] != "") {
		$allow = ['jpg','jpeg','png'];
		$nama_file = $_FILES['gambar']['name'];
		$dot = explode('.', $nama_file);
		$ekstensi = strtolower(end($dot));
		$file_tmp =$_FILES['gambar']['tmp_name'];

		if (in_array($ekstensi, $allow) === true) {
			// hapus dulu gambar yg lama
			$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id' ");
			$data = mysqli_fetch_assoc($queryKategori);
			$img_old = '../assets/img-category/'.$data['gambar'];
			unlink($img_old);
			// upload gambar baru
			$img = htmlspecialchars(md5(uniqid($nama_file,true) . time()).'.'.$ekstensi);
			move_uploaded_file($file_tmp, '../assets/img-category/'.$img);
			// update data kategori beserta field gambar
			mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$kategori',gambar='$img' WHERE id_kategori='$id' ");
			header("location:kategori.php?pesan=edit");
		}else{
			header("location:kategori.php?pesan=bukanGambar");
		}
	}else{
		// update data
		mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$kategori' WHERE id_kategori='$id' ");
		header("location:kategori.php?pesan=edit");
	}

}
?>