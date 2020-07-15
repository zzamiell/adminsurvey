<?php
class Email extends CI_Controller
{
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
