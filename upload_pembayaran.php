<?php 
if (isset($_POST['submit'])) {
	include 'koneksi.php';
	$id = htmlspecialchars($_POST['id']);
	$pembelian = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembelian='$id' ");
	$array_pembelian = mysqli_fetch_assoc($pembelian);
	// cek apakah status pembelian adalah pembayaran gagal, jika iya maka user ingin mengupload ulang bukti pembayaran sehingga bukti pembayaran yg lama di hapus dari folder "assets/bukti/" .
	if ($array_pembelian['status'] == "Pembayaran Gagal") {
		unlink("assets/bukti/" . $array_pembelian['bukti']);
	}

	$allow = ['jpg','jpeg','png'];
	$nama_file = $_FILES['bukti']['name'];
	$tmp_file = $_FILES['bukti']['tmp_name'];
	$dot = explode('.', $nama_file);
	$ekstensi = strtolower(end($dot));
	if (in_array($ekstensi, $allow) === true) {
		$bukti = htmlspecialchars(md5(uniqid($nama_file, true) . time()) . '.' . $ekstensi);
		move_uploaded_file($tmp_file, "assets/bukti/" . $bukti);

		mysqli_query($koneksi, "UPDATE pembelian SET status='Menunggu Konfirmasi',bukti='$bukti' WHERE id_pembelian='$id' ");
		header("location:detail_pembelian.php?id=". $id . "&pesan=berhasil");
	}else{
		header("location:detail_pembelian.php?id=". $id . "&pesan=bukanGambar");	
	}
}
?>