<?php 
include 'koneksi.php';

$id_produk = htmlspecialchars($_POST['id_produk']);
$ukuran = htmlspecialchars($_POST['ukuran']);
$warna = htmlspecialchars($_POST['warna']);
$response = [];
if ($warna != '' && $ukuran != '') {

	$query = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$id_produk' and warna='$warna' and ukuran='$ukuran' ");
	$jumlah = mysqli_num_rows($query);

	if ($jumlah > 0) {
		$array = mysqli_fetch_assoc($query);
		$response = [
			'gambar' => $array['gambar_produk'],
			'warna' => $array['warna'],
			'ukuran' => $array['ukuran'],
			'harga' => $array['harga'],
			'berat' => $array['berat'],
			'stok' => $array['stok'],
			'terjual' => $array['terjual']
		];
		
	} else {
		$varian = mysqli_query($koneksi,"SELECT * FROM varian WHERE id_produk='$id_produk' and warna='$warna' and ukuran='$ukuran' ");
		$jumlah_varian = mysqli_num_rows($varian);
		if ($jumlah_varian > 0) {
			$array_varian = mysqli_fetch_assoc($varian);
			$response = [
				'id_varian' => $array_varian['id_varian'],
				'gambar' => $array_varian['gambar_varian'],
				'warna' => $array_varian['warna'],
				'ukuran' => $array_varian['ukuran'],
				'harga' => $array_varian['harga'],
				'berat' => $array_varian['berat'],
				'stok' => $array_varian['stok'],
				'terjual' => $array_varian['terjual']
			];
			
		}
	}

}elseif ($warna != '' && empty($ukuran)) {
	$query2 = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$id_produk' and warna='$warna' ");
	$jumlah2 = mysqli_num_rows($query2);

	if ($jumlah2 > 0) {
		$array = mysqli_fetch_assoc($query2);
		$response = [
			'gambar' => $array['gambar_produk'],
			'warna' => $array['warna'],
			'harga' => $array['harga'],
			'berat' => $array['berat'],
			'stok' => $array['stok'],
			'terjual' => $array['terjual']
		];
		
	} else {
		$varian2 = mysqli_query($koneksi,"SELECT * FROM varian WHERE id_produk='$id_produk' and warna='$warna' ");
		$jumlah_varian2 = mysqli_num_rows($varian2);
		if ($jumlah_varian2 > 0) {
			$array_varian2 = mysqli_fetch_assoc($varian2);
			$response = [
				'id_varian' => $array_varian2['id_varian'],
				'gambar' => $array_varian2['gambar_varian'],
				'warna' => $array_varian2['warna'],
				'harga' => $array_varian2['harga'],
				'berat' => $array_varian2['berat'],
				'stok' => $array_varian2['stok'],
				'terjual' => $array_varian2['terjual']
			];
			
		}
	}
}elseif ($ukuran != '' && empty($warna)) {
	$query2 = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$id_produk' and ukuran='$ukuran' ");
	$jumlah2 = mysqli_num_rows($query2);

	if ($jumlah2 > 0) {
		$array = mysqli_fetch_assoc($query2);
		$response = [
			'gambar' => $array['gambar_produk'],
			'ukuran' => $array['ukuran'],
			'harga' => $array['harga'],
			'berat' => $array['berat'],
			'stok' => $array['stok'],
			'terjual' => $array['terjual']
		];
		
	} else {
		$varian2 = mysqli_query($koneksi,"SELECT * FROM varian WHERE id_produk='$id_produk' and ukuran='$ukuran' ");
		$jumlah_varian2 = mysqli_num_rows($varian2);
		if ($jumlah_varian2 > 0) {
			$array_varian2 = mysqli_fetch_assoc($varian2);
			$response = [
				'id_varian' => $array_varian2['id_varian'],
				'gambar' => $array_varian2['gambar_varian'],
				'ukuran' => $array_varian2['ukuran'],
				'harga' => $array_varian2['harga'],
				'berat' => $array_varian2['berat'],
				'stok' => $array_varian2['stok'],
				'terjual' => $array_varian2['terjual']
			];
			
		}
	}
}
echo json_encode($response);
?>