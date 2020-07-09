<!-- Footer -->
<footer class="sticky-footer bg-white">
     <div class="container my-auto">
          <div class="copyright text-center my-auto">
               <span>Copyright &copy; PT. ASIA RESEARCH INSTITUTE <?= date('Y'); ?></span>
          </div>
     </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                    </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
               </div>
          </div>
     </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/vendor/datatables/datatables.min.js'); ?>"></script>
<?php if (isset($costom_js)) { ?><script src="<?= base_url('assets/js/' . $costom_js); ?>"></script><?php } ?>

<script>
     let log_off = new Date();
     log_off.setMinutes(log_off.getMinutes() + 30);
     log_off = new Date(log_off);

     let int_logoff = setInterval(function() {
          let now = new Date();
          if (now > log_off) {
               window.location.assign("<?= base_url('auth/log_off') ?>");
               clearInterval(int_logoff);
          }
     }, 5000);

     $('body').on('click', function() {
          log_off = new Date();
          log_off.setMinutes(log_off.getMinutes() + 30);
          log_off = new Date(log_off);

          console.log(log_off);
     })

     $(document).ready(function() {
          $('.myTable').DataTable();
     });
</script>

<script type="text/javascript">
     // $('.datepicker').datepicker({
     //      uiLibrary: 'bootstrap'
     // });
     $('#datepicker').datepicker({
          uiLibrary: 'bootstrap'
     });
     $('#datepicker2').datepicker({
          uiLibrary: 'bootstrap'
     });
</script>
</body>

</html>