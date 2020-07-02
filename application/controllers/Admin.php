<?php
class Admin extends CI_Controller
{
     public function handlemenu($page)
     {
          if ($this->load->view('admin/' . $page, '', TRUE) === '') {
          } else {
               if ($page === "home") :
                    $judul = 'Admin';
               else :
                    $judul = ucfirst(str_replace('_', ' ', $page));
               endif;

               $data['judul'] = 'Halaman ' . $judul;

               $this->load->view('template/header', $data);
               $this->load->view('template/sidebar', $data);
               $this->load->view('template/topbar', $data);
               $this->load->view('admin/' . $page, $data);
               $this->load->view('template/footer', $data);
          }
     }
}
