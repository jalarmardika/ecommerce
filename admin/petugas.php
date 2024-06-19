<?php
include 'header.php';
if ($data['level'] == "Admin") { 
  ?>
  <!-- Begin Page Content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 mb-3">Petugas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Petugas</li>
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
                <a href="#" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-plus"></i> Tambah Petugas</a>
                <table id="table" class="table table-bordered table-striped table-hover table-responsive">
                  <thead >
                    <tr>
                      <th width="1%">No</th>
                      <th>Nama Petugas</th>
                      <th>Email</th>
                      <th>No Handphone</th>
                      <th>Level</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $no = 1;
                    $petugas = mysqli_query($koneksi,"SELECT * FROM petugas ORDER BY id DESC ");
                    while ($d = mysqli_fetch_assoc($petugas)) {
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td><?php echo $d['no_hp']; ?></td> 
                        <td><?php echo $d['level']; ?></td> 
                        <td>
                          <a class="btn btn-success btn-edit btn-sm text-white" title="Edit" href="#" data-toggle="modal" data-target="#modalEdit<?php echo $d['id']; ?>"><i class="fa fa-edit"></i></a>
                          <a href="#" data-id="<?php echo $d['id']; ?>" title="Hapus" class="btn btn-danger btn-hapus btn-sm text-white"><i class="fa fa-trash"></i></a>
                        </td>
                        <div class="modal" tabindex="-1" id="modalEdit<?php echo $d['id']; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Edit Petugas</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form action="petugas_edit.php" method="post">
                                  <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                  <div class="form-group">
                                    <label>Nama Petugas</label>
                                    <input type="text" name="nama" class="form-control" required="required" value="<?php echo $d['nama']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required="required" value="<?php echo $d['email']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Password (Optional)</label>
                                    <input type="password" name="password" class="form-control" placeholder="Jika Ingin Ganti Password Baru">
                                  </div>
                                  <div class="form-group">
                                    <label>No Handphone</label>
                                    <input type="text" name="no_hp" class="form-control" required="required" value="<?php echo $d['no_hp']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control" required="required">
                                      <option value="">-- Pilih --</option>
                                      <option value="Admin" <?php if ($d['level'] == "Admin") { echo "selected"; } ?> >Admin</option>
                                      <option value="Petugas" <?php if ($d['level'] == "Petugas") { echo "selected"; } ?> >Petugas</option>
                                    </select>
                                  </div>
                                  <input type="submit" name="submit" class="btn btn-primary btn-sm float-right" value="Simpan">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>                          
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

<!-- modal tambah -->
<div class="modal" tabindex="-1" id="modalAdd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Petugas</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="petugas_tambah.php" method="post">
          <div class="form-group">
            <label>Nama Petugas</label>
            <input type="text" name="nama" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>No Handphone</label>
            <input type="text" name="no_hp" class="form-control" required="required">
          </div>
          <div class="form-group">
            <label>Level</label>
            <select name="level" class="form-control" required="required">
              <option value="">-- Pilih --</option>
              <option value="Admin">Admin</option>
              <option value="Petugas">Petugas</option>
            </select>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-sm float-right" value="Simpan">
        </form>
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
     <?php }elseif ($_GET['pesan'] == "gagalSimpan") { ?>
       Swal.fire({
         title: "Gagal",
         text: "Data Gagal Di Simpan",
         icon: "error"
       })
     <?php }elseif ($_GET['pesan'] == "gagalEdit") { ?>
       Swal.fire({
         title: "Gagal",
         text: "Data Gagal Di Edit",
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
      text: 'Data yg sudah dihapus tidak dapat dikembalikan',
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
         url: 'petugas_hapus.php',
         type:'get',
         dataType: 'json',
         data: 'id='+id,
         cache: false,
         success: function(response){
          let icon = '';
          if (response.title == "Berhasil") {
            icon = 'success'
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

 })
</script>
<?php 
include 'footer.php';
} ?>     