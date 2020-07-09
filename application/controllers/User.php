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

          if ($insert && $detail) {
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Berhasil menambah data user</div>');
               redirect('admin/kelola_user');
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Terjadi kesalahan! gagal menambah data user</div>');
               redirect('admin/kelola_user');
          }
     }

     public function edit($id)
     {

          $data = array(
               'username'          => $this->input->post('username'),
               'email'             => $this->input->post('email'),
               'password_old'      => sha1($this->input->post('password_old')),
               'id_level'          => $this->input->post('id_level')
          );

          $profile = array(
               'first_name'        => $this->input->post('first_name'),
               'last_name'         => $this->input->post('last_name'),
          );

          $idprofile = $this->input->post('id_profile');

          $editProfile   = $this->M_User->editProfile($idprofile, $profile);
          $editUser      = $this->M_User->editUser($id, $data);

          if ($editUser || $editProfile) {
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Berhasil mengubah data user</div>');
               redirect('admin/kelola_user');
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Terjadi kesalahan! gagal mengubah data user</div>');
               redirect('admin/kelola_user');
          }
     }

     public function hapus($id, $idprofile)
     {
          $hapususer    = $this->M_User->hapusUser($id);
          $hapusprofile = $this->M_User->hapusProfile($idprofile);

          if ($hapususer && $hapusprofile) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Berhasil menghapus data user<button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button></div>');
               redirect('admin/kelola_user');
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Terjadi kesalahan! gagal menghapus data user<button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button></div>');
               redirect('admin/kelola_user');
          }
     }
}
