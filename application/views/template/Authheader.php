<!DOCTYPE html>
<html lang="en">

<head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title><?= $judul; ?></title>
     <link rel="icon" href="<?= base_url('assets/img/logo.bmp') ?>" type="image/gif">
     <!-- Custom fonts for this template-->
     <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <!-- Custom styles for this template-->
     <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

     <!-- sweetalert -->
     <link rel="stylesheet" type="text/css" href="<?= base_url('sweet/dist/sweetalert.css') ?>">

     <!-- ajax -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <?php if (isset($css)) echo '<link href="' . base_url('assets/css/' . $css) . '" rel="stylesheet">'; ?>

</head>

<body class="bg-gradient-info">