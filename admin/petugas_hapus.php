<?php

if (isset($_GET['id'])) {
	include '../koneksi.php';
	$id = htmlspecialchars($_GET['id']);
	// hapus data
	$hapus = mysqli_query($koneksi,"DELETE FROM petugas WHERE id='$id'");
	if ($hapus) {
		$msg = [
			'title' => 'Berhasil',
			'text' => 'Data Berhasil Dihapus'
		];
	}else{
		$msg = [
			'title' => 'Gagal',
			'text' => 'Data Gagal Dihapus'
		];
	}
	echo json_encode($msg);
}

?>