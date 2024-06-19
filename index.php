 <?php
 include 'koneksi.php';
 session_start();
 function singkatAngka($number){
 	$singkatan = ['','rb','jt','M','T'];

 	if ($number < 1000) {
    return strval($number);
  }

  $indexSingkatan = 0;
  while ($number >= 1000 && $indexSingkatan < count($singkatan) - 1){
    $number /= 1000;
    $indexSingkatan++;
  }

  $number = round($number*100) / 100;
  return strval($number) . " " . $singkatan[$indexSingkatan];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | Niagashop</title>
  <link rel="stylesheet" href="assets/font-awesome/css/all.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand-md fixed-top navbar-light bg-white" style="z-index: 99;">
      <div class="container">
        <a href="#" class="navbar-brand">
          <span class="font-weight-light text-danger"><b>NIAGASHOP</b></span>
        </a>
        <div class="search-box form-search">
          <form action="./#produk" method="get" class="form-inline search-form" id="form">
            <span class="search-input">
              <input type="text" id="keyword" name="keyword" class="input" placeholder="Telusuri...">
            </span>
            <i class="fa fa-search text-center" id="icon-submit"></i>
          </form>
        </div>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item nav-search">
            <a class="nav-link toggle-search" href="#">
              <i class="fa fa-search icon"></i>
            </a>
          </li>
          <?php 

          if (isset($_SESSION['status'])) {
            if ($_SESSION['status'] == "Login Pelanggan") {
             ?>
             <li class="nav-item">
              <a class="nav-link" href="keranjang.php">
                <i class="fa fa-shopping-cart icon"></i>
                <span class="badge badge-primary navbar-badge">
                  <?php echo (isset($_SESSION['cart']) and $_SESSION['cart'] != []) ? count($_SESSION['cart']) : 0; ?>
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <i class="fa fa-user-circle icon"></i>
              </a>
            </li>

          <?php }
        } else{ ?>

          <li class="nav-item">
            <a href="register.php" class="nav-link text-danger">Daftar</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link btn text-white btn-sm btn-danger">Masuk</a>
          </li>

        <?php } ?>
      </ul>
    </div>
  </nav>
  <nav class="main-header form-search2 navbar navbar-expand-md navbar-light bg-white">
    <div class="container pl-3 pr-3">
      <div class="search-box" style="margin-bottom: 20px;">
        <form action="./#produk" method="get" class="form-inline search-form" id="form2">
          <div class="search-input">
            <input type="text" id="keyword2" name="keyword" class="input" placeholder="Telusuri...">
          </div>
          <i class="fa fa-search text-center" id="icon-submit2"></i>
        </form>
      </div>
    </nav>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Hero section -->
      <section id="hero" class="bg-white mt-5">
        <div class="container">
          <div class="row pb-5 pl-3">
            <div class="col-lg-6">
              <p class="font-weight-bold text-danger" style="margin-top: 100px;">E-Commerce</p>
              <h2>Temukan barang yang kamu inginkan di Niagashop</h2>
              <p class="text-muted">Niagashop adalah e-commerce yang dapat memberikan pengalaman terbaik untuk jual beli bagi penggunanya</p>
              <a href="#produk" class="btn btn-md btn-radius btn-outline-danger">Lihat Produk</a>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
              <center><img src="assets/img/hero-section.svg" class="img-fluid mt-5"></center>
            </div>
          </div>
        </div>
      </section>

      <section class="mt-5">
        <div class="container pl-3 pr-3">
          <div class="row">
            <div class="col-md-3">
              <div class="card card-excellence">
                <div class="card-body">
                  <center>
                    <i class="fa fa-check text-danger fa-2x mb-3"></i>
                    <p class="font-weight-bold">Harga Lebih Terjangkau</p>
                    <p class="keterangan text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </center>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-excellence">
                <div class="card-body">
                  <center>
                    <i class="fa fa-list text-danger fa-2x mb-3"></i>
                    <p class="font-weight-bold">Banyak Pilihan Produk</p>
                    <p class="keterangan text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </center>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-excellence">
                <div class="card-body">
                  <center>
                    <i class="fa fa-map-marker-alt text-danger fa-2x mb-3"></i>
                    <p class="font-weight-bold">Pengiriman Ke Seluruh Indonesia</p>
                    <p class="keterangan text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </center>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-excellence">
                <div class="card-body">
                  <center>
                    <i class="fa fa-money-bill text-danger fa-2x mb-3"></i>
                    <p class="font-weight-bold">Pembayaran Mudah</p>
                    <p class="keterangan text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="bg-white" id="kategori">
        <div class="container pt-5">
          <h4 class="mb-3">Kategori</h4>
          <div class="row">
            <div class="category">
              <a href="./#produk">
                <center>
                  <i class="fas fa-th-large fa-4x text-muted" style="border-radius: 50%;"></i>
                  <p class="mt-2 mb-2 text-muted text-category">Semua Kategori</p>
                </center>
              </a>
            </div>
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY id_kategori DESC");
            while ($row = mysqli_fetch_assoc($query)) { ?>
              <div class="ml-2 category">
                <a href="?id_kategori=<?= $row['id_kategori']; ?>#produk">
                  <center>
                    <img src="assets/img-category/<?php echo $row['gambar'];?>" class="img-category">
                    <p class="mt-2 mb-2 text-muted text-category"><?= $row['nama_kategori']; ?></p>
                  </center>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      </section>
      <section class="bg-white" id="produk">
        <div class="container pt-4">
         <h4 class="mb-3">Produk</h4>
         <!-- start row -->
         <div class="row pb-5">
          <?php 

            $jumlahDataPerHalaman = 8; // tentukan jumlah data yng ingin ditampilkan per halaman
            $halamanAktif = (isset($_GET['page']) ? $_GET['page'] : 1);
            
            if (isset($_GET['keyword'])) {
              $keyword = htmlspecialchars($_GET['keyword']);
              $jumlahData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.nama_produk LIKE '%".$keyword."%' OR kategori.nama_kategori LIKE '%".$keyword."%' "));
              $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
              $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

              $produk = mysqli_query($koneksi, "SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.nama_produk LIKE '%".$keyword."%' OR kategori.nama_kategori LIKE '%".$keyword."%' LIMIT $awalData,$jumlahDataPerHalaman");
            }else{

              if (isset($_GET['id_kategori'])) {
                $id_kategori = $_GET['id_kategori'];

                $jumlahData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_kategori='$id_kategori'"));
                $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
                $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

                $produk = mysqli_query($koneksi, "SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_kategori='$id_kategori' LIMIT $awalData,$jumlahDataPerHalaman");
              } else {

                $jumlahData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk"));
                $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
                $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

                $produk = mysqli_query($koneksi, "SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY id_produk DESC LIMIT $awalData,$jumlahDataPerHalaman");
              }
            }
            if (mysqli_num_rows($produk) > 0) {

            // list produk
              while($data = mysqli_fetch_assoc($produk)){ 
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                  <div class="card shadow card-produk" data-id="<?php echo $data['id_produk']; ?>">
                    <img src="assets/img-produk/<?php echo $data['gambar_produk'];?>" class="card-img-top img-fluid">
                    <div class="card-body">
                      <p class="text-muted text-right text-category"><?php echo $data['nama_kategori']; ?></p>
                      <h5 class="card-title "><?php echo $data['nama_produk'];?></h5><br>
                      <p class="text-danger label-price"><b>Rp.<?php echo number_format($data['harga']); ?></b></p>
                      <div class="row">
                       <div class="col-sm-6">
                         <p class="text-muted label-sold">Terjual <?php echo singkatAngka($data['terjual']); ?></p>
                       </div>
                       <div class="col-sm-6">
                         <a href="tambah_pesanan.php?id=<?php echo $data['id_produk']; ?>" class="btn btn-outline-danger btn-sm float-right shadow" style="border-radius: 5px;">Tambah</a>
                       </div>
                     </div>  
                   </div>
                 </div>
               </div>  
             <?php } ?>

           </div>
           <!-- end row -->

           <!-- Links Paginasi -->
           <div class="d-flex justify-content-center">
            <nav class="pb-5">
              <ul class="pagination">
               <li class="page-item">
                <a class="page-link" href="?page=1<?php if (isset($_GET['id_kategori'])) echo '&id_kategori='.$id_kategori; ?><?php if (isset($_GET['keyword'])) echo '&keyword='.$keyword; ?>#produk">First</a>
              </li>
              <?php if ($halamanAktif > 1) { ?>
                <li class="page-item ">
                  <a class="page-link" href="?page=<?= $halamanAktif - 1; ?><?php if (isset($_GET['id_kategori'])) echo '&id_kategori='.$id_kategori; ?><?php if (isset($_GET['keyword'])) echo '&keyword='.$keyword; ?>#produk">&laquo;</a>
                </li>
              <?php } ?>

              <?php 
               $jumlah_link = 2; // tentukan jumlah link sebelum dan sesudah link yg aktif
               $awal_nomor = ($halamanAktif > $jumlah_link) ? $halamanAktif - $jumlah_link : 1; // untuk awal link nomor
               $akhir_nomor = ($halamanAktif < ($jumlahHalaman - $jumlah_link)) ? $halamanAktif + $jumlah_link : $jumlahHalaman; // untuk akhir link nomor

               if ($halamanAktif - $jumlah_link > 1) { ?>
                 <li class="page-item disabled"><a class="page-link" href="">...</a></li>
               <?php } ?>

               <?php for ($i = $awal_nomor; $i <= $akhir_nomor; $i++) {

                 if ($i == $halamanAktif) { ?>
                   <li class="page-item active" aria-current="page"><a class="page-link" href="?page=<?= $i; ?><?php if (isset($_GET['id_kategori'])) echo '&id_kategori='.$id_kategori; ?><?php if (isset($_GET['keyword'])) echo '&keyword='.$keyword; ?>#produk"><?= $i; ?></a></li>
                 <?php } else { ?>
                   <li class="page-item"><a class="page-link" href="?page=<?= $i; ?><?php if (isset($_GET['id_kategori'])) echo '&id_kategori='.$id_kategori; ?><?php if (isset($_GET['keyword'])) echo '&keyword='.$keyword; ?>#produk"><?= $i; ?></a></li>

                 <?php } 
               }

               if ($halamanAktif + $jumlah_link < $jumlahHalaman) { ?>
                 <li class="page-item disabled"><a class="page-link" href="">...</a></li>
               <?php } ?>

               <?php if ($halamanAktif < $jumlahHalaman) { ?>
                <li class="page-item ">
                  <a class="page-link" href="?page=<?= $halamanAktif + 1; ?><?php if (isset($_GET['id_kategori'])) echo '&id_kategori='.$id_kategori; ?><?php if (isset($_GET['keyword'])) echo '&keyword='.$keyword; ?>#produk">&raquo;</a>
                </li>
              <?php } ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?= $jumlahHalaman; ?><?php if (isset($_GET['id_kategori'])) echo '&id_kategori='.$id_kategori; ?><?php if (isset($_GET['keyword'])) echo '&keyword='.$keyword; ?>#produk">Last</a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- End Links Paginasi -->
      <?php } else{ ?>
        <p class="text-muted pl-2 pb-5">Produk Tidak Tersedia</p>
      <?php } ?>

    </div><!-- /.container -->
  </section>

  <section class="main-footer">
    <div class="container">
      <div class="row pt-3 pb-3 pl-2 pr-2">
        <div class="col-md-6">
          <h5 class="mt-3">Niagashop</h5>
          <p class="text-muted">Niagashop adalah e-commerce yang dapat memberikan pengalaman terbaik untuk jual beli bagi penggunanya.</p>
          <i class="fab fa-facebook mr-2 text-muted"></i>
          <i class="fab fa-instagram mr-2 text-muted"></i>
          <i class="fab fa-twitter mr-2 text-muted"></i>
          <i class="fab fa-whatsapp mr-2 text-muted"></i>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3">
          <h5 class="mt-3">Halaman</h5>
          <a href="./" class="text-muted text-decoration-none">Home</a><br>
          <a href="./#kategori" class="text-muted text-decoration-none">Kategori</a><br>
          <a href="./#produk" class="text-muted text-decoration-none">Produk</a>
        </div>

      </div>
    </section>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $(".form-search2").hide();
    $('.navbar').css("border-bottom","none");

    $(".toggle-search").on('click', function(){
      $(".form-search2").toggle();
      $("#hero").toggleClass("mt-5");
      $("#section-content").toggleClass("mt-5");
    })

    window.addEventListener('scroll', muncul);

    function muncul(){
      if (window.scrollY === 0) {
        $('.navbar').css("border-bottom","none");
      } else {
        $('.navbar').css("border-bottom","1px solid rgba(222, 226, 230)");
      }
    }

      // form pencarian 1
      function formSubmit(){
        $('#form').submit();
      }
      $("#icon-submit").on('click', function(){
        formSubmit();
      })

      $("#keyword").on('keyup', function(e){
        if (e.keyCode == 13) {
          formSubmit();
        }
      })
      // form pencarian 2
      function formSubmit2(){
        $('#form2').submit();
      }
      $("#icon-submit2").on('click', function(){
        formSubmit2();
      })

      $("#keyword2").on('keyup', function(event){
        if (event.keyCode == 13) {
          formSubmit2();
        }
      })

      <?php 
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "login") { ?>

          Swal.fire({
            title: "Berhasil",
            text: "Anda Berhasil Login",
            icon: "success"
          })

        <?php }elseif ($_GET['pesan'] == "sudahLogin") { ?>

          Swal.fire({
            title: "Peringatan",
            text: "Anda Sudah Login",
            icon: "warning"
          })

        <?php }elseif ($_GET['pesan'] == "logout"){ ?>

          Swal.fire({
            title: "Berhasil",
            text: "Anda Telah Berhasil Logout",
            icon: "success"
          })

        <?php }
      }
      ?>

    })
  </script>

</body>
</html>