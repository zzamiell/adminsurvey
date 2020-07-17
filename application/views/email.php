<!DOCTYPE HTML>
<html>

<head>

     <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
     <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <!-- Custom styles for this template-->
     <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
     <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/datatables.min.css'); ?>">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

     <!-- sweetalert -->
     <link rel="stylesheet" type="text/css" href="<?= base_url('sweet/dist/sweetalert.css') ?>">

     <!-- ajax -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <style>
          a.button5 {
               display: inline-block;
               padding: 0.46em 1.6em;
               border: 0.1em solid #000000;
               margin: 0 0.2em 0.2em 0;
               border-radius: 0.12em;
               box-sizing: border-box;
               text-decoration: none;
               font-family: 'Roboto', sans-serif;
               font-weight: 300;
               color: #000000;
               text-shadow: 0 0.04em 0.04em rgba(0, 0, 0, 0.35);
               background-color: #FFFFFF;
               text-align: center;
               transition: all 0.15s;
          }

          a.button5:hover {
               text-shadow: 0 0 2em rgba(255, 255, 255, 1);
               color: #FFFFFF;
               border-color: #FFFFFF;
          }

          @media all and (max-width:30em) {
               a.button5 {
                    display: block;
                    margin: 0.4em auto;
               }
          }
     </style>

</head>

<body>
     <div class="row">
          <div class="modal-dialog modal-sm">
               <div class="modal-content">
                    <div class="modal-header">
                         Hi <?= $nama ?>,
                    </div>
                    <div class="modal-body">
                         This is your final step before to complete create new password.
                         Please confirm your email address - just click on the link below.
                         <p>
                              <div class="text-center">
                                   <a href="<?= base_url('email/resetPassword/' . encrypt_url($tokenfresh))  ?>"><?= base_url('email/resetPassword/' . encrypt_url($tokenfresh))  ?>"></a>
                              </div>
                         </p>
                         <br>
                         Or you can click the button below to create new password
                         <br>
                         <p>
                              <form method="" action="<?= base_url('email/resetPassword/' . encrypt_url($tokenfresh))  ?>">
                                   <div class="section" style="font-size:1.5em; padding-left:3em 0.5em; background-image:url('html5cool/buttons/blueBk.png'); background-size:cover; text-align:center">
                                        <a class="button5 w-100 text-center" style="background-color:#42cc8c;" href="<?= base_url('email/resetPassword/' . encrypt_url($tokenfresh))  ?>">RESET PASSWORD</a>
                                        <!--<a href="javascript:alert('Infinite joy!')" class="button5" style="background-color:#42cc8c;">Download</a>-->
                                        <a href="javascript:alert('Needs more COC')" class="button5" style="border-color:#FFFFFF; background-color:rgba(0,0,0,0); color:#FFFFFF">View</a>
                                   </div>
                              </form>
                         </p>
                    </div>
                    <!--END of modalb-->

               </div>
               <!--END of mod-cont-->
          </div>
          <!--END of mod-Dia-->
     </div>
     <!--END of row-->
</body>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets/vendor/datatables/datatables.min.js'); ?>"></script>

</html>