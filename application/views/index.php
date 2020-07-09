<div class="container">

     <!-- Outer Row -->
     <div class="row justify-content-center">
          <div class="col-lg-6 my-5">
               <div class="card o-hidden border-0 shadow-lg my-3">
                    <div class="card-body p-2">
                         <!-- Nested Row within Card Body -->
                         <div class="row">
                              <div class="col-lg">
                                   <div class="p-3">
                                        <div class="text-center">
                                             <img src="<?php echo base_url() ?>assets/img/logo.bmp" alt="logo" width="100%">
                                        </div>
                                        <div class="text-center">
                                             <br>
                                             <br>
                                             <h1 class="text-gray-900 font-weight-bold mb-4"><?= $judul ?></h1>

                                        </div>
                                        <!-- <p><?php echo ("{$_SESSION['id']}" . "<br />"); ?></p> -->
                                        <?= $this->session->flashdata('message'); ?>
                                        <?= form_open('login'); ?>
                                        <span class="txt1 p-b-11">
                                             Username
                                        </span>
                                        <div class="form-group">
                                             <input type="text" class="form-control form-control-user <?php echo form_error('email') ? 'is-invalid' : '' ?>" name="username" placeholder="Masukkan Email Anda">
                                             <?php echo form_error('email', '<div class="invalid-feedback">', '</div>'); ?>
                                        </div>
                                        <span class="txt1 p-b-11">
                                             Password
                                        </span>
                                        <div class="form-group" id="show_hide_password">
                                             <input type="password" class="form-control form-control- <?php echo form_error('password_old') ? 'is-invalid' : '' ?>" id="password" value="<?= set_value('password_old'); ?>" name="password_old" placeholder="Masukkan Password Anda">
                                             <span id="mybutton"><i class="fas fa-eye-slash"></i></span>
                                             <?php echo form_error('password_old', '<div class="invalid-feedback">', '</div>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-user btn-block">
                                             Login
                                        </button>
                                        <?= form_close(); ?>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

          </div>

     </div>

</div>