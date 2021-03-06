<!DOCTYPE html>
<html lang="en">

<head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title><?= $judul; ?></title>


     <!-- Custom fonts for this template-->
     <link rel="icon" href="<?= base_url('assets/img/logopng.png') ?>" type="image/gif/bmp">
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

     <?php if (isset($css)) echo '<link href=' . base_url('assets/css/' . $css) . ' rel="stylesheet">'; ?>
</head>

<body id="page-top">

     <!-- Page Wrapper -->
     <div id="wrapper">