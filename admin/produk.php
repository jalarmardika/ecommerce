<?php include 'header.php'; ?>
<!-- Begin Page Content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mb-3">Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Produk</li>
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
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-5 card-outline card-success">
            <div class="card-body">
             <?php if ($data['level'] == "Admin") { ?>
              <a href="tambah_produk.php" class="btn btn-primary btn-sm mb-4" ><i class="fa fa-plus"></i> Tambah Produk</a>
            <?php } ?>
            <table id="table" class="table table-bordered table-striped table-hover table-responsive">
              <thead >
                <tr>
                  <th width="1%">No</th>
                  <th>Gambar</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th class="text-center">Harga</th>
                  <th class="text-center">Stok</th>
                  <th width="15%">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_GET['id_kategori'])) {
                  $id_kategori = htmlspecialchars($_GET['id_kategori']);
                  $produk = mysqli_query($koneksi,"SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_kategori='$id_kategori' ORDER BY id_produk DESC ");
                }else{
                  $produk = mysqli_query($koneksi,"SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY id_produk DESC ");
                }
                $no = 1;
                while ($d = mysqli_fetch_assoc($produk)) {
                 $gambar = $d['gambar_produk'];
                 if ($gambar=="") {
                  $images = 'No Photo';
                }else{
                  $images = '<img style="width:100px;" src="../assets/img-produk/'.$gambar.'">';
                }
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $images; ?></td>
                  <td>
                    <?php 
                    if (strlen($d['nama_produk']) > 50) {
                      echo substr($d['nama_produk'], 0, 50)."..."; 
                    } else {
                      echo $d['nama_produk'];
                    }
                    ?>
                  </td>
                  <td><?php echo $d['nama_kategori']; ?></td>
                  <td class="text-center">Rp.<?php echo number_format($d['harga']); ?></td>
                  <td class="text-center"><?php echo number_format($d['stok']); ?></td>
                  <td>
                    <a class="btn btn-warning btn-detail btn-sm text-white" title="Detail" data-id="<?=$d['id_produk']; ?>" data-nama="<?=$d['nama_produk']; ?>" data-kategori="<?=$d['nama_kategori']; ?>" data-warna="<?=$d['warna']; ?>" data-ukuran="<?=$d['ukuran']; ?>" data-harga="Rp. <?=number_format($d['harga']); ?>" data-berat="<?=number_format($d['berat']); ?> gram" data-deskripsi="<?=$d['deskripsi']; ?>" data-stok="<?=$d['stok']; ?>" data-terjual="<?=$d['terjual']; ?>" data-gambar="<?=$d['gambar_produk']; ?>"><i class="fa fa-eye"></i></a>

                    <a title="Varian Produk" class="btn btn-info btn-sm text-white" href="varian.php?id=<?php echo $d['id_produk']; ?>"><i class="fa fa-list"></i></a>
                    <?php if ($data['level'] == "Admin") { ?>
                      <a class="btn btn-success btn-edit btn-sm text-white" title="Edit" href="edit_produk.php?id=<?=$d['id_produk']; ?>"><i class="fa fa-edit"></i></a>

                      <a href="#" data-id="<?php echo $d['id_produk']; ?>" title="Hapus" class="btn btn-danger btn-hapus btn-sm text-white"><i class="fa fa-trash"></i></a>
                    <?php } ?>
                  </td>
                </tr>
                <?php 
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

</div><!-- /.container-fluid -->
</section><!-- /.main-contetn -->

</div><!-- /.content-wrapper -->

<!-- modal detail -->
<div class="modal" tabindex="-1" id="modalDetail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Produk</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <img src="" class="img-fluid gambar mb-3">
          </div>
          <div class="col-md-8">
            <ul class="list-group">
              <li class="list-group-item nama"></li>
              <li class="list-group-item kategori"></li>
              <li class="list-group-item warna"></li>
              <li class="list-group-item ukuran"></li>
              <li class="list-group-item harga"></li>
              <li class="list-group-item berat"></li>
              <li class="list-group-item stok"></li>
              <li class="list-group-item terjual"></li>
            </ul>
          </div>
          <div class="col-md-12 deskripsi">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    <?php 
    if (isset($_GET['pesan'])) {
      if ($_GET['pesan'] == "simpan") { ?>
       Swal.fire({
         title: "Berhasil",
         text: "Data Berhasil Di Simpan",
         icon: "success"
       })
     <?php }elseif ($_GET['pesan'] == "edit") { ?>
       Swal.fire({
         title: "Berhasil",
         text: "Data Berhasil Di Edit",
         icon: "success"
       })
     <?php }elseif ($_GET['pesan'] == "bukanGambar") { ?>
       Swal.fire({
        title: "Terjadi Kesalahan",
        text: "Format file harus jpg/jpeg/png/webp",
        icon: "error"
      })
     <?php }
   }
   ?>

   $('#table').on('click', '.btn-hapus', function (e) {
    e.preventDefault();
    let id = $(this).data('id');
    Swal.fire({
      title: 'Apakah anda yakin',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus',
      showClass: {
        popup: 'animate__animated animate__bounce',
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp',
      }
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
         url: 'produk_hapus.php',
         type:'get',
         dataType: 'json',
         data: 'id='+id,
         cache: false,
         success: function(response){
          let icon = '';
          if (response.title == "Berhasil") {
            icon = 'success'
          }else{
            icon = 'warning'
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

   $('#table .btn-detail').on('click', function(){
    $('#modalDetail .gambar').attr('src', `../assets/img-produk/${ $(this).data('gambar') }`)
    $('#modalDetail .nama').html(`<h5>${ $(this).data('nama') }</h5>`)
    $('#modalDetail .kategori').html('<b>Kategori :</b> ' + $(this).data('kategori'))
    $('#modalDetail .warna').html('<b>Warna :</b> ' + $(this).data('warna'))
    $('#modalDetail .ukuran').html('<b>Ukuran :</b> ' + $(this).data('ukuran'))
    $('#modalDetail .harga').html('<b>Harga :</b> ' + $(this).data('harga'))
    $('#modalDetail .berat').html('<b>Berat :</b> ' + $(this).data('berat'))
    $('#modalDetail .stok').html('<b>Stok :</b> ' + $(this).data('stok'))
    $('#modalDetail .terjual').html('<b>Terjual :</b> ' + $(this).data('terjual'))
    $('#modalDetail .deskripsi').html(`<h5 class="mt-4"><b>Deskripsi</b></h5>
      ${ $(this).data('deskripsi') }
      `)
    $('#modalDetail').modal('show')
    
  })

   CKEDITOR.replace( 'deskripsi',
   {
     enterMode : CKEDITOR.ENTER_BR,

   });

 })
</script>
<!-- End of Main Content -->
<?php include 'footer.php'; ?>     