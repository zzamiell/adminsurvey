<?php
defined('BASEPATH') or exit('No direct script access allowed');




$route['default_controller'] = 'auth';
$route['login'] = 'auth/proses_login';
$route['admin/(:any)'] = 'admin/handlemenu/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
