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

     <?php if ($this->session->flashdata('logout')) : ?>
          swal("", "Berhasil Logout", "success");
     <?php endif; ?>

     <?php if ($this->session->flashdata('emailok')) : ?>
          swal("", "Silahkan cek email anda untuk reset password", "success");
     <?php endif; ?>

     <?php if ($this->session->flashdata('emailnotok')) : ?>
          swal("", "Terjadi kesalahan sistem, silahkan coba lagi", "success");
     <?php endif; ?>

     <?php if ($this->session->flashdata('noemail')) : ?>
          swal("", "Ops, email tidak diketahui, silahkan input email yang sudah didaftarkan", "error");
     <?php endif; ?>

     <?php if ($this->session->flashdata('notoken')) : ?>
          swal("", "Ops, Token tidak valid, mohon ikuti prosedur dengan benar", "error");
     <?php endif; ?>
</script>

</html>