<?php

if (isset($_GET['id'])) {
	include '../koneksi.php';
	$id = htmlspecialchars($_GET['id']);
	$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id' ");
	$data = mysqli_fetch_assoc($queryKategori);
	$img_old = '../assets/img-category/'.$data['gambar'];
	// hapus data
	$hapus = mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$id'");
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
			'text' => 'Data Tidak Dapat Dihapus Karena Ada Data Produk Yang Terkait'
		];
	}
	echo json_encode($msg);
}

?>