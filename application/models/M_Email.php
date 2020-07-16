<?php
class M_Email extends CI_Model
{
     public function updateToken($token, $email)
     {
          $this->db->where('email', $email);
          return $this->db->update('tb_user', $token);
     }

     public function updatePassword($token, $data)
     {
          $this->db->where('token', $token);
          return $this->db->update('tb_user', $data);
     }

     public function hapusToken($token, $data)
     {
          $this->db->where('token', $token);
          return $this->db->update('tb_user', $data);
     }
}
