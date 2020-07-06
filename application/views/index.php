<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
     * {
          box-sizing: border-box;
     }

     .menu {
          float: left;
          width: 20%;
     }

     .menuitem {
          padding: 8px;
          margin-top: 7px;
          border-bottom: 1px solid #f1f1f1;
     }

     .main {
          float: left;
          width: 60%;
          padding: 0 20px;
          overflow: hidden;
     }

     .right {
          background-color: lightblue;
          float: left;
          width: 20%;
          padding: 10px 15px;
          margin-top: 7px;
     }

     @media only screen and (max-width:800px) {

          /* For tablets: */
          .main {
               width: 80%;
               padding: 0;
          }

          .right {
               width: 100%;
          }
     }

     @media only screen and (max-width:500px) {

          /* For mobile phones: */
          .menu,
          .main,
          .right {
               width: 100%;
          }
     }
</style>
<link rel="icon" href="<?= base_url('assets/img/logo.bmp') ?>" type="image/gif/bmp">
<link rel="stylesheet" href="<?= base_url('assets/css/loginlogin.css'); ?>">
<title><?= $judul; ?></title>
<div class="login-box">
     <h2>ADMIN LOGIN</h2>
     <?= form_open('login'); ?>
     <div class="user-box">
          <input type="text" name="username" required="">
          <label>Username</label>
     </div>
     <div class="user-box">
          <input type="password" name="password_old" required="">
          <label>Password</label>
     </div>
     <button>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Submit
     </button>
     <?= form_close(); ?>
</div>