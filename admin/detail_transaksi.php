<?php include 'header.php'; ?>
<!-- Begin Page Content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mb-3">Detail Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="transaksi.php">Transaksi</a></li>
            <li class="breadcrumb-item active">Detail Transaksi</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <?php 
      if (isset($_GET['id'])) {
        $id_pembelian = htmlspecialchars($_GET['id']);
        $pembelian = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
        $array_pembelian = mysqli_fetch_assoc($pembelian);
          // jika datanya ada
        if (mysqli_num_rows($pembelian) > 0) {
          ?>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-outline card-success">
                <div class="card-body">
                  <h5 class="mb-3">Timeline</h5>
                  <div class="timeline">
                    <?php 
                    if ($array_pembelian['status'] == "Selesai" ) { 
                      ?>
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-map-marker-alt bg-green"></i>

                        <div class="timeline-item">
                          <span class="time"><?php echo date('d-m-Y H:i', strtotime($array_pembelian['tgl_sampai'])); ?></span>

                          <h3 class="timeline-header">Selesai</h3>

                          <div class="timeline-body">
                            <p class="text-muted">Pesanan telah sampai ditempat tujuan, transaksi selesai</p>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                    <?php } ?>

                    <?php 
                    if ($array_pembelian['status'] == "Dikirim" || $array_pembelian['status'] == "Selesai" ) { 
                      ?>
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-truck bg-blue"></i>

                        <div class="timeline-item">
                          <span class="time"><?php echo date('d-m-Y H:i', strtotime($array_pembelian['tgl_dikirim'])); ?></span>

                          <h3 class="timeline-header">Paket Dikirim</h3>

                          <div class="timeline-body">
                            <p class="text-muted">Pesanan sedang dalam proses pengiriman</p>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                    <?php } ?>

                    <?php 
                    if ($array_pembelian['status'] == "Dikemas" || $array_pembelian['status'] == "Dikirim" || $array_pembelian['status'] == "Selesai") { 
                      ?>
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-clock bg-yellow text-white"></i>

                        <div class="timeline-item">
                          <span class="time"><?php echo date('d-m-Y H:i', strtotime($array_pembelian['tgl_dikemas'])); ?></span>

                          <h3 class="timeline-header">Sedang Dikemas</h3>

                          <div class="timeline-body">
                            <p class="text-muted">Pesanan sedang dikemas dan menunggu paket diserahkan ke pihak jasa pengiriman</p>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                    <?php } ?>
                    
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-clipboard bg-maroon"></i>

                      <div class="timeline-item">
                        <span class="time"><?php echo date('d-m-Y H:i', strtotime($array_pembelian['tgl_pembelian'])); ?></span>

                        <h3 class="timeline-header">Pesanan Dibuat</h3>

                        <div class="timeline-body">
                          <p class="text-muted">Pesanan Dibuat</p>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-5 card-outline card-success">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <h5>Detail Pembelian</h5>
                    </div>
                    <div class="col-7">
                      <?php 
                      if ($array_pembelian['status'] != "Belum Bayar") { ?>
                        <a href="#" class="text-right text-label text-success" data-toggle="modal" data-target="#modalBukti"><p>Lihat Bukti Pembayaran</p></a>
                      <?php }
                      ?>
                    </div>
                  </div>
                  
                  <?php 
                  if ($array_pembelian['status'] == "Belum Bayar" || $array_pembelian['status'] == "Pembayaran Gagal") { ?>
                    <strong class="text-danger"><?php echo $array_pembelian['status'] ?></strong>
                  <?php } elseif ($array_pembelian['status'] == "Menunggu Konfirmasi"){ ?>
                    <strong class="text-warning"><?php echo $array_pembelian['status'] ?></strong>
                  <?php } elseif ($array_pembelian['status'] == "Dikemas" || $array_pembelian['status'] == "Dikirim"){ ?>
                    <strong class="text-primary"><?php echo $array_pembelian['status'] ?></strong>
                  <?php } elseif ($array_pembelian['status'] == "Selesai"){ ?>
                    <strong class="text-success"><?php echo $array_pembelian['status'] ?></strong>
                  <?php } ?>

                  <div class="row">
                    <div class="col-12">
                      <h6 class="text-danger"><i class="fa fa-map-marker-alt"></i> Alamat Pengiriman</h6>  
                    </div>
                  </div>
                  <p class="text-muted ml-3 alamat-pengiriman" style="font-size: 12px;"><?php echo $array_pembelian['alamat_pengiriman'].", ".$array_pembelian['tipe']." ".$array_pembelian['distrik'].", ".$array_pembelian['provinsi']." - Kodepos : ".$array_pembelian['kodepos'] ?></p>
                  <p class="text-muted ml-3 mb-3 label-paket" style="font-size: 12px; margin-bottom: -4px; margin-top: -10px;">Ekspedisi : <?php echo strtoupper($array_pembelian['ekspedisi'])." - Paket : ".$array_pembelian['paket']." Rp.".number_format($array_pembelian['ongkir'])." ".$array_pembelian['estimasi']." Hari" ?></p>
                  <?php 
                  if ($array_pembelian['status'] == "Dikirim" || $array_pembelian['status'] == "Selesai") { ?>
                    <p class="text-muted ml-3 mb-3 label-paket" style="font-size: 12px; margin-bottom: -4px; margin-top: -10px;">Resi Pengiriman : <?php echo $array_pembelian['resi_pengiriman']; ?></p>
                  <?php }
                  ?>
                  <table width="100%" class="table table-hover table-responsive-md">
                    <tbody>
                      <?php 
                      // menampilkan produk detail_pembelian yang id_varian nya kosong
                      $detail_pembelian = mysqli_query($koneksi, "SELECT * FROM detail_pembelian JOIN produk ON detail_pembelian.id_produk=produk.id_produk WHERE id_varian IS NULL AND id_pembelian='$id_pembelian'");
                      while ($value = mysqli_fetch_assoc($detail_pembelian)) {
                        ?>     
                        <tr>
                          <td width="10%">
                            <img src="../assets/img-produk/<?php echo $value['gambar_produk']; ?>" style="width: 100px;">
                          </td>
                          <td>
                            <h5 class="text-produk">
                              <?php
                              if (strlen($value['nama_produk']) > 100) {
                                echo substr($value['nama_produk'], 0, 100)."...";
                              }else{
                                echo $value['nama_produk'];
                              }
                              ?>
                            </h5>
                            <p class="text-label text-muted"><?php echo $value['warna']; ?> | <?php echo $value['ukuran']; ?></p>
                            <p class="text-label text-muted" style="margin-top: -13px;"><?php echo number_format($value['kuantitas']); ?> (<?php echo number_format($value['sub_berat']); ?> gram)</p>
                            <p class="text-label text-danger" style="margin-top: -13px;">
                              <b>Rp.<?php echo number_format($value['sub_harga']); ?></b>    
                            </p>
                          </td>
                        </tr>                
                      <?php } 

                      // menampilkan produk detail_pembelian yang id_varian nya tidak kosong
                      $detail_pembelian_varian = mysqli_query($koneksi, "SELECT * FROM detail_pembelian JOIN produk ON detail_pembelian.id_produk=produk.id_produk JOIN varian ON detail_pembelian.id_varian=varian.id_varian WHERE detail_pembelian.id_varian IS NOT NULL AND id_pembelian='$id_pembelian'");
                      while ($val = mysqli_fetch_assoc($detail_pembelian_varian)) {
                        ?>     
                        <tr>
                          <td width="10%">
                            <img src="../assets/img-produk/<?php echo $val['gambar_varian']; ?>" style="width: 100px;">
                          </td>
                          <td>
                            <h5 class="text-produk">
                              <?php
                              if (strlen($val['nama_produk']) > 100) {
                                echo substr($val['nama_produk'], 0, 100)."...";
                              }else{
                                echo $val['nama_produk'];
                              }
                              ?>
                            </h5>
                            <p class="text-label text-muted"><?php echo $val['warna']; ?> | <?php echo $val['ukuran']; ?></p>
                            <p class="text-label text-muted" style="margin-top: -13px;"><?php echo number_format($val['kuantitas']); ?> (<?php echo number_format($val['sub_berat']); ?> gram)</p>
                            <p class="text-label text-danger" style="margin-top: -13px;">
                              <b>Rp.<?php echo number_format($val['sub_harga']); ?></b>    
                            </p>
                          </td>
                        </tr>                
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="row mt-3 mb-3 pr-2 pl-2">
                    <div class="col-5">
                      <p class="text-label text-muted"><b>Total Berat :</b></p>
                    </div>
                    <div class="col-7">
                      <p class="text-label text-right text-danger"><b><?php echo number_format($array_pembelian['total_berat']); ?> gram</b></p>
                    </div>
                    <div class="col-5">
                      <p class="text-label text-muted"><b>Ongkir :</b></p>
                    </div>
                    <div class="col-7">
                      <p class="text-label text-right text-danger"><b>Rp.<?php echo number_format($array_pembelian['ongkir']); ?></b></p>
                    </div>
                    <div class="col-5">
                      <p class="text-label text-muted"><b>Total Pembelian :</b></p>
                    </div>
                    <div class="col-7">
                      <p class="text-label text-right text-danger"><b>Rp.<?php echo number_format($array_pembelian['total_pembelian']); ?></b></p>
                    </div>
                    <div class="col-5">
                      <p class="text-label text-muted"><b>Total Bayar :</b></p>
                    </div>
                    <div class="col-7">
                      <p class="text-label text-right text-danger"><b>Rp.<?php echo number_format($array_pembelian['total_bayar']); ?></b></p>
                    </div>
                  </div>
                  <div class="d-flex justify-content-end">
                    <?php
                    if ($array_pembelian['status'] == "Menunggu Konfirmasi") { ?>

                      <button type="button" name="button" class="btn btn-success btn-sm btn-confirm mr-1" data-id="<?php echo $array_pembelian['id_pembelian']; ?>">Lolos Verifikasi</button>
                      <button type="button" data-id="<?php echo $array_pembelian['id_pembelian']; ?>" class="btn btn-danger btn-no-confirm btn-sm">Tidak lolos</button>
                      
                    <?php }elseif ($array_pembelian['status'] == "Dikemas") { ?>
                      <button type="button" name="button" class="btn btn-primary btn-sm btn-kirim mr-1" data-toggle="modal" data-target="#modalKirim">Kirim</button>

                    <?php }elseif ($array_pembelian['status'] == "Dikirim") { ?>
                      <button type="button" name="button" class="btn btn-primary btn-sm btn-sampai mr-1" data-id="<?php echo $array_pembelian['id_pembelian']; ?>">Sampai</button>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } } ?>
      </div>
      
    </div><!-- /.container-fluid -->
  </section><!-- /.main-contetn -->

</div><!-- /.content-wrapper -->

<!-- modal bukti -->
<div class="modal" tabindex="-1" id="modalBukti">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <center>
          <img src="../assets/bukti/<?php echo $array_pembelian['bukti']; ?>" class="img-fluid">
        </center>
      </div>
    </div>
  </div>
</div>

<!-- modal kirim -->
<div class="modal" tabindex="-1" id="modalKirim">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pengiriman Paket</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="kirim.php" method="post">
          <input type="hidden" name="id" value="<?php echo $array_pembelian['id_pembelian']; ?>">
          <div class="form-group">
            <label>Resi Pengiriman</label>
            <input type="text" name="resi" class="form-control" required="required" autocomplete="off">
          </div>
          <button type="submit" name="submit" class="btn btn-sm btn-primary float-right">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $('.btn-confirm').on('click', function (e) {
      e.preventDefault();
      let id = $(this).data('id');
      Swal.fire({
        title: 'Apakah anda yakin',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        showClass: {
          popup: 'animate__animated animate__bounce',
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp',
        }
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
           url: 'konfirm.php',
           type:'get',
           dataType: 'json',
           data: 'id='+id,
           cache: false,
           success: function(response){
            let icon = '';
            if (response.title == "Berhasil") {
              icon = 'success';
            }else{
              icon = 'error'
            }
            Swal.fire({
             title: response.title,
             text: response.text,
             icon
           }).then((hasil) => {
            if (hasil.isConfirmed) {
              window.location.reload();
            }
          })

         },
         error: function(xhr, thrownError) {
           alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
         }
       })
        }
      })

    })

    $('.btn-no-confirm').on('click', function (e) {
      e.preventDefault();
      let id = $(this).data('id');
      Swal.fire({
        title: 'Apakah anda yakin',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        showClass: {
          popup: 'animate__animated animate__bounce',
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp',
        }
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
           url: 'tidak_lolos.php',
           type:'get',
           dataType: 'json',
           data: 'id='+id,
           cache: false,
           success: function(response){
            let icon = '';
            if (response.title == "Berhasil") {
              icon = 'success';
            }else{
              icon = 'error'
            }
            Swal.fire({
             title: response.title,
             text: response.text,
             icon
           }).then((hasil) => {
            if (hasil.isConfirmed) {
              window.location.reload();
            }
          })

         },
         error: function(xhr, thrownError) {
           alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
         }
       })
        }
      })

    })

    $('.btn-sampai').on('click', function (e) {
      e.preventDefault();
      let id = $(this).data('id');
      Swal.fire({
        title: 'Apakah anda yakin',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        showClass: {
          popup: 'animate__animated animate__bounce',
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp',
        }
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
           url: 'sampai.php',
           type:'get',
           dataType: 'json',
           data: 'id='+id,
           cache: false,
           success: function(response){
            let icon = '';
            if (response.title == "Berhasil") {
              icon = 'success';
            }else{
              icon = 'error'
            }
            Swal.fire({
             title: response.title,
             text: response.text,
             icon
           }).then((hasil) => {
            if (hasil.isConfirmed) {
              window.location.reload();
            }
          })

         },
         error: function(xhr, thrownError) {
           alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
         }
       })
        }
      })

    })

    <?php 
    if (isset($_GET['pesan'])) {
      if ($_GET['pesan'] == "kirim") { ?>
       Swal.fire({
         title: "Berhasil",
         text: "Paket Berhasil Dikirim",
         icon: "success"
       })
     <?php }elseif ($_GET['pesan'] == "gagalKirim") { ?>
       Swal.fire({
         title: "Terjadi Kesalahan",
         text: "Paket Gagal Dikirim",
         icon: "error"
       })
     <?php }elseif ($_GET['pesan'] == "tidak_lolos") { ?>
       Swal.fire({
         title: "Berhasil",
         text: "Transaksi Berhasil Diverifikasi",
         icon: "success"
       })
     <?php }
   }
   ?>    
 })
</script>
<!-- End of Main Content -->
<?php include 'footer.php'; ?>     