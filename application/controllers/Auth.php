<?php
class Auth extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
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

     public function log_off()
     {
          $sess = array(
               'id'           => $this->session->userdata('id'),
               'username'     => $this->session->userdata('username'),
               'password_old' => $this->session->userdata('password'),
               'email'        => $this->session->userdata('email')
          );
          // $this->session->unset_userdata(array('id' => '', 'username' => '', 'password_old' => '', 'email' => ''));
          // $this->session->unset_userdata('berhasil');
          // print_r($sess);
          // die;
          $this->session->unset_userdata($sess);
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Session telah berakhir, silahkan login kembali</div>');
          redirect(base_url());
     }
}
