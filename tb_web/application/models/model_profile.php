<?php
class Model_profile extends CI_Model
{
	public function update($data, $username)
	{
		$this->db->where('username', $username);
		return $this->db->update('pengguna',$data);
	}
	
	public function selectData($username)
	{
		$query = $this->db->where('username',$username)->get('pengguna');
		return $query->result();
	}
}