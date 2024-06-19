 <?php
 include 'koneksi.php';
 session_start();

if ($_SESSION['status'] == "") {
  header("location:login.php?pesan=belumLogin");
}elseif ($_SESSION['status'] != "Login Pelanggan") {
  http_response_code(403);
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Niagashop</title>
  <link rel="stylesheet" href="assets/font-awesome/css/all.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/DataTables/datatables.min.css">
  <script src="assets/DataTables/datatables.min.js"></script>
  <link rel="stylesheet" href="assets/AdminLTE/dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/mystyle.css">
  <script type="text/javascript" src="assets/js/sweetalert2.min.js"></script>
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand-md fixed-top navbar-light bg-white" style="z-index: 99;">
      <div class="container">
        <a href="./" class="navbar-brand">
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