<?php include 'header.php'; ?>
<!-- Begin Page Content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mb-3">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
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
       <div class="col-12 col-sm-6 col-md-3">
         <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fa fa-box"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Produk</span>
            <span class="info-box-number">
             <?php 
             echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk"));
             ?>
           </span>
         </div>
         <!-- /.info-box-content -->
       </div>
       <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
       <div class="info-box mb-3">
         <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-list-alt"></i></span>

         <div class="info-box-content">
          <span class="info-box-text">Kategori</span>
          <span class="info-box-number">
            <?php 
            echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori"));
            ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
     <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
       <span class="info-box-text">Pelanggan</span>
       <span class="info-box-number">
         <?php 
         echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pelanggan"));
         ?>
       </span>
     </div>
     <!-- /.info-box-content -->
   </div>
   <!-- /.info-box -->
 </div>
 <!-- /.col -->
 <div class="col-12 col-sm-6 col-md-3">
   <div class="info-box mb-3">
     <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-edit"></i></span>

     <div class="info-box-content">
       <span class="info-box-text">Menunggu Konfirmasi</span>
       <span class="info-box-number">
        <?php 
        echo number_format(mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pembelian WHERE status='Menunggu Konfirmasi' ")));
        ?>
      </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>

<?php include 'footer.php'; ?>     