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
               'email'         => $this->input->post('email'),
               'password'      => sha1($this->input->post('password'))
          );

          $cek  = $this->db->get_where('tb_user', $data)->num_rows();
          $data =  $this->db->get_where('tb_user', $data)->row();

          if ($cek > 0) {
               $level = 'admin';
               $sess = array(
                    'id'       => $data->id_user,
                    'email'    => $data->email,
                    'password' => $data->password
               );
               $this->session->set_userdata($sess);
               $this->session->set_flashdata('login', '<div class="alert alert-success" role="alert">
               Berhasil login</div>');
               redirect('admin/home');
          } else {
               $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
               Maaf username/password salah</div>');
               redirect(base_url());
          }
     }

     public function logout()
     {
          // session_destroy();
          $this->session->unset_userdata('id');
          $this->session->set_flashdata('logout', '<div class="alert alert-success" role="alert">
          Berhasil login</div>');
          redirect(base_url());
     }

     public function log_off()
     {
          $this->session->unset_userdata('id');
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Session telah berakhir, silahkan login kembali</div>');
          redirect(base_url());
     }

     public function sendEmail()
     {

          $config['protocol']    = 'mail';
          $config['smtp_host']    = 'ssl://asiaresearchinstitute.com';
          $config['smtp_port']    = '465';
          $config['smtp_timeout'] = '400';
          $config['smtp_user']    = 'smtp@asiaresearchinstitute.com';
          $config['smtp_pass']    = '(WO6fz)t##;]';
          $config['charset']    = 'utf-8';
          $config['newline']    = "\r\n";
          $config['mailtype'] = 'html';
          $config['validation'] = FALSE;

          $this->load->library('email');
          $this->email->initialize($config);
          $this->email->from('info@asiaresearchinstitute.com', 'Asia Research Institute');
          $this->email->to('anugrahabdikautsar@gmail.com');
          $this->email->subject('dayduy');
          $this->email->message('isiaja');
          $this->email->set_newline("\r\n");

          $result = $this->email->send();
          if ($result) {
               echo json_encode(array('sukses' => true, 'msg' => 'Silahkan cek email anda untuk melakukan reset password'));
          } else {
               echo json_encode(array('failed' => false, 'msg' => 'Gagal Menambah User'));
               // redirect(base_url('guest/service'));    
          };
     }
}
