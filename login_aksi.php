<?php

if (isset($_POST['submit'])) {
  include 'koneksi.php';
  session_start();
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars(md5($_POST['password']));

	$pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email='$email' and password='$password' ");
  $petugas = mysqli_query($koneksi, "SELECT * FROM petugas WHERE email='$email' and password='$password' ");
  if (mysqli_num_rows($pelanggan) > 0) {
    
    $data_pelanggan = mysqli_fetch_assoc($pelanggan);
    $_SESSION['id_pelanggan'] = $data_pelanggan['id_pelanggan'];
    $_SESSION['status'] = "Login Pelanggan";

    header("location:index.php?pesan=login");
  }elseif (mysqli_num_rows($petugas) > 0){

    $data_petugas = mysqli_fetch_assoc($petugas);
    $_SESSION['id_petugas'] = $data_petugas['id'];
    $_SESSION['status'] = "Login Petugas";

    if ($data['level'] == "Admin") {
      $_SESSION['level'] = "Admin";
    }else{
      $_SESSION['level'] = "Petugas";
    }
    header("location:admin/index.php?pesan=login");
  }else{
    header("location:login.php?pesan=gagal");
  }
}

?>