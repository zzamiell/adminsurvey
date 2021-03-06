<?php
class M_User extends CI_Model
{
     public function getUser()
     {
          $this->db->select('*');
          $this->db->join('tb_level', 'ON tb_level.id_level = tb_user.id_level');
          return $this->db->get_where('tb_user');
     }

     public function editUser($id, $data)
     {
          $this->db->where('id_user', $id);
          return $this->db->update('tb_user', $data);
     }

     public function hapusUser($id)
     {
          $this->db->where('id_user', $id);
          return $this->db->delete('tb_user');
     }
}
