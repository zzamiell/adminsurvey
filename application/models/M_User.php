<?php
class M_User extends CI_Model
{
     public function getUser()
     {
          $this->db->select('*');
          $this->db->join('tb_profile', 'ON tb_profile.id_profile = tb_user.id_profile');
          $this->db->join('tb_level', 'ON tb_level.id_level = tb_user.id_level');
          return $this->db->get_where('tb_user');
     }
}
