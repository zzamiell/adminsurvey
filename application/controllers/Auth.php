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
          $data['css'] = "login.css";
          $data['js'] = "login.js";
          $this->load->view('template/Authheader', $data);
          $this->load->view('index', $data);
          $this->load->view('template/Authfooter', $data);
     }

     public function proses_login()
     {
          $data = array(
               'username' => $this->input->post('username'),
               'password_old' => sha1($this->input->post('password_old'))
          );

          $cek  = $this->db->get_where('tb_user', $data)->num_rows();
          $data =  $this->db->get_where('tb_user', $data)->row();

          if ($cek > 0) {
               $level = 'admin';
               $sess = array(
                    'id'    => $data->id_user,
                    'username' => $data->username,
                    'password_old' => $data->password,
                    'email'    => $data->email
               );
               $this->session->set_userdata($sess);
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Berhasil login</div>');
               redirect('admin/home');
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Maaf username/password salah</div>');
               redirect(base_url());
          }
     }

     public function logout()
     {
          session_destroy();
          redirect(base_url());
     }
}
