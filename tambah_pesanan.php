<?php include 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section id="section-content" class="mt-5">
    <div class="container pb-5 mt-5">
      <div class="row">
        <div class="col-12">
          <?php 
          $id = htmlspecialchars($_GET['id']);
          $produk = mysqli_query($koneksi,"SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id'");
          if (mysqli_num_rows($produk) > 0) {                    
            $fetch = mysqli_fetch_assoc($produk);
            ?>
            <div class="card mb-3 mt-6">
              <div class="card-body">
                <form action="keranjang_tambah.php" method="post">
                  <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $fetch['id_produk']; ?>">
                  <input type="hidden" name="id_varian" id="id_varian" value="">
                  <input type="hidden" name="nama_produk" value="<?php echo $fetch['nama_produk']; ?>">
                  <input type="hidden" name="harga" id="harga" value="<?php echo $fetch['harga']; ?>">
                  <input type="hidden" name="berat" id="berat" value="<?php echo $fetch['berat']; ?>">
                  <input type="hidden" name="warna" id="warna" value="<?php echo $fetch['warna']; ?>">
                  <input type="hidden" name="ukuran" id="ukuran" value="<?php echo $fetch['ukuran']; ?>">
                  <input type="hidden" name="gambar_produk" id="gambar_produk" value="<?php echo $fetch['gambar_produk']; ?>">
                  <div class="row">
                    <div class="col-md-5">
                      <img class="w-100 img-fluid mb-3 img-produk" src="assets/img-produk/<?php echo $fetch['gambar_produk']; ?>">
                    </div>
                    <div class="col-md-7">
                      <div class="ml-3">
                        <h5><b><?php echo $fetch['nama_produk']; ?></b></h5>
                        <p class="text-muted label-terjual" style="font-size: 12px;">Terjual <script> singkatAngka($fetch['terjual']); </script></p>

                        <h5 class="text-danger label-harga mb-3"></h5>

                        <div class="row mb-1">
                          <div class="col-md-2">
                            <p class="text-muted text-label mb-2"><b>Kategori</b></p>
                          </div>
                          <div class="col-md-9">
                            <p class="text-muted text-label mb-2"><?php echo $fetch['nama_kategori']; ?></p>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-2">
                            <p class="text-muted text-label mb-2"><b>Berat</b></p>
                          </div>
                          <div class="col-md-9">
                            <p class="text-muted text-label label-berat mb-2"><?php echo number_format($fetch['berat']); ?> gram</p>
                          </div>
                        </div>
                        <?php 
                        $produk_utama = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$id'");
                        $array_produk = mysqli_fetch_assoc($produk_utama);

                        if ($array_produk['warna'] != '') { ?>
                          <div class="row mb-2">
                            <div class="col-md-2">
                              <p class="text-muted text-label mb-2"><b>Warna</b></p>
                            </div>
                            <div class="col-md-9">
                              <a class="btn btn-sm warna warna-aktif mb-2"><?php echo $array_produk['warna'] ?></a>

                              <?php
                            // tampilkan DATA WARNA VARIAN yang tidak sama dengan DATA WARNA PRODUK UTAMA dan apabila ada DATA WARNA VARIAN yg kembar tampilkan satu saja
                              $warna = mysqli_query($koneksi,"SELECT DISTINCT warna FROM varian WHERE warna!='$array_produk[warna]' and id_produk='$id'");
                              while ($d = mysqli_fetch_assoc($warna)) { ?>
                                <a class="btn btn-sm warna warna-tidak-aktif mb-2"><?php echo $d['warna'] ?></a>
                              <?php }
                              ?>
                            </div>
                          </div>
                        <?php } ?>

                        <?php if ($array_produk['ukuran'] != '') { ?>
                          <div class="row mb-3">
                            <div class="col-md-2">
                              <p class="text-muted text-label mb-2"><b>Ukuran</b></p>
                            </div>
                            <div class="col-md-9">
                              <a class="btn btn-sm ukuran ukuran-aktif mb-2"><?php echo $array_produk['ukuran'] ?></a>
                              <?php
                            // tampilkan DATA UKURAN VARIAN yang tidak sama dengan DATA UKURAN PRODUK UTAMA dan apabila ada DATA UKURAN VARIAN yg kembar tampilkan satu saja
                              $ukuran = mysqli_query($koneksi,"SELECT DISTINCT ukuran FROM varian WHERE ukuran!='$array_produk[ukuran]' and id_produk='$id'");
                              while ($d = mysqli_fetch_assoc($ukuran)) { ?>
                                <a class="btn btn-sm ukuran ukuran-tidak-aktif mb-2"><?php echo $d['ukuran'] ?></a>
                              <?php }
                              ?>
                            </div>
                          </div>
                        <?php } ?>
                        <div class="row mb-3">
                          <div class="col-md-2">
                            <p class="text-muted text-label mb-2"><b>Kuantitas</b></p>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <input type="number" class="form-control text-center kuantitas" min="1" max="<?php echo $fetch['stok']; ?>" style="height: 30px;" value="1" required="required" name="kuantitas" autofocus>
                            </div>
                            
                          </div>
                          <div class="col-md-8">
                           <p class="text-muted text-label mb-2 label-stok">Tersedia <?php echo number_format($fetch['stok']); ?> buah</p>
                         </div>
                       </div>

                       <div class="row mb-3">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-md btn-danger"><i class="fa fa-cart-plus"></i> Masukkan Keranjang</button>
                            <a href="./#produk" class="btn btn-outline-danger btn-md">Kembali</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card mb-5">
            <div class="card-header">
              <h5><b>Deskripsi Produk</b></h5>
            </div>
            <div class="card-body">
              <?= $fetch['deskripsi']; ?>
            </div>
          </div>

        <?php }else{ ?>
          <div class="card mt-6">
            <div class="card-body">
              <center>
                <p class="text-muted">Data Tidak Ditemukan</p>
              </center>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div><!-- /.container -->
</section>
<!-- end section -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function(){

    function singkatAngka(number){
      let singkatan = ['','rb','jt','M','T'];

      if (number < 1000) {
        return number.toString();
      }

      let indexSingkatan = 0;
      while (number >= 1000 && indexSingkatan < singkatan.length - 1){
        number /= 1000;
        indexSingkatan++;
      }

      number = Math.round(number*100) / 100;
      return number.toString() + " " + singkatan[indexSingkatan];
    }

    <?php 
    if (isset($_GET['pesan'])) {
      if ($_GET['pesan'] == "sudahAda") { ?>
        Swal.fire({
          title: "Peringatan",
          text: "Produk Sudah Ada Dikeranjang",
          icon: "warning"
        })

      <?php }
    }
    ?>

    let harga = <?php echo $fetch['harga']; ?>;
    $('.label-harga').html('Rp. ' + harga.toLocaleString());
    let stok = <?php echo $fetch['stok']; ?>;
    $('.label-stok').html('Tersedia ' + stok.toLocaleString() + ' buah');
    $('.label-terjual').html('Terjual '+singkatAngka(<?php echo $fetch['terjual']; ?>));
      // ketika elemen html dengan class ukuran di klik
      $('.ukuran').on('click', function(e){
        e.preventDefault();
        $('.ukuran').removeClass('ukuran-aktif');
        $('.ukuran').addClass('ukuran-tidak-aktif');

        $(this).removeClass('ukuran-tidak-aktif');
        $(this).addClass('ukuran-aktif');

        $('.label-harga').html('');
        $('.label-berat').html('');
        $('.label-terjual').html('Terjual 0');
        $('.label-stok').html('Tersedia 0 buah');
        $('.kuantitas').attr('max', 0);
        $('#ukuran').val($(this).html());
        $('#id_varian').val('');

        let jml_warna_aktif = $('.warna-aktif').length;
        if (jml_warna_aktif > 0) {
          $.ajax({
            url: 'ajax-varian.php',
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
              'id_produk' : $('#id_produk').val(),
              'ukuran' : $(this).html(),
              'warna' : $('.warna-aktif').html()
            },
            success: function(response){

              if (response.gambar != '') {
                $('#harga').val(response.harga);
                $('#berat').val(response.berat);
                $('.img-produk').attr('src','assets/img-produk/'+response.gambar);
                $('#gambar_produk').attr('value',response.gambar);
                $('.kuantitas').attr('max',response.stok);
                $('.label-harga').html('Rp.'+parseInt(response.harga).toLocaleString());
                $('.label-berat').html(parseInt(response.berat).toLocaleString()+' gram');
                $('.label-terjual').html('Terjual '+singkatAngka(response.terjual));
                $('.label-stok').html('Tersedia '+parseInt(response.stok).toLocaleString()+' buah');

                if (response.id_varian != '') {
                  $('#id_varian').val(response.id_varian);
                }
                
              }
            },
          });
        }else{
          $.ajax({
            url: 'ajax-varian.php',
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
              'id_produk' : $('#id_produk').val(),
              'ukuran' : $(this).html(),
              'warna' : ''
            },
            success: function(response2){

              if (response2.gambar != '') {
                $('#harga').val(response2.harga);
                $('#berat').val(response2.berat);
                $('.img-produk').attr('src','assets/img-produk/'+response2.gambar);
                $('#gambar_produk').attr('value',response2.gambar);
                $('.kuantitas').attr('max',response2.stok);
                $('.label-harga').html('Rp.'+parseInt(response2.harga).toLocaleString());
                $('.label-berat').html(parseInt(response2.berat).toLocaleString()+' gram');
                $('.label-terjual').html('Terjual '+singkatAngka(response2.terjual));
                $('.label-stok').html('Tersedia '+parseInt(response2.stok).toLocaleString()+' buah');

                if (response2.id_varian != '') {
                  $('#id_varian').val(response2.id_varian);
                }
                
              }
            },
          });
        }

      });

      // ketika elemen html dengan class warna di klik

      $('.warna').on('click', function(e){
        e.preventDefault();
        $('.warna').removeClass('warna-aktif');
        $('.warna').addClass('warna-tidak-aktif');

        $(this).removeClass('warna-tidak-aktif');
        $(this).addClass('warna-aktif');

        $('.label-harga').html('');
        $('.label-berat').html('');
        $('.label-terjual').html('Terjual 0');
        $('.label-stok').html('Tersedia 0 buah');
        $('.kuantitas').attr('max', 0);
        $('#warna').val($(this).html());
        $('#id_varian').val('');

        let warna_terpilih = $(this).html();
        let ukuran_terpilih = $('.ukuran-aktif').html();

        let jml_ukuran_aktif = $('.ukuran-aktif').length;
        if (jml_ukuran_aktif > 0) {
          $.ajax({
            url: 'ajax-varian.php',
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
              'id_produk' : $('#id_produk').val(),
              'ukuran' : $('.ukuran-aktif').html(),
              'warna' : $(this).html()
            },
            success: function(response){
              if (response.gambar != '') {
                $('#harga').val(response.harga);
                $('#berat').val(response.berat);
                $('.img-produk').attr('src','assets/img-produk/'+response.gambar);
                $('#gambar_produk').attr('value',response.gambar);
                $('.kuantitas').attr('max',response.stok);
                $('.label-harga').html('Rp.'+parseInt(response.harga).toLocaleString());
                $('.label-berat').html(parseInt(response.berat).toLocaleString()+' gram');
                $('.label-terjual').html('Terjual '+singkatAngka(response.terjual));
                $('.label-stok').html('Tersedia '+parseInt(response.stok).toLocaleString()+' buah');

                if (response.id_varian != '') {
                  $('#id_varian').val(response.id_varian);
                }
                
              }
            },
          });
        }else{
          $.ajax({
            url: 'ajax-varian.php',
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
              'id_produk' : $('#id_produk').val(),
              'ukuran' : '',
              'warna' : $(this).html()
            },
            success: function(response2){

              if (response2.gambar != '') {
                $('#harga').val(response2.harga);
                $('#berat').val(response2.berat);
                $('.img-produk').attr('src','assets/img-produk/'+response2.gambar);
                $('#gambar_produk').attr('value',response2.gambar);
                $('.kuantitas').attr('max',response2.stok);
                $('.label-harga').html('Rp.'+parseInt(response2.harga).toLocaleString());
                $('.label-berat').html(parseInt(response2.berat).toLocaleString()+' gram');
                $('.label-terjual').html('Terjual '+singkatAngka(response2.terjual));
                $('.label-stok').html('Tersedia '+parseInt(response2.stok).toLocaleString()+' buah');

                if (response2.id_varian != '') {
                  $('#id_varian').val(response2.id_varian);
                }
                
              }
            },
          });
        }
      });
    })
  </script>
  <?php include 'footer.php' ?>