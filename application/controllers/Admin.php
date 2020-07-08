<?php
class Admin extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          if ($this->session->userdata('id') == '') {
               $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Silahkan Login Terlebih Dahulu</div>');
               redirect(base_url());
          }
     }

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

               //kelola user
               $data['user']   = $this->M_User->getUser()->result();
               $data['level']  = $this->db->get('tb_level')->result();

               $this->load->view('template/header', $data);
               $this->load->view('template/sidebar', $data);
               $this->load->view('template/topbar', $data);
               $this->load->view('admin/' . $page, $data);
               $this->load->view('template/footer', $data);
          }
     }
}
