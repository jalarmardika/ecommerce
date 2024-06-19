<?php 
if (isset($_POST['id_produk'])) {
      include 'koneksi.php';
      session_start();
      if (!isset($_SESSION['cart']) || $_SESSION['cart'] == []) {
            
            $produk = [
                  'id_produk' => $_POST['id_produk'],
                  'id_varian' => $_POST['id_varian'],
                  'gambar_produk' => $_POST['gambar_produk'],
                  'nama_produk' => $_POST['nama_produk'],
                  'warna' => $_POST['warna'],
                  'ukuran' => $_POST['ukuran'],
                  'sub_harga' => $_POST['harga'] * $_POST['kuantitas'],
                  'sub_berat' => $_POST['berat'] * $_POST['kuantitas'],
                  'kuantitas' => $_POST['kuantitas']
            ];

            $_SESSION['cart'][] = $produk;  

            header("location:keranjang.php");
      }else{
            function cekKeranjang(){
                  foreach ($_SESSION['cart'] as $value) {
                        if ($value['id_produk'] == $_POST['id_produk'] && $value['id_varian'] == $_POST['id_varian']) {
                              return false;
                        }
                  } 
                  return true;
            }
            
            if (cekKeranjang()) {
                  $produk = [
                        'id_produk' => $_POST['id_produk'],
                        'id_varian' => $_POST['id_varian'],
                        'gambar_produk' => $_POST['gambar_produk'],
                        'nama_produk' => $_POST['nama_produk'],
                        'warna' => $_POST['warna'],
                        'ukuran' => $_POST['ukuran'],
                        'sub_harga' => $_POST['harga'] * $_POST['kuantitas'],
                        'sub_berat' => $_POST['berat'] * $_POST['kuantitas'],
                        'kuantitas' => $_POST['kuantitas']
                  ];

                  $_SESSION['cart'][] = $produk;
                  header("location:keranjang.php");
            }else{
                  header("location:tambah_pesanan.php?id=$_POST[id_produk]&pesan=sudahAda");
            }
      }
      
}

?>