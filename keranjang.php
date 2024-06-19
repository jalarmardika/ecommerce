<?php  include 'header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section id="section-content" class="mt-5">
    <div class="container pb-5 mt-5">
      <div class="row">
        <div class="col-md-12">
          <?php
          if (isset($_SESSION['cart']) and $_SESSION['cart'] != []) {
            ?>
            <div class="card mb-2 mt-6">
              <div class="card-body">
                <h5 class="d-inline-block">Keranjang Belanja</h5>
                <a href="#" class="float-right text-danger" data-toggle="modal" data-target="#modalAlamat" style="font-size: 12px;">Tentukan Alamat</a>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-responsive mb-3">
                  <tbody>
                   <?php 
                   $total = 0;
                   $total_berat = 0;
                   foreach ($_SESSION['cart'] as $key => $value) {
                    $total += $value['sub_harga'];
                    $total_berat += $value['sub_berat'];
                    ?>

                    <tr>
                      <td width="10%">
                       <img src="assets/img-produk/<?php echo $value['gambar_produk']; ?>" style="width: 100px;">
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
                    <td align="right">
                      <a href="keranjang_hapus.php?key=<?php echo $key; ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>

                <?php } ?>

              </tbody>
            </table>

            <div class="row mb-3 pr-2 pl-2">
              <div class="col-5">
                <p class="text-label text-muted"><b>Total Berat :</b></p>
              </div>
              <div class="col-7">
                <p class="text-label text-right text-danger"><b><?php echo number_format($total_berat); ?> gram</b></p>
              </div>
              <div class="col-5">
                <p class="text-label text-muted"><b>Total Pembelian :</b></p>
              </div>
              <div class="col-7">
                <p class="text-label text-right text-danger"><b>Rp.<?php echo number_format($total); ?></b></p>
              </div>
              <div class="col-5">
                <p class="text-label text-muted"><b>Ongkir :</b></p>
              </div>
              <div class="col-7">
                <p class="text-label text-right text-danger"><b class="label-ongkir">-</b></p>
              </div>
              <div class="col-5">
                <p class="text-label text-muted"><b>Total Bayar :</b></p>
              </div>
              <div class="col-7">
                <p class="text-label text-right text-danger"><b class="label-total-bayar">-</b></p>
              </div>
            </div>

            <div class="d-flex justify-content-end">
              <form action="checkout.php" method="post" id="form-checkout">
                <input type="hidden" name="total_pembelian" value="<?php echo $total; ?>">
                <input type="hidden" name="total_berat" value="<?php echo $total_berat; ?>">
                <input type="hidden" name="provinsi" value="">
                <input type="hidden" name="tipe" value="">
                <input type="hidden" name="distrik" value="">
                <input type="hidden" name="kodepos" value="">
                <input type="hidden" name="ekspedisi" value="">
                <input type="hidden" name="paket" value="">
                <input type="hidden" name="ongkir" value="">
                <input type="hidden" name="estimasi" value="">
                <!-- modal alamat -->
                <div class="modal" tabindex="-1" id="modalAlamat">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Tentukan Alamat Pengiriman</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Provinsi</label>
                              <select class="form-control" name="nama_provinsi"></select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Distrik</label>
                              <select class="form-control" name="nama_distrik"></select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Ekspedisi</label>
                              <select class="form-control" name="nama_ekspedisi"></select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Paket</label>
                              <select class="form-control" name="nama_paket"></select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Alamat Lengkap</label>
                          <textarea class="form-control" name="alamat" placeholder="Contoh : Jl. Soponyono No.1 Desa Kedungsuren RT 04 RW 05 Kec. Kaliwungu Selatan"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="./#produk" class="btn btn-default btn-sm">Kembali Belanja</a>
                <button type="submit" name="submit" class="btn btn-danger btn-sm" value="checkout">Checkout</button>
              </form>
            </div>
          </div>
        </div>
      <?php } else{ ?>
        <div class="card mb-2 mt-6">
          <div class="card-body">
            <h5>Keranjang Belanja</h5>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <center>
              <i class="text-muted fa fa-shopping-cart fa-2x mb-3"></i>
              <p class="text-muted">Keranjang Masih Kosong</p>
              <a href="./#produk" class="btn btn-danger btn-sm mt-2">Kembali Belanja</a>
            </center>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div><!-- /.container -->
</section><!-- end section  -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function(){
  // request semua data provinsi di indonesia
  $.ajax({
    type: 'get',
    url: 'rajaongkir/provinsi.php',
    success: function(hasil_provinsi){
      $("select[name=nama_provinsi]").html(hasil_provinsi);
    }
  })
  function kosongkan(){
    $("select[name=nama_ekspedisi]").html('');
    $("select[name=nama_paket]").html('');
    $("input[name=ekspedisi]").val('');
    $("input[name=paket]").val('');
    $("input[name=ongkir]").val('');
    $("input[name=estimasi]").val('');
    $("input[name=provinsi]").val('');
    $("input[name=distrik]").val('');
    $("input[name=tipe]").val('');
    $("input[name=kodepos]").val('');
  }
  $("select[name=nama_provinsi]").on("change", function(){
    kosongkan();
    // setelah dikosongkan, ambil id_provinsi yg dipilih (dari atribut pribadi) dan lakukan request
    let id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
    $.ajax({
      type: 'post',
      url: 'rajaongkir/distrik.php',
      data: 'id_provinsi='+id_provinsi_terpilih,
      success:function(hasil_distrik){
        $("select[name=nama_distrik]").html(hasil_distrik);
      }
    })
  })

  $("select[name=nama_distrik]").on("change", function(){
    kosongkan();
    let prov = $("option:selected", this).attr('nama_provinsi');
    let dist = $("option:selected", this).attr('nama_distrik');
    let tipe = $("option:selected", this).attr('tipe_distrik');
    let kodepos = $("option:selected", this).attr('kodepos');
    // isi inputan
    $("input[name=provinsi]").val(prov);
    $("input[name=distrik]").val(dist);
    $("input[name=tipe]").val(tipe);
    $("input[name=kodepos]").val(kodepos);

    $.ajax({
      type: 'get',
      url: 'rajaongkir/ekspedisi.php',
      success: function(hasil_ekspedisi) {
        $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
      }
    })
  })

  $("select[name=nama_ekspedisi]").on("change", function(){
    // Mendapatkan ekspedisi yang dipilih
    let ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
    // Mendapatkan id_distrik yang dipilih
    let distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
    // Mendapatkan total berat dari inputan
    let total_berat = $("input[name=total_berat]").val();
    $.ajax({
      type: 'post',
      url: 'rajaongkir/paket.php',
      data: 'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
      success: function(hasil_paket){
        $("select[name=nama_paket]").html(hasil_paket);
        $("input[name=ekspedisi]").val(ekspedisi_terpilih);
      }
    })
  })

  $("select[name=nama_paket]").on("change", function(){
    let paket = $("option:selected", this).attr("paket");
    let ongkir = $("option:selected", this).attr("ongkir");
    let etd = $("option:selected", this).attr("etd");
    // isi inputan
    $("input[name=paket]").val(paket);
    $("input[name=ongkir]").val(ongkir);
    $("input[name=estimasi]").val(etd);
    // ubah label
    $('.label-ongkir').html(`Rp.${parseInt(ongkir).toLocaleString()}`)
    const totalPembelian = $('input[name=total_pembelian]').val()
    let totalBayar = parseInt(ongkir) + parseInt(totalPembelian);
    $('.label-total-bayar').html(`Rp.${totalBayar.toLocaleString()}`)
  })

  $('#form-checkout').on('submit', function(){
    const provinsi = $('input[name=provinsi]').val()
    const tipe = $('input[name=tipe]').val()
    const distrik = $('input[name=distrik]').val()
    const kodepos = $('input[name=kodepos]').val()
    const ekspedisi = $('input[name=ekspedisi]').val()
    const paket = $('input[name=paket]').val()
    const ongkir = $('input[name=ongkir]').val()
    const estimasi = $('input[name=estimasi]').val()
    const alamat = $('textarea[name=alamat]').val()
    if (provinsi === "" || tipe === "" || distrik === "" || kodepos === "" || ekspedisi === "" || paket === "" || ongkir === "" || estimasi === "" || alamat === "") {
      Swal.fire({
        title: "Gagal",
        text: "Alamat Pengiriman Belum Lengkap",
        icon: "error"
      })
      return false;
    }else{
      return true;
    }
  })

})
</script>
<?php include 'footer.php'; ?>