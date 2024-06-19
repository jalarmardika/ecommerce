<?php

if (isset($_GET['id'])) {
	include '../koneksi.php';
	
	$id = htmlspecialchars($_GET['id']);
	$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id' ");
	$data = mysqli_fetch_assoc($produk);
	$img_old = '../assets/img-produk/'.$data['gambar_produk'];
	// hapus data
	$hapus = mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='$id'");
	if ($hapus) {
		// hapus gambar
		unlink($img_old);

		$msg = [
			'title' => 'Berhasil',
			'text' => 'Data Berhasil Dihapus'
		];
	}else{
		// on delete restrict
		$msg = [
			'title' => 'Peringatan',
			'text' => 'Data Tidak Dapat Dihapus Karena Ada Data Varian/Pembelian Yang Terkait'
		];
	}
	echo json_encode($msg);
}
?>