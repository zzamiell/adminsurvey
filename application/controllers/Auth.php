<?php
class Auth extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          // if ($this->session->userdata('username') == '') {
          //      $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Silahkan Login Terlebih Dahulu</div>');
          //      redirect(base_url());
          // }
     }

     public function index()
     {
          $data['judul'] = 'Halaman Login - PT ARI';
          $this->load->view('index', $data);
     }
}
