<?php

if (isset($_GET['id'])) {
	include '../koneksi.php';
	$id = htmlspecialchars($_GET['id']);
	$update = mysqli_query($koneksi,"UPDATE pembelian SET status='Pembayaran Gagal' WHERE id_pembelian='$id'");
	
	if ($update) {
		$msg = [
			'title' => 'Berhasil',
			'text' => 'Transaksi Berhasil Diverifikasi',
		];
	}else{
		$msg = [
			'title' => 'Terjadi Kesalahan',
			'text' => 'Transaksi Gagal Diverifikasi',
		];
	}
	echo json_encode($msg);
}
?>