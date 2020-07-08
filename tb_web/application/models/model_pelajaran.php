<?php
class Model_pelajaran extends CI_Model
{
    public function get_pelajaran($username)
    {
	   $query = $this->db->where('username',$username)->get('pelajaran');
	   return $query->result();
    }
	
    public function insertData($data)
    {
	   $this->db->insert('pelajaran', $data);
    }
	
	public function selectData($id, $username)
	{
		$kondisi = ['username' => $username, 'id_pelajaran' => $id];
		$this->db->where($kondisi);
		return $this->db->get('pelajaran')->result();
	}
	
	public function updateData($data, $id)
	{
		$kondisi = ['username' => $data['username'], 'id_pelajaran' =>$id];
		$this->db->where($kondisi);
		return $this->db->update('pelajaran', $data);
	}
	
	public function deleteData($id, $username)
	{
		$kondisi = ['username' => $username, 'id_pelajaran' =>$id];
		$this->db->where($kondisi);
		$this->db->delete('pelajaran');
	}
}
?>