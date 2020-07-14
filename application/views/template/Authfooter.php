<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- sweetalert -->
<script src="<?= base_url('sweet/dist/sweetalert.js') ?>"></script>
<script src="<?= base_url('sweet/dist/sweetalert.min.js') ?>"></script>
<script src="<?= base_url('sweet/js/bootstrap.min.js') ?>"></script>

<?php if (isset($js)) echo '<script src="' . base_url('assets/js/' . $js) . '"></script>'; ?>
</body>

<script type="text/javascript">
     <?php if ($this->session->flashdata('gagal')) : ?>
          swal("", "Maaf username/password salah", "error");
     <?php endif; ?>
</script>

</html>