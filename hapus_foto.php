<?php 
include 'koneksi.php';
session_start();
$id = htmlspecialchars($_SESSION['id_pelanggan']);
$pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id' ");
$data = mysqli_fetch_assoc($pelanggan);
unlink('assets/photo-profile/' . $data['foto']);

mysqli_query($koneksi, "UPDATE pelanggan SET foto='' WHERE id_pelanggan='$id' ");
header("location:profile.php?pesan=hapusFoto");
?>