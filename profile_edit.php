<?php 
if (isset($_POST['submit'])) {
  include 'koneksi.php';
  $id_pelanggan = htmlspecialchars($_POST['id_pelanggan']);
  $email = htmlspecialchars($_POST['email']);
  $nama = htmlspecialchars($_POST['nama']);
  $no_hp = htmlspecialchars($_POST['no_hp']);

  if ($_POST['password'] != "") {
    $password = htmlspecialchars(md5($_POST['password']));
  }
  
  if ($_FILES['foto']['name'] != "") {
    $allow = ['jpg','jpeg','png'];
    $nama_file = $_FILES['foto']['name'];
    $dot = explode('.', $nama_file);
    $ekstensi = strtolower(end($dot));
    $file_tmp = $_FILES['foto']['tmp_name'];

    if (in_array($ekstensi, $allow) === true) {
      $img = htmlspecialchars(md5(uniqid($nama_file,true) . time()).'.'.$ekstensi);
    }else{
      header("location:profile.php?pesan=bukanGambar");
      die();
    }
  }

  function uploadImage(){
    global $koneksi,$id_pelanggan,$file_tmp,$img;
    $sql = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    $fetch = mysqli_fetch_assoc($sql);
    
    if ($fetch['foto'] != "") {
      // jika ada gambar lama maka dihapus dulu
      $image = 'assets/photo-profile/'.$fetch['foto'];
      unlink($image);
    }
    // upload gambar baru
    move_uploaded_file($file_tmp, 'assets/photo-profile/'.$img);
  }

  if ($_POST['password'] == "" && $_FILES['foto']['name'] == "") {
    mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama',email='$email',no_hp='$no_hp' WHERE id_pelanggan='$id_pelanggan' ");
  }elseif ($_FILES['foto']['name'] == "") {
    mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama',email='$email',no_hp='$no_hp',password='$password' WHERE id_pelanggan='$id_pelanggan' ");
  }elseif ($_POST['password'] == "") {
    uploadImage();
    mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama',email='$email',no_hp='$no_hp',foto='$img' WHERE id_pelanggan='$id_pelanggan' ");
  }else{
    uploadImage();
    mysqli_query($koneksi, "UPDATE pelanggan SET nama='$nama',email='$email',no_hp='$no_hp',password='$password',foto='$img' WHERE id_pelanggan='$id_pelanggan' ");
  }

  header("location:profile.php?pesan=editProfile");
}
?>