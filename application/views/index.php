<div class="container">

     <!-- Outer Row -->
     <div class="row justify-content-center">
          <div class="col-lg-6 my-5">
               <div class="card o-hidden border-0 shadow-lg my-2">
                    <div class="card-body p-2">
                         <!-- Nested Row within Card Body -->
                         <div class="row">
                              <div class="col-lg">
                                   <div class="p-2">
                                        <div class="text-center">
                                             <img src="<?php echo base_url() ?>assets/img/logopng.png" class="pt-3" alt="logo">
                                             <br>
                                             <br>
                                        </div>
                                        <hr class="sidebar-divider my-0">
                                        <br>

                                        <div class="text-center">

                                             <h1 class="text-gray-900 mb-4">
                                                  <pre><?= 'LOGIN ADMIN CMS' ?></pre>
                                             </h1>

                                        </div>
                                        <!-- <p><?php echo ("{$_SESSION['id']}" . "<br />"); ?></p> -->
                                        <?= $this->session->flashdata('message'); ?>
                                        <?= form_open('login'); ?>
                                        <span class="txt1 p-b-11">
                                             Email</>
                                        </span>
                                        <div class="form-group">
                                             <input type="text" class="form-control form-control-user <?php echo form_error('email') ? 'is-invalid' : '' ?>" name="email" placeholder="Masukkan Email Anda">
                                             <?php echo form_error('email', '<div class="invalid-feedback">', '</div>'); ?>
                                        </div>
                                        <span class="txt1 p-b-11">
                                             Password
                                        </span>
                                        <div class="form-group" id="show_hide_password">
                                             <input type="password" class="form-control form-control- <?php echo form_error('password') ? 'is-invalid' : '' ?>" name="password" value="<?= set_value('password'); ?>" id="password" placeholder="Masukkan Password Anda">
                                             <span id="mybutton"><i class="fas fa-eye-slash"></i></span>
                                             <?php echo form_error('password_old', '<div class="invalid-feedback">', '</div>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                             Login
                                        </button>
                                        <hr class="sidebar-divider d-none d-md-block">
                                        <?= form_close(); ?>
                                        <button href="javascript:void(0);" data-toggle="modal" data-target="#NewMenuModal" class="btn btn-warning btn-user btn-block text-dark">
                                             Lupa Password ?
                                        </button>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

          </div>

     </div>

</div>


<!-- Modal Tambah-->
<div class="modal fade" id="NewMenuModal" tabindex="-1" role="dialog" aria-labelledby="NewMenuModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="NewMenuModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>

               <form method="post" action="<?= base_url('email/sendEmail') ?>">
                    <div class="modal-body">

                         <div class="form-group">
                              <label for="text">Masukkan Email Anda : </label>
                              <input type="email" name="email" class="form-control" placeholder="Masukkan Email Valid">
                         </div>

                    </div>
                    <div class="modal-footer">
                         <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                    </div>
               </form>
          </div>
     </div>
</div>
</div>
<!-- End of Main Content -->

<script type="text/javascript">
     $(document).ready(function() {

          $('#form-tambah_user').submit(function(e) {
               e.preventDefault();
               var data = $('#form-tambah_user').serialize();
               //console.log(data);
               $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                         if (data.sukses == true) {
                              swal({
                                   title: 'Data user',
                                   text: data.msg,
                                   type: 'success'
                              }, function() {
                                   window.location.href = '<?php echo site_url('auth/index'); ?>';
                              });
                         } else {
                              swal({
                                   title: 'Data user',
                                   text: data.msg,
                                   type: 'warning'
                              });
                         }
                    }
               })
          });
     });
</script>