<?php

if (isset($_GET['id'])) {
	include '../koneksi.php';
	$id = htmlspecialchars($_GET['id']);
	$varian = mysqli_query($koneksi, "SELECT * FROM varian WHERE id_varian='$id' ");
	$data = mysqli_fetch_assoc($varian);
	$img_old = '../assets/img-produk/'.$data['gambar_varian'];
	// hapus data
	$hapus = mysqli_query($koneksi,"DELETE FROM varian WHERE id_varian='$id'");

	if ($hapus) {
		// hapus gambar
		unlink($img_old);
		
		$msg = [
			'title' => 'Berhasil',
			'text' => 'Data Berhasil Dihapus',
		];
	}else{
		// on delete restrict
		$msg = [
			'title' => 'Peringatan',
			'text' => 'Data Tidak Dapat Dihapus Karena Ada Data Pembelian Yang Terkait',
		];
	}
	echo json_encode($msg);
}

?>