    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </footer>
</div>
<!-- ./wrapper -->

<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="../assets/AdminLTE/dist/js/adminlte.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
    $('.select2').select2()
  })
  $('.btn-logout').on('click', function(e){
    e.preventDefault()
    Swal.fire({
      title: 'Konfirmasi',
      text: 'Apakah anda ingin keluar',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, keluar',
      showClass: {
        popup: 'animate__animated animate__bounce',
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp',
      }
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "../logout.php"
      }
    })
  })
  <?php 
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "sudahLogin") { ?>

      Swal.fire({
        title: "Peringatan",
        text: "Anda Sudah Login",
        icon: "warning"
      })

    <?php }elseif ($_GET['pesan'] == "login") { ?>

      Swal.fire({
        title: "Berhasil",
        text: "Anda Berhasil Login",
        icon: "success"
      })

    <?php }
  }
  ?>  
</script>
</body>
</html>