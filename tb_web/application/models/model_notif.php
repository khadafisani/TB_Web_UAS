<?php
class Model_notif extends CI_Model
{
	public function getAllMailUserByTime($time)
	{
		$this->db->where(['notifemail' => $time, 'email !=' => NULL]);
		$query = $this->db->get('pengguna');
		return $query->result();
	}
	
	public function getAllTelegramUserByTime($time){
		$this->db->where(['notiftele' => $time, 'telegram !=' => NULL]);
		$query = $this->db->get('pengguna');
		return $query->result();
	}

	public function get_jadwal($username, $currday)
	{	
		$this->db
		->select('*')
		->from('detail_jadwal')
		->join('pelajaran', 'pelajaran.id_pelajaran = detail_jadwal.id_pelajaran and pelajaran.username = detail_jadwal.username')
		->where(['detail_jadwal.username' => $username, 'detail_jadwal.id_jadwal' => $currday]);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function method_tugas($username)
	{
		$this->db
		->select('nama_tugas, nama_pelajaran, deadline, waktu, tugas.id_pelajaran')
		->from('tugas')
		->where(['status' => 'belum selesai', 'tugas.username' => $username])
		->join('pelajaran','tugas.id_pelajaran = pelajaran.id_pelajaran and pelajaran.username = tugas.username');
		$this->db->order_by('deadline','asc');
		$query = $this->db->get();
		return $query->result();
	}
}
?>