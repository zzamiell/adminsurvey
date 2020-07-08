<?php
class User extends CI_Controller
{
     public function add()
     {

          $profile = $this->db->get('tb_user')->num_rows() + 1;

          $data = array(
               'username'          => $this->input->post('username'),
               'email'             => $this->input->post('email'),
               'password_old'      => sha1($this->input->post('password_old')),
               'id_level'          => $this->input->post('id_level'),
               'id_profile'        => $profile,
               'status'            => 1
          );

          $profile = array(
               'id_profile'        => $profile,
               'first_name'        => $this->input->post('first_name'),
               'last_name'         => $this->input->post('last_name'),
          );

          $detail = $this->db->insert('tb_profile', $profile);
          $insert = $this->db->insert('tb_user', $data);

          if ($insert) {
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Berhasil menambah data user</div>');
               redirect('admin/kelola_user');
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Terjadi kesalahan! gagal menambah data user</div>');
               redirect('admin/kelola_user');
          }
     }
}
