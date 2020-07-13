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
                                             <input type="password" class="form-control form-control- <?php echo form_error('password') ? 'is-invalid' : '' ?>" id="password" value="<?= set_value('password'); ?>" name="password" placeholder="Masukkan Password Anda">
                                             <span id="mybutton"><i class="fas fa-eye-slash"></i></span>
                                             <?php echo form_error('password_old', '<div class="invalid-feedback">', '</div>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">
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