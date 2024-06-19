<?php include 'header.php'; ?>
<!-- Begin Page Content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mb-3">Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
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
             <table id="table" class="table table-bordered table-striped table-hover table-responsive">
              <thead >
                <tr>
                  <th width="1%">No</th>
                  <th class="text-center">Foto</th>
                  <th>Nama Pelanggan</th>
                  <th>Email</th>
                  <th>No Handphone</th>
                </tr>
              </thead>
              <tbody>
                <?php                
                $no = 1;
                $pelanggan = mysqli_query($koneksi,"SELECT * FROM pelanggan ORDER BY id_pelanggan DESC ");
                while ($d = mysqli_fetch_assoc($pelanggan)) {
                 $foto = $d['foto'];
                 if ($foto=="") {
                  $images = '<i class="fa fa-user-circle fa-5x text-muted"></i>';
                }else{
                  $images = '<img class="rounded-circle" src="../assets/photo-profile/'.$foto.'" style="width:5rem;">' ;
                }
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td class="text-center"><?php echo $images; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td><?php echo $d['email']; ?></td>
                  <td><?php echo $d['no_hp']; ?></td>                            
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

<?php include 'footer.php'; ?>     