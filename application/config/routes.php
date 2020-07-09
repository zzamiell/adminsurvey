<?php
defined('BASEPATH') or exit('No direct script access allowed');




$route['default_controller'] = 'auth';
$route['login'] = 'auth/proses_login';
$route['admin/(:any)'] = 'admin/handlemenu/$1';


//Tambah
$route['tambahUser'] = 'user/add';


//Edit
$route['editUser/(:any)'] = 'user/edit/$1';

//Hapus
$route['hapusUser/(:any)/(:any)'] = 'user/hapus/$1/$2';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
