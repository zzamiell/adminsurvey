<?php
if (!function_exists('check_segment')) {
     function check_segment($segment_num, $item, $class_only = false)
     {
          if (get_instance()->uri->segment($segment_num) == $item) {
               return $class_only ? 'active' : 'class="active"';
          }
          return '';
     }
}

if (!function_exists('cetak')) {
     function cetak($str)
     {
          echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
     }
}

if (!function_exists('jenis')) {
     function jenis($str)
     {
          $jenis = '';
          switch ($str) {
               case 'DRSS':
                    $jenis = 'Dress';
                    break;
               case 'TNIC':
                    $jenis = 'Tunic Wanita';
                    break;
               case 'OTER':
                    $jenis = 'Outher';
                    break;
               case 'MUKN':
                    $jenis = 'Mukena';
                    break;
               case 'INNR':
                    $jenis = 'Inner';
                    break;
               case 'CPTF':
                    $jenis = 'Ciput';
                    break;
               case 'KRDN':
                    $jenis = 'Kerudug';
                    break;
          }
          return $jenis;
     }
}
