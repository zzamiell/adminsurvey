 <!-- bootstrap for update password -->
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login.css') ?>">
 <link rel="icon" href="<?= base_url('assets/img/logo.bmp') ?>" type="image/gif">
 <!-- sweetalert -->
 <link rel="stylesheet" type="text/css" href="<?= base_url('sweet/dist/sweetalert.css') ?>">

 <!-- ajax -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 <!-- <style>
      body {
           background-color: wheat;
      }
 </style> -->
 <style>
      .alert {
           width: 80%;
           margin-left: 50;
      }
 </style>

 <body>
      <br>
      <br>
      <br>
      <br>
      <div class="container">
           <div class="row">
                <div class="card o-hidden border-0 shadow-lg my-2">
                     <div class="card-body p-2">
                          <div class="col-sm-12 text-center">
                               <h1>Ubah Password</h1>
                          </div>

                          <div class="row">
                               <div class="col-sm-6 col-sm-offset-3">
                                    <p class="text-center">Gunakan formulir di bawah ini untuk mengubah kata sandi Anda. Kata sandi Anda tidak boleh sama dengan nama pengguna Anda.</p>
                                    <form method="post" class="form-tambah_user" action="<?php echo base_url('email/updatePassword/' . $token) ?>" id="passwordForm">
                                         <div class="form-group" id="show_hide_password">
                                              <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off" required>
                                              <span id="mybutton"><i class="fas fa-eye-slash"></i></span>
                                              <div class="row">
                                                   <div class="alert alert-warning">
                                                        <div class="col-sm-6">
                                                             <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
                                                             <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
                                                        </div>
                                                        <div class="col-sm-6">
                                                             <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
                                                             <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
                                                        </div>

                                                        <strong>Makes strong password by following the validation (Opsional)</strong>
                                                   </div>
                                              </div>
                                         </div>
                                         <div class="form-group" id="show_hide_password">
                                              <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off" required>
                                              <span id="mybutton"><i class="fas fa-eye-slash"></i></span>
                                              <div class="row">
                                                   <div class="col-sm-12">
                                                        <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
                                                   </div>
                                              </div>
                                         </div>

                                         <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
                                    </form>
                               </div>
                               <!--/col-sm-6-->
                          </div>
                          <!--/row-->
                     </div>
                </div>
           </div>
 </body>
 <!-- sweetalert -->
 <script src="<?= base_url('sweet/dist/sweetalert.js') ?>"></script>
 <script src="<?= base_url('sweet/dist/sweetalert.min.js') ?>"></script>
 <script src="<?= base_url('sweet/js/bootstrap.min.js') ?>"></script>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <script src="<?= base_url('assets/js/login.js') ?>"></script>


 <script type="text/javascript">
      $(document).ready(function() {

           $('.form-tambah_user').submit(function(e) {
                e.preventDefault();
                var data = $('.form-tambah_user').serialize();
                //console.log(data);
                $.ajax({
                     url: $(this).attr('action'),
                     type: 'post',
                     data: data,
                     dataType: 'json',
                     success: function(data) {
                          if (data.sukses == true) {
                               swal({
                                    title: 'Password User',
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


 <script type="text/javascript">
      <?php if ($this->session->flashdata('passnomatch')) : ?>
           swal("", "Mohon isi repeat password sesuai dengan password yg anda buat", "error");
      <?php endif; ?>
 </script>

 <script type="text/javascript">
      $("input[type=password]").keyup(function() {
           var ucase = new RegExp("[A-Z]+");
           var lcase = new RegExp("[a-z]+");
           var num = new RegExp("[0-9]+");

           if ($("#password1").val().length >= 8) {
                $("#8char").removeClass("glyphicon-remove");
                $("#8char").addClass("glyphicon-ok");
                $("#8char").css("color", "#00A41E");
           } else {
                $("#8char").removeClass("glyphicon-ok");
                $("#8char").addClass("glyphicon-remove");
                $("#8char").css("color", "#FF0004");
           }

           if (ucase.test($("#password1").val())) {
                $("#ucase").removeClass("glyphicon-remove");
                $("#ucase").addClass("glyphicon-ok");
                $("#ucase").css("color", "#00A41E");
           } else {
                $("#ucase").removeClass("glyphicon-ok");
                $("#ucase").addClass("glyphicon-remove");
                $("#ucase").css("color", "#FF0004");
           }

           if (lcase.test($("#password1").val())) {
                $("#lcase").removeClass("glyphicon-remove");
                $("#lcase").addClass("glyphicon-ok");
                $("#lcase").css("color", "#00A41E");
           } else {
                $("#lcase").removeClass("glyphicon-ok");
                $("#lcase").addClass("glyphicon-remove");
                $("#lcase").css("color", "#FF0004");
           }

           if (num.test($("#password1").val())) {
                $("#num").removeClass("glyphicon-remove");
                $("#num").addClass("glyphicon-ok");
                $("#num").css("color", "#00A41E");
           } else {
                $("#num").removeClass("glyphicon-ok");
                $("#num").addClass("glyphicon-remove");
                $("#num").css("color", "#FF0004");
           }

           if ($("#password1").val() == $("#password2").val()) {
                $("#pwmatch").removeClass("glyphicon-remove");
                $("#pwmatch").addClass("glyphicon-ok");
                $("#pwmatch").css("color", "#00A41E");
           } else {
                $("#pwmatch").removeClass("glyphicon-ok");
                $("#pwmatch").addClass("glyphicon-remove");
                $("#pwmatch").css("color", "#FF0004");
           }
      });
 </script>