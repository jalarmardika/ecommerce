<?php include 'header.php'; ?>
<!-- Begin Page Content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mb-3">Ganti Password</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Ganti Password</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-5 card-outline card-success">
            <div class="card-body">
              <form action="ganti_password_aksi.php" method="post">
                <input type="hidden" name="id" required="required" value="<?php echo $data['id']; ?>">
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-sm-2">Password Lama</label>
                    <div class="col-sm-8">
                      <input type="password" name="pass_lama" required="required" placeholder="Password Lama" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-sm-2">Password Baru</label>
                    <div class="col-sm-8">
                      <input type="password" name="pass_baru" required="required" placeholder="Password Baru" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-sm-2">Konfirmasi Password</label>
                    <div class="col-sm-8">
                      <input type="password" name="konfirm" placeholder="Konfirmasi Password" required="required" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">

                  </div>
                  <div class="col-sm-5">
                    <input type="submit" name="submit" class="btn btn-danger btn-sm" value="Ganti Password">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section><!-- /.main-contetn -->

</div><!-- /.content-wrapper -->

<script type="text/javascript">
 <?php 
 if (isset($_GET['pesan'])) {
   if ($_GET['pesan'] == "ganti_password") { ?>
    Swal.fire({
      title: "Berhasil",
      text: "Password Berhasil Diganti",
      icon: "success"
    })
  <?php }elseif ($_GET['pesan'] == "konfirmasi_password_gagal") { ?>
    Swal.fire({
      title: "Gagal",
      text: "Konfirmasi Password Salah",
      icon: "error"
    })
  <?php }elseif ($_GET['pesan'] == "password_lama_salah") { ?>
    Swal.fire({
      title: "Gagal",
      text: "Password Lama Salah",
      icon: "error"
    })
  <?php }
}
?>
</script>
<?php include 'footer.php'; ?>     