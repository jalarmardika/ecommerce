<?php

if (isset($_GET['id'])) {
	include '../koneksi.php';
	date_default_timezone_set('Asia/Jakarta');
	$tgl_sampai = htmlspecialchars(date('Y-m-d H:i:s'));
	$id = htmlspecialchars($_GET['id']);
	$sampai = mysqli_query($koneksi,"UPDATE pembelian SET tgl_sampai='$tgl_sampai',status='Selesai' WHERE id_pembelian='$id'");

	if ($sampai) {
		$msg = [
			'title' => 'Berhasil',
			'text' => 'Paket Telah Sampai Ditempat Tujuan, Transaksi Selesai',
		];
	}else{
		$msg = [
			'title' => 'Terjadi Kesalahan',
			'text' => 'Gagal Mengubah Status Transaksi',
		];
	}
	echo json_encode($msg);
}
?>