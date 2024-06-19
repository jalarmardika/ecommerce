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
            <h1 class="m-0 mb-3">Edit Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
              <li class="breadcrumb-item active">Edit Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card shadow mb-5 card-outline card-success">
          <div class="card-body">
            <?php 
            if (isset($_GET['id'])) {
              $id_produk = htmlspecialchars($_GET['id']);
              $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk' ");
              if (mysqli_num_rows($produk) > 0) {
                $data = mysqli_fetch_assoc($produk);
                ?>
                <form action="produk_edit.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $data['id_produk']; ?>">
                  <div class="form-group">
                   <label >Nama Produk</label>
                   <input type="text"  class="form-control" required="required" name="nama" value="<?php echo $data['nama_produk']; ?>">
                 </div>
                 <div class="form-group">
                   <label >Kategori</label>
                   <select class="form-control" required="required" name="kategori">
                    <?php 
                    $kategori = mysqli_query($koneksi,"SELECT * FROM kategori"); 
                    while($k = mysqli_fetch_assoc($kategori)){ ?> 

                      <option value="<?php echo $k['id_kategori']; ?>" <?php if ($data['id_kategori'] == $k['id_kategori']) { echo "selected"; } ?> ><?php echo $k['nama_kategori']; ?></option>
                    <?php } ?> 
                  </select>
                </div>
                <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <label >Warna</label>
                     <input type="search"  class="form-control" name="warna" value="<?php echo $data['warna']; ?>">
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <label >Ukuran</label>
                     <input type="text"  class="form-control" name="ukuran" value="<?php echo $data['ukuran']; ?>">
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <label >Harga</label>
                     <input type="number"  class="form-control" required="required" name="harga" value="<?php echo $data['harga']; ?>">
                   </div>
                 </div>
                 <div class="col-md-6">
                   <label >Berat</label>
                   <div class="input-group">
                     <input type="number"  class="form-control" required="required" name="berat" value="<?php echo $data['berat']; ?>">
                     <div class="input-group-append">
                       <span class="input-group-text">gram</span>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <label >Deskripsi</label>
                 <textarea id="edit_deskripsi" class="form-control" required="required" name="deskripsi" data-deskripsi="<?php echo $data['deskripsi']; ?>"></textarea>
               </div>
               <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                     <label >Stok</label>
                     <input type="number"  class="form-control" required="required" name="stok" value="<?php echo $data['stok']; ?>">
                   </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                     <label>Gambar (Optional)</label>
                     <input type="file" name="gambar" class="form-control">  
                   </div>
                 </div>
               </div>
               <input type="submit" name="submit" class="btn btn-primary btn-sm float-right mt-3" value="Update">
             </form>
           <?php } } ?>
         </div>
       </div>
     </div>
     
   </div><!-- /.container-fluid -->
 </section><!-- /.main-contetn -->

</div><!-- /.content-wrapper -->   

<script type="text/javascript">
  $(document).ready(function(){

    CKEDITOR.replace( 'edit_deskripsi',
    {
     enterMode : CKEDITOR.ENTER_BR,

   }).setData($('#edit_deskripsi').data('deskripsi'));
  })
</script>
<?php 
include 'footer.php';
} ?>     