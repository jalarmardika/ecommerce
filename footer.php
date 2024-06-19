
  <section class="main-footer">
    <div class="container">
      <div class="row pt-3 pb-3 pl-2 pr-2">
        <div class="col-md-6">
          <h5 class="mt-3">NIAGASHOP</h5>
          <p class="text-muted">Niagashop adalah e-commerce yang dapat memberikan pengalaman terbaik untuk jual beli bagi penggunanya.</p>
          <i class="fab fa-facebook mr-2 text-muted"></i>
          <i class="fab fa-instagram mr-2 text-muted"></i>
          <i class="fab fa-twitter mr-2 text-muted"></i>
          <i class="fab fa-whatsapp mr-2 text-muted"></i>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3">
          <h5 class="mt-3">Halaman</h5>
          <a href="./" class="text-muted text-decoration-none">Home</a><br>
          <a href="./#kategori" class="text-muted text-decoration-none">Kategori</a><br>
          <a href="./#produk" class="text-muted text-decoration-none">Produk</a>
        </div>
      </div>
    </div>
  </section>
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<!-- AdminLTE App -->
<script src="assets/AdminLTE/dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $(".form-search2").hide();
    $('.navbar').css("border-bottom","none");
    
    $(".toggle-search").on('click', function(){
      $(".form-search2").toggle();
      $('#keyword2').focus();
      $("#hero").toggleClass("mt-5");
      $("#section-content").toggleClass("mt-5");
    })

    window.addEventListener('scroll', muncul);
    
    function muncul(){
      if (window.scrollY === 0) {
        $('.navbar').css("border-bottom","none");
      } else {
        $('.navbar').css("border-bottom","1px solid rgba(222, 226, 230)");
      }
    }

    // form pencarian 1
    function formSubmit(){
      $('#form').submit();
    }
    $("#icon-submit").on('click', function(){
      formSubmit();
    })

    $("#keyword").on('keyup', function(e){
      if (e.keyCode == 13) {
        formSubmit();
      }
    })
    // form pencarian 2
    function formSubmit2(){
      $('#form2').submit();
    }
    $("#icon-submit2").on('click', function(){
      formSubmit2();
    })

    $("#keyword2").on('keyup', function(event){
      if (event.keyCode == 13) {
        formSubmit2();
      }
    })

  })
</script>

</body>
</html>