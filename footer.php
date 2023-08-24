  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer d-print-none">
    <div class="copyright">
    <?php echo date("Y"); ?> &copy; Copyright <strong><span>Jeeva Organic Pvt. Ltd.</span></strong>. All Rights Reserved
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Datatable CSS -->
  <link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Datatable JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  

  <script>
    $(document).ready(function() {
      var pgurl = window.location.href.substr(window.location.href
        .lastIndexOf("/") + 1);
      var nopgurl = window.location.href.substr(window.location.href
        .lastIndexOf("/") + 1).split('?')[0];

      $("#sidebar ul li a").each(function() {

        if ($(this).attr("href") == nopgurl || $(this).attr("href") == '') {

          $(this).closest('ul').parent().find('.nav-link ul').addClass('active');
        }
        if ($(this).attr("href") == pgurl) {
          $(this).closest('ul').parent().find('.nav-content').addClass('show');
          $(this).closest('li').find('a').addClass('active');
          $(this).parent().find('.nav-link').removeClass('collapsed');
        }
      });
    });
  </script>