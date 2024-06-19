<?php

if (isset($_GET['id'])) {
	include '../koneksi.php';
	date_default_timezone_set('Asia/Jakarta');
	$tgl_dikemas = htmlspecialchars(date('Y-m-d H:i:s'));
	$id = htmlspecialchars($_GET['id']);
	$konfirm = mysqli_query($koneksi,"UPDATE pembelian SET tgl_dikemas='$tgl_dikemas',status='Dikemas' WHERE id_pembelian='$id'");

	if ($konfirm) {
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