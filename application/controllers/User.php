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
               echo json_encode(array('sukses' => true, 'msg' => 'User Berhasil Diubah'));
          } else {
               echo json_encode(array('sukses' => false, 'msg' => 'Gagal Mengubah User'));
          }
     }

     public function hapus($id)
     {
          $id = $this->input->post('id');
          $hapususer    = $this->M_User->hapusUser($id);
     }
}
