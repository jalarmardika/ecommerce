<?php include 'header.php'; ?>

<!-- Begin Page Content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0 mb-3">Varian Produk</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
           <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
           <li class="breadcrumb-item active">Varian Produk</li>
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
             <a href="#" data-toggle="modal" data-target="#mymodal" class="btn btn-primary btn-sm mb-4" ><i class="fa fa-plus"></i> Tambah</a>
           <?php } ?>
           <table id="table" class="table table-bordered table-striped table-hover table-responsive">
             <thead>
               <tr>
                 <th width="1%">No</th>
                 <th>Gambar</th>
                 <th>Warna</th>
                 <th class="text-center">Ukuran</th>
                 <th>Harga</th>
                 <th>Berat</th>
                 <th class="text-center">Stok</th>
                 <th class="text-center">Terjual</th>
                 <?php if ($data['level'] == "Admin") { ?>
                   <th>Opsi</th>
                 <?php } ?>
               </tr>
             </thead>
             <tbody>
               <?php
               if (isset($_GET['id'])) {

                $id_produk = htmlspecialchars($_GET['id']);
                $no = 1;
                $varian = mysqli_query($koneksi,"SELECT * FROM varian WHERE id_produk='$id_produk'");
                while ($d = mysqli_fetch_assoc($varian)) {
                  $gambar = $d['gambar_varian'];
                  if ($gambar=="") {
                   $images = 'No Photo';
                 }else{
                   $images = '<img style="width:100px;" src="../assets/img-produk/'.$gambar.'">';
                 }
                 ?>
                 <tr>
                   <td><?php echo $no++; ?></td>
                   <td><?php echo $images; ?></td>
                   <td><?php echo $d['warna']; ?></td>
                   <td class="text-center"><?php echo $d['ukuran']; ?></td>
                   <td>Rp. <?php echo number_format($d['harga']); ?></td>
                   <td><?php echo number_format($d['berat']); ?> gram</td>
                   <td class="text-center"><?php echo number_format($d['stok']); ?></td>
                   <td class="text-center"><?php echo number_format($d['terjual']); ?></td>
                   <?php if ($data['level'] == "Admin") { ?>
                     <td>
                       <a class="btn btn-success btn-sm text-white" title="Edit" data-toggle="modal" data-target="#mymodalEdit<?php echo $d['id_varian'];?>"><i class="fa fa-edit"></i></a>

                       <a data-id="<?php echo $d['id_varian']; ?>" title="Hapus" class="btn btn-danger btn-hapus btn-sm text-white" href="#"><i class="fa fa-trash"></i></a>
                     </td>
                   <?php } ?>
                 </tr>
                 <div class="modal" tabindex="-1" id="mymodalEdit<?php echo $d['id_varian'];?>">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title">Edit Varian Produk</h5>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                       </div>
                       <div class="modal-body">
                         <form method="post" action="varian_edit.php" enctype="multipart/form-data">
                           <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                           <input type="hidden" name="id_varian" value="<?php echo $d['id_varian']; ?>">
                           <div class="row">
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label >Warna</label>
                                 <input type="text"  class="form-control" name="warna" value="<?php echo $d['warna']; ?>">
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label >Ukuran</label>
                                 <input type="text"  class="form-control" name="ukuran" value="<?php echo $d['ukuran']; ?>">
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label >Harga</label>
                                 <input type="number"  class="form-control" name="harga" required="required" value="<?php echo $d['harga']; ?>">
                               </div>
                             </div>
                             <div class="col-md-6">
                               <label >Berat</label>
                               <div class="input-group">
                                 <input type="number"  class="form-control" name="berat" required="required" value="<?php echo $d['berat']; ?>">
                                 <div class="input-group-append">
                                   <span class="input-group-text">gram</span>
                                 </div>
                               </div>
                             </div>
                           </div>
                           <div class="row">
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label >Stok</label>
                                 <input type="number"  class="form-control" required="required" name="stok" value="<?php echo $d['stok']; ?>">
                               </div>
                             </div>
                             <div class="col-md-6">
                               <div class="form-group">
                                 <label>Gambar (Optional)</label>
                                 <input type="file" name="gambar" class="form-control">  
                               </div>
                             </div>
                           </div>
                           <input type="submit" name="submit" class="btn btn-primary btn-sm float-right mt-3" value="Perbarui">             
                         </form>
                       </div>
                       
                     </div>
                   </div>
                 </div>

               <?php } } ?>

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

<div class="modal" tabindex="-1" id="mymodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Varian Produk</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="varian_tambah.php" enctype="multipart/form-data">
          <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label >Warna</label>
                <input type="text"  class="form-control" name="warna">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label >Ukuran</label>
                <input type="text"  class="form-control" name="ukuran">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label >Harga</label>
                <input type="number"  class="form-control" name="harga" required="required">
              </div>
            </div>
            <div class="col-md-6">
              <label >Berat</label>
              <div class="input-group">
                <input type="number"  class="form-control" name="berat" required="required">
                <div class="input-group-append">
                  <span class="input-group-text">gram</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label >Stok</label>
                <input type="number"  class="form-control" required="required" name="stok">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Gambar (Optional)</label>
                <input type="file" name="gambar" class="form-control">  
              </div>
            </div>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-sm float-right mt-3" value="Simpan">             
        </form>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
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
       url: 'varian_hapus.php',
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
          window.location.href = "";
        }
      })

     },
     error: function(xhr, thrownError) {
       alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
     }
   })
    }
  })

});
</script>

<?php include 'footer.php'; ?>     