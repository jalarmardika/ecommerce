<?php 
include 'koneksi.php';
session_start();

$id = htmlspecialchars($_SESSION['id_pelanggan']);

if (isset($_GET['status'])) {

  $status = htmlspecialchars($_GET['status']);

  $transaksi = mysqli_query($koneksi,"SELECT * FROM pembelian WHERE id_pelanggan='$id' and status='$status' ORDER BY id_pembelian DESC ");

}else{

  $transaksi = mysqli_query($koneksi,"SELECT * FROM pembelian WHERE id_pelanggan='$id' and status='Belum Bayar' ORDER BY id_pembelian DESC ");
}

if (mysqli_num_rows($transaksi)) {

  ?>
  <table id="table" class="table table-hover table-responsive">
   <thead >
     <tr>
       <th width="1%">No</th>
       <th>Tanggal</th>
       <th>Total Bayar</th>
       <th width="15%">Opsi</th>
     </tr>
   </thead>
   <tbody>
     <?php
     $no = 1;
     while ($data = mysqli_fetch_assoc($transaksi)) {  ?>
       <tr>
         <td><?php echo $no++; ?></td>
         <td><?php echo date('d-m-Y', strtotime($data['tgl_pembelian'])); ?></td>
         <td>Rp.<?php echo number_format($data['total_bayar']); ?></td>
         <td>
          <?php 
          if ($data['status'] == "Belum Bayar") { ?>
            <a title="Bayar" class="btn btn-warning btn-sm text-white mb-1" href="detail_pembelian.php?id=<?php echo $data['id_pembelian']; ?>"><i class="fa fa-money-bill"></i></a>
          <?php }else{ ?>
            <a title="Detail" class="btn btn-success btn-sm text-white mb-1" href="detail_pembelian.php?id=<?php echo $data['id_pembelian']; ?>"><i class="fa fa-eye"></i></a>
          <?php } ?>
        </td>
      </tr>
      
    <?php } ?>
  </tbody>
</table>

<?php }else{ ?>
  <p class="text-center mt-3">Data Tidak Tersedia</p>
  <?php } ?>