<?php
defined('BASEPATH') or exit('No direct script access allowed');




$route['default_controller'] = 'auth';
$route['admin/(:any)'] = 'admin/handlemenu/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
