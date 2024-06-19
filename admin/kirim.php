<?php

if (isset($_POST['id'])) {
	include '../koneksi.php';
	date_default_timezone_set('Asia/Jakarta');
	$tgl_dikirim =htmlspecialchars(date('Y-m-d H:i:s'));
	$id =htmlspecialchars($_POST['id']);
	$resi =htmlspecialchars($_POST['resi']);
	$kirim = mysqli_query($koneksi,"UPDATE pembelian SET tgl_dikirim='$tgl_dikirim',resi_pengiriman='$resi',status='Dikirim' WHERE id_pembelian='$id'");

	if ($kirim) {
		header("location:detail_transaksi.php?id=$id&pesan=kirim");
	}else{
		header("location:detail_transaksi.php?id=$id&pesan=gagalKirim");
	}
}
?>