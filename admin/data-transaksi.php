<?php 
include '../koneksi.php';

if (isset($_GET['status'])) {

  $status = htmlspecialchars($_GET['status']);

  $transaksi = mysqli_query($koneksi,"SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE status='$status' ORDER BY id_pembelian DESC ");

}else{

  $transaksi = mysqli_query($koneksi,"SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE status='Belum Bayar' ORDER BY id_pembelian DESC ");
}


if (mysqli_num_rows($transaksi)) {

?>
<table id="table" class="table table-hover table-responsive">
   <thead >
     <tr>
       <th width="1%">No</th>
       <th>Tanggal</th>
       <th>Nama Pelanggan</th>
       <th>Status</th>
       <th>Total Bayar</th>
       <th>Opsi</th>
     </tr>
   </thead>
   <tbody>
     <?php
       
     $no = 1;
     while ($data = mysqli_fetch_assoc($transaksi)) {  ?>

     <tr>
       <td><?php echo $no++; ?></td>
       <td><?php echo date('d-m-Y', strtotime($data['tgl_pembelian'])); ?></td>
       <td><?php echo $data['nama']; ?></td>
       <td>
        <?php 
        if ($data['status'] == "Belum Bayar" || $data['status'] == "Pembayaran Gagal") { ?>
              <a href="#" class="btn btn-xs btn-danger"><?php echo $data['status'] ?></a>
        <?php }elseif ($data['status'] == "Menunggu Konfirmasi"){ ?>
              <a href="#" class="btn btn-xs btn-warning"><?php echo $data['status'] ?></a>
        <?php }elseif ($data['status'] == "Dikemas" || $data['status'] == "Dikirim"){ ?>
              <a href="#" class="btn btn-xs btn-primary"><?php echo $data['status'] ?></a>
        <?php }elseif ($data['status'] == "Selesai"){ ?>
              <a href="#" class="btn btn-xs btn-success"><?php echo $data['status'] ?></a>
        <?php }

        ?>
        </td>
       <td>Rp.<?php echo number_format($data['total_bayar']); ?></td>
       <td>
        <?php 
          if ($data['status'] != "Menunggu Konfirmasi") { ?>
            <a class="btn btn-success btn-sm text-white mb-1" href="detail_transaksi.php?id=<?php echo $data['id_pembelian']; ?>"><i class="fa fa-eye"></i> Lihat Detail</a>
         <?php }elseif ($data['status'] == "Menunggu Konfirmasi"){ ?>
            <a class="btn btn-primary btn-sm text-white mb-1" href="detail_transaksi.php?id=<?php echo $data['id_pembelian']; ?>"><i class="fa fa-edit"></i> Konfirmasi Pembayaran</a>
        <?php } ?>
       </td>
     </tr>
              
    <?php } ?>
   </tbody>
</table>

<?php }else{ ?>
      <p class="text-center mt-3">Data Tidak Tersedia</p>
<?php } ?>