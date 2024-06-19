<?php 
if (isset($_POST['submit'])) {
	include 'koneksi.php';
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	$tgl = date('Y-m-d H:i:s');
	$id_pelanggan = htmlspecialchars($_SESSION['id_pelanggan']);
	$total_pembelian = htmlspecialchars($_POST['total_pembelian']);
	$total_berat = htmlspecialchars($_POST['total_berat']);
	$provinsi = htmlspecialchars($_POST['provinsi']);
	$tipe = htmlspecialchars($_POST['tipe']);
	$distrik = htmlspecialchars($_POST['distrik']);
	$kodepos = htmlspecialchars($_POST['kodepos']);
	$ekspedisi = htmlspecialchars($_POST['ekspedisi']);
	$paket = htmlspecialchars($_POST['paket']);
	$ongkir = htmlspecialchars($_POST['ongkir']);
	$estimasi = htmlspecialchars($_POST['estimasi']);
	$alamat = htmlspecialchars($_POST['alamat']);
	$total_bayar = htmlspecialchars($total_pembelian + $ongkir);
	
	mysqli_query($koneksi, "INSERT INTO pembelian(tgl_pembelian, id_pelanggan, total_berat, alamat_pengiriman, provinsi, distrik, tipe, kodepos, ekspedisi, paket, ongkir, estimasi, total_pembelian, total_bayar, status) VALUES('$tgl','$id_pelanggan','$total_berat','$alamat','$provinsi','$distrik','$tipe','$kodepos','$ekspedisi','$paket','$ongkir','$estimasi','$total_pembelian','$total_bayar','Belum Bayar') ");

	$id_pembelian = mysqli_insert_id($koneksi);

	foreach ($_SESSION['cart'] as $value) {
		$id_produk = $value['id_produk'];
		$id_varian = $value['id_varian'];
		$kuantitas = $value['kuantitas'];
		$sub_berat = $value['sub_berat'];
		$sub_harga = $value['sub_harga'];

		if ($id_varian == "") {
			mysqli_query($koneksi, "INSERT INTO detail_pembelian (id_pembelian, id_produk, kuantitas, sub_berat, sub_harga) VALUES('$id_pembelian','$id_produk','$kuantitas','$sub_berat','$sub_harga') ");

			$cari_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
			$array = mysqli_fetch_assoc($cari_produk);
			$stok = $array['stok'];
			$terjual = $array['terjual'];

			$update_stok = $stok - $kuantitas;
			$update_terjual = $terjual + $kuantitas;

			mysqli_query($koneksi, "UPDATE produk SET stok='$update_stok',terjual='$update_terjual' WHERE id_produk='$id_produk' ");
		} else{
			mysqli_query($koneksi, "INSERT INTO detail_pembelian (id_pembelian, id_produk, id_varian, kuantitas, sub_berat, sub_harga) VALUES('$id_pembelian','$id_produk','$id_varian','$kuantitas','$sub_berat','$sub_harga') ");

			$cari_produk_varian = mysqli_query($koneksi, "SELECT * FROM varian WHERE id_varian='$id_varian'");
			$array_varian = mysqli_fetch_assoc($cari_produk_varian);
			$stok_varian = $array_varian['stok'];
			$terjual_varian = $array_varian['terjual'];

			$update_stok_varian = $stok_varian - $kuantitas;
			$update_terjual_varian = $terjual_varian + $kuantitas;

			mysqli_query($koneksi, "UPDATE varian SET stok='$update_stok_varian',terjual='$update_terjual_varian' WHERE id_varian='$id_varian' ");
		}
	}

	// kosongkan keranjang
	$_SESSION['cart'] = [];
	header("location:detail_pembelian.php?id=$id_pembelian");
}

?>