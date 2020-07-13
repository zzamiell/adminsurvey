<?php
class User extends CI_Controller
{
     public function add()
     {
          $data = array(
               'first_name'        => $this->input->post('first_name'),
               'last_name'         => $this->input->post('last_name'),
               'email'             => $this->input->post('email'),
               'password'          => sha1($this->input->post('password')),
               'id_level'          => $this->input->post('id_level'),
               'status'            => 1
          );

          $insert = $this->db->insert('tb_user', $data);

          if ($insert) {
               echo json_encode(array('sukses' => true, 'msg' => 'User Berhasil Ditambahkan'));
          } else {
               echo json_encode(array('sukses' => false, 'msg' => 'Gagal Menambah User'));
          }
     }

     public function edit($id)
     {

          $data = array(
               'first_name'        => $this->input->post('first_name'),
               'last_name'         => $this->input->post('last_name'),
               'email'             => $this->input->post('email'),
               'password'          => sha1($this->input->post('password')),
               'id_level'          => $this->input->post('id_level')
          );

          $editUser      = $this->M_User->editUser($id, $data);

          if ($editUser) {
               $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Berhasil mengubah data user</div>');
               redirect('admin/kelola_user');
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               Terjadi kesalahan! gagal mengubah data user</div>');
               redirect('admin/kelola_user');
          }
     }

     public function hapus($id)
     {
          $id = $this->input->post('id');
          $hapususer    = $this->M_User->hapusUser($id);

          // if ($hapususer) {
          //      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          //      Berhasil menghapus data user<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          //      <span aria-hidden="true">&times;</span>
          //    </button></div>');
          //      redirect('admin/kelola_user');
          // } else {
          //      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          //      Terjadi kesalahan! gagal menghapus data user<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          //      <span aria-hidden="true">&times;</span>
          //      </button></div>');
          //      redirect('admin/kelola_user');
          // }
     }
}
