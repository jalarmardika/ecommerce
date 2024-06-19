<?php include 'header.php'; ?>
<!-- Begin Page Content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 mb-3">Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
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
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active text-danger" data-status="Belum Bayar" href="#">Belum Bayar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Menunggu Konfirmasi" href="#">Menunggu Konfirmasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Pembayaran Gagal" href="#">Pembayaran Gagal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Dikemas" href="#">Dikemas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Dikirim" href="#">Dikirim</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-status="Selesai" href="#">Selesai</a>
                </li>
              </ul>
              <div class="data-transaksi mt-3">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div><!-- /.container-fluid -->
</section><!-- /.main-contetn -->

</div><!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      url: "data-transaksi.php",
      type: "get",
      success: function(result){
        $('.data-transaksi').html(result);
        $('#table').DataTable();
      }
    })

    $('.nav-tabs').on('click', '.nav-link', function(e){
      e.preventDefault();
      $('.nav-tabs .nav-link').removeClass('active text-danger');
      $(this).addClass('active text-danger');

      $.ajax({
        url: "data-transaksi.php",
        type: "get",
        data: {
          'status': $(this).data('status')
        },
        success: function(response){
          $('.data-transaksi').html(response);
          $('#table').DataTable();
        }
      })

    })   
    
  })
</script>

<?php include 'footer.php'; ?>     