<?php
class Model_tugas extends CI_Model
{
    public function get_tugas($username, $status)
    {
		$this->db
		->select('nama_tugas, nama_pelajaran, deadline, waktu, tugas.id_pelajaran')
		->from('tugas')
		->where(['status' => $status, 'tugas.username' => $username])
		->join('pelajaran','tugas.id_pelajaran = pelajaran.id_pelajaran and pelajaran.username = tugas.username');
		$this->db->order_by('deadline','asc');
		$query = $this->db->get();
		return $query->result();
    }
	
	public function get_pelajaran($username)
	{
		$this->db
		->select('id_pelajaran, nama_pelajaran, semester')
		->from('pelajaran')
		->where('username', $username);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function insert($data)
	{
		$this->db->insert('tugas',$data);
	}
	
	public function updateStatus($data, $id, $deadline, $username, $tugas)
	{
		$kondisi = ['id_pelajaran' => $id, 'deadline' => $deadline, 'username' =>$username, 'nama_tugas' => $tugas];
		$this->db->where($kondisi);
		return $this->db->update('tugas', $data);
	}
	
	public function deleteData($id, $deadline, $username, $tugas)
	{
		$kondisi = ['id_pelajaran' => $id, 'deadline' => $deadline, 'username' => $username, 'nama_tugas' => $tugas];
		$this->db->where($kondisi);
		$this->db->delete('tugas');
	}
	
	public function selectData($id, $deadline, $username, $tugas)
	{
		$kondisi = ['tugas.id_pelajaran' => $id, 'deadline' => $deadline, 'tugas.username' =>$username, 'nama_tugas' => $tugas];
		$this->db
		->select('tugas.id_pelajaran, nama_tugas, deadline, waktu, status, nama_pelajaran')
		->from('tugas')
		->join('pelajaran', 'tugas.id_pelajaran = pelajaran.id_pelajaran and pelajaran.username = tugas.username');
		$this->db->where($kondisi);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function updateData($data, $deadline, $tugas)
	{
		$kondisi = ['id_pelajaran' => $data['id_pelajaran'], 'deadline' => $deadline, 'username' =>$data['username'], 'nama_tugas' => $tugas];
		$this->db->where($kondisi);
		return $this->db->update('tugas',$data);
	}
}
?>