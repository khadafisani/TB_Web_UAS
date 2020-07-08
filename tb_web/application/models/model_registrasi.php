<?php
class Model_registrasi extends CI_Model
{
    public function saveUser($data)
    {
	   $this->db->insert('pengguna', $data);
    }
	
	public function update($data, $username)
	{
		$this->db->where('username', $username);
		return $this->db->update('pengguna', $data);
	}
	
	public function selectData($kondisi)
	{
		$this->db->where($kondisi);
		return $this->db->get('pengguna')->num_rows();
	}
}
?>