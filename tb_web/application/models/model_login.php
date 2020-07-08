<?php
class Model_login extends CI_Model
{
    public function login($username, $password)
    {
	   $query = $this->db->where(['username' => $username, 'password' => $password])->get('pengguna');
	   return $query->result();
    }
}
?>