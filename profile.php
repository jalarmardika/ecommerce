<?php  include 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section id="section-content" class="mt-5">
    <div class="container pb-5 mt-5">
      <div class="row">
        <div class="col-md-3">
          <div class="card shadow mt-6">
            <div class="card-body">
              <?php 
              $id = htmlspecialchars($_SESSION['id_pelanggan']);
              $profil = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id' ");
              $data = mysqli_fetch_assoc($profil);
              ?>
              <center>

                <?php 
                if ($data['foto'] == "") { ?>

                  <i class="fa fa-user-circle fa-6x text-muted mb-4"></i>

                <?php }else{ ?>

                  <img src="assets/photo-profile/<?= $data['foto']; ?>" alt="<?= $data['nama']; ?>" class="rounded-circle img-profile mb-4">

                <?php } ?>
                
              </center>
              <p><b>Nama Lengkap</b></p>
              <p class="text-muted paragraf-profile"><?= $data['nama']; ?></p>
              <p class=" label-profile"><b>Email</b></p>
              <p class="text-muted paragraf-profile"><?= $data['email']; ?></p>
              <p class=" label-profile"><b>No Handphone</b></p>
              <p class="text-muted paragraf-profile"><?= $data['no_hp']; ?></p>
              <div class="row">
                <div class="col-lg-6">
                  <button class="btn btn-sm btn-outline-danger btn-block mb-1" data-toggle="modal" data-target="#mymodalEditProfile">Edit Profile</button>
                </div>
                <div class="col-lg-6">
                  <a href="#" class="btn btn-sm btn-danger btn-logout btn-block">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card shadow card-transaksi mb-4">
            <div class="card-body">
              <h4 class="mb-4">Data Transaksi</h4>
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active text-danger" data-status="Belum Bayar" href="#">Belum Bayar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Menunggu Konfirmasi" href="#">Menunggu Konfirmasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Pembayaran Gagal" href="#">Pembayaran Gagal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Dikemas" href="#">Dikemas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Dikirim" href="#">Dikirim</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Selesai" href="#">Selesai</a>
                </li>
              </ul>
              <div class="data-transaksi mt-3">

              </div>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container -->
  </section><!-- end section  -->
</div>
<!-- /.content-wrapper -->
<div class="modal" tabindex="-1" id="mymodalEditProfile">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <center>
          <?php 
          if ($data['foto'] == "") { ?>

            <i class="fa fa-user-circle fa-6x text-muted mb-4"></i>

          <?php }else{ ?>

            <img src="assets/photo-profile/<?= $data['foto']; ?>" alt="<?= $data['nama']; ?>" class="rounded-circle img-profile mb-4">

          <?php } ?>
        </center>
        <form action="profile_edit.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>">
          
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" class="form-control" required="required" name="nama" value="<?php echo $data['nama']; ?>">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" required="required" name="email" value="<?php echo $data['email']; ?>">
          </div>
          <div class="form-group">
            <label>Password (Optional)</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password Baru Jika Ingin Ganti">
          </div>
          <div class="form-group">
            <label for="no_hp">No Handphone</label>
            <input type="text" id="no_hp" class="form-control" required="required" name="no_hp" value="<?php echo $data['no_hp']; ?>">
          </div>
          <div class="form-group">
            <label for="foto">Foto (Optional)</label>
            <input type="file" name="foto" id="foto" class="form-control">                
          </div>
          <div class="row">
            <div class="col-12">
              <input type="submit" name="submit" value="Perbarui" class="btn btn-primary btn-sm float-right mt-3">
              <?php 
              if ($data['foto'] != "") { ?>
                <a href="hapus_foto.php" class="btn btn-danger btn-sm float-right mt-3" style="margin-right: 5px;">Hapus Foto</a>
              <?php } ?>
            </div>
          </div>
          
        </form>
      </div>
      
    </div>
  </div>
</div>
<script type="text/javascript">
  $.ajax({
    url: "data-transaksi.php",
    type: "get",
    success: function(result){
      $('.data-transaksi').html(result);
      $('#table').DataTable();
    }
  })

  $('.nav-tabs').on('click', '.nav-link', function(e){
    e.preventDefault();
    $('.nav-tabs .nav-link').removeClass('active text-danger');
    $(this).addClass('active text-danger');

    $.ajax({
      url: "data-transaksi.php",
      type: "get",
      data: {
        'status': $(this).data('status')
      },
      success: function(response){
        $('.data-transaksi').html(response);
        $('#table').DataTable();
      }
    })

  })

  $('.btn-logout').on('click', function(e){
    e.preventDefault();
    Swal.fire({
      title: "Konfirmasi",
      text: "Apakah anda ingin keluar",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, keluar',
      showClass: {
        popup: 'animate__animated animate__bounce',
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp',
      }
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "logout.php";
      }
    })
  })

  <?php 
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "editProfile") { ?>
      Swal.fire({
        title: "Berhasil",
        text: "Profile Berhasil Di Edit",
        icon: "success"
      })
    <?php }elseif ($_GET['pesan'] == "bukanGambar") { ?>
     Swal.fire({
      title: "Terjadi Kesalahan",
      text: "Format file harus jpg/jpeg/png",
      icon: "error"
    })
   <?php }elseif ($_GET['pesan'] == "hapusFoto") { ?>
     Swal.fire({
      title: "Berhasil",
      text: "Foto Berhasil Dihapus",
      icon: "success"
    })
   <?php }
 } 
 ?>

</script>
<?php include 'footer.php'; ?>