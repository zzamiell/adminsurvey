<?php
class Email extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->library('encrypt');
     }

     public function kirimEmail()
     {
          $email  = $this->input->post('email');

          $cek    = $this->db->get_where('tb_user', array('email' => $email))->num_rows();
          $data   = $this->db->get_where('tb_user', array('email' => $email))->row();

          $nama['nama']   = $data->first_name . ' ' . $data->last_name;
          $tanggal                      = time();
          $tanggalv2                    = (int) ($tanggal / 10);
          $token                        = md5($tanggalv2 . $data->id_user);

          $userToken = array(
               'token'   => $token
          );

          if ($cek > 0) {
               $this->M_Email->updateToken($userToken, $data->email);
               $newtoken   = $this->db->get_where('tb_user', array('token' => $token))->row();
               $url['url'] = site_url() . 'email/resetPassword/' . $newtoken->token;
               $link = '<a href="' . $url . '">' . $url . '</a>';
               $tokenfresh['tokenfresh'] = $newtoken->token;
               // print_r($link);
               $this->sendEmail($data->email, $nama, $url, $tokenfresh);
          } else {
               $this->session->set_flashdata('noemail', '<div class="alert alert-danger" role="alert">
               Maaf username/password salah</div>');
               redirect(base_url());
          }
     }

     public function resetPassword($token)
     {
          $cek     = $this->db->get_where('tb_user', array('token' => decrypt_url($token)))->num_rows();
          $hasil   = $this->db->get_where('tb_user', array('token' => decrypt_url($token)))->row();

          $data['token'] = $hasil->token;

          // print_r($data);
          // die;

          if ($cek > 0) {
               // $this->load->view('template/Authheader', $data);
               $this->load->view('updatepassword', $data);
               $this->load->view('template/Authfooter');
          } else {
               $this->session->set_flashdata('notoken', '<div class="alert alert-danger" role="alert">
               Maaf username/password salah</div>');
               redirect(base_url());
          }
     }

     public function updatePassword($token)
     {
          $password1 = $this->input->post('password1');
          $password2 = $this->input->post('password2');

          if ($password1 !== $password2) {
               $this->session->set_flashdata('passnomatch', '<div class="alert alert-danger" role="alert">
               Maaf username/password salah</div>');
               echo "<script type='text/javascript'>
               history.back(self);
               </script>";
          } else {
               $data = array(
                    'password'        => sha1($password1)
               );

               $hapustoken = array(
                    'token'   => ''
               );

               $editToken      = $this->M_Email->updatePassword($token, $data);

               if ($editToken) {
                    $deletetoken  = $this->M_Email->hapusToken($token, $hapustoken);
                    echo json_encode(array('sukses' => true, 'msg' => 'Berhasil merubah password'));
               } else {
                    echo json_encode(array('sukses' => false, 'msg' => 'Gagal merubah password'));
               }
          }
     }

     public function sendEmail($email, $nama, $url, $tokenfresh)
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
          $this->email->to($email);
          $this->email->subject('Reset password');
          $this->email->message($this->load->view('email', $url + $nama + $tokenfresh, true));
          $this->email->set_newline("\r\n");

          $result = $this->email->send();
          if ($result) {
               $this->session->set_flashdata('emailok', '<div class="alert alert-success" role="alert">
          Berhasil login</div>');
               redirect(base_url());
          } else {
               $this->session->set_flashdata('emailnotok', '<div class="alert alert-success" role="alert">
          Berhasil login</div>');
               redirect(base_url());
               // redirect(base_url('guest/service'));    
          };
     }
}
