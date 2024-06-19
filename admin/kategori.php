<?php include 'header.php'; ?>

<!-- Begin Page Content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mb-3">Kategori</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
                <a href="#" data-toggle="modal" data-target="#mymodal" class="btn btn-primary btn-sm mb-4" ><i class="fa fa-plus"></i> Tambah Kategori</a>
              <?php } ?>
              <table id="table" class="table table-bordered table-striped table-hover table-responsive">
               <thead >
                 <tr>
                   <th width="1%">No</th>
                   <th class="text-center">Gambar</th>
                   <th>Kategori</th>
                   <th >Opsi</th>
                 </tr>
               </thead>
               <tbody>
                 <?php
                 $no = 1;
                 $kategori = mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY id_kategori DESC");
                 while ($d = mysqli_fetch_assoc($kategori)) {
                  $gambar = $d['gambar'];
                  if ($gambar=="") {
                   $images = 'No Photo';
                 }else{
                  $images = '<img class="img-category" src="../assets/img-category/'.$gambar.'">';
                }
                ?>
                <tr>
                 <td><?php echo $no++; ?></td>
                 <td class="text-center"><?php echo $images; ?></td>
                 <td><?php echo $d['nama_kategori']; ?></td>
                 <td>
                   <a title="Daftar Produk" class="btn btn-info btn-sm text-white" href="produk.php?id_kategori=<?php echo $d['id_kategori']; ?>"><i class="fa fa-list"></i></a>
                   <?php if ($data['level'] == "Admin") { ?>
                     <a class="btn btn-success btn-sm text-white btn-edit" title="Edit" data-id="<?php echo $d['id_kategori']; ?>" data-nama="<?php echo $d['nama_kategori']; ?>"><i class="fa fa-edit"></i></a>
                     <a data-id="<?php echo $d['id_kategori']; ?>" title="Hapus" class="btn btn-danger btn-hapus btn-sm text-white" href="#"><i class="fa fa-trash"></i></a>
                   <?php } ?>
                 </td>
               </tr>
             <?php } ?>
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
        <h5 class="modal-title">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="kategori_tambah.php" enctype="multipart/form-data">
          <div class="form-group">
            <label >Kategori</label>
            <input type="text"  class="form-control" required="required" name="kategori">
          </div>
          <div class="form-group">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" required="required">                
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-sm float-right mt-3" value="Simpan">             
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="modalEdit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kategori</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" action="kategori_edit.php" enctype="multipart/form-data">
         <input type="hidden" name="id">
         <div class="form-group">
          <label >Kategori</label>
          <input type="text"  class="form-control" required="required" name="kategori">
        </div>
        <div class="form-group">
          <label>Gambar (Optional)</label>
          <input type="file" name="gambar" class="form-control">                
        </div>
        <input type="submit" name="submit" class="btn btn-primary btn-sm float-right mt-3" value="Perbarui">             
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
      text: "Format file harus jpg/jpeg/png",
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
       url: 'kategori_hapus.php',
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
  // modal box edit data
  $('#table').on('click','.btn-edit', function(event){
    event.preventDefault();
    $('#modalEdit input[name=id]').val($(this).data('id'));
    $('#modalEdit input[name=kategori]').val($(this).data('nama'));
    $('#modalEdit').modal('show');
  })
</script>
<?php include 'footer.php'; ?>     