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
          <h1 class="m-0 mb-3">Laporan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Laporan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-outline card-success no-print">
        <div class="card-body">
          <form action="" method="post">
            <div class="row no-gutters">
              <div class="col-md-5">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 control-label"><b>Dari</b></label>
                    <div class="col-sm-8">
                     <input type="date" required="required" class="form-control" name="dari" max="<?php echo date('Y-m-d'); ?>">                         
                   </div>
                 </div>  
               </div>  
             </div>
             <div class="col-md-5">
              <div class="form-group">
                <div class="row">
                  <label class="col-sm-3 control-label"><b>Sampai</b></label>
                  <div class="col-sm-8">
                   <input type="date" required="required" max="<?php echo date('Y-m-d'); ?>" class="form-control" name="sampai">                   
                 </div>
               </div> 
             </div> 
           </div>
           <div class="col-md-2">
            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php 
  if (isset($_POST['submit'])) {
    $dari = htmlspecialchars($_POST['dari']);
    $sampai = htmlspecialchars($_POST['sampai']);
    $query = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE tgl_pembelian BETWEEN '$dari 00:00:00' AND '$sampai 23:59:59' ");
    ?>
    <center>
      <div class="d-none cetak">
        <h4>Laporan</h4>
        <p class="text-muted">Dari <?php echo date('d-m-Y', strtotime($dari)); ?> Sampai <?php echo date('d-m-Y', strtotime($sampai)); ?></p>
      </div>
    </center>
    <div class="card mb-3">
      <div class="card-header no-print">
        Daftar Transaksi
        <?php 
        if (mysqli_num_rows($query) > 0) {
          ?>
          <button type="button" class="btn btn-success btn-cetak btn-sm float-right"><i class="fa fa-print"></i> Cetak</button>
        <?php } ?>
      </div>
      <div class="card-body">
        <table id="table" class="table table-bordered table-hover table-responsive-md">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th>Nama Pelanggan</th>
              <th>Tgl. Pembelian</th>
              <th>Berat</th>
              <th>Ongkir</th>
              <th>Pembelian</th>
              <th>Total Bayar</th>
              <th>Status</th>
              <th class="no-print">#</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            if (mysqli_num_rows($query) > 0) {
              while ($data = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo date('d-m-Y', strtotime($data['tgl_pembelian'])); ?></td>
                  <td><?php echo number_format($data['total_berat']); ?> g</td>
                  <td>Rp.<?php echo number_format($data['ongkir']); ?></td>
                  <td>Rp.<?php echo number_format($data['total_pembelian']); ?></td>
                  <td>Rp.<?php echo number_format($data['total_bayar']); ?></td>
                  <td><?php echo $data['status']; ?></td>
                  <td class="no-print">
                    <a class="btn btn-info btn-sm" title="Detail" href="detail_transaksi.php?id=<?php echo $data['id_pembelian']; ?>"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php } ?>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
<script type="text/javascript">
  $('.btn-cetak').on('click', function(){
    window.print()
  })
</script>
<?php 
include 'footer.php';
} ?>     