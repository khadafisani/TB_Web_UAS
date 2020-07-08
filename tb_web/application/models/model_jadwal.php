<?php
class Model_jadwal extends CI_Model
{
	public function selectJadwal($username)
	{
		$this->db
		->select('hari,nama_pelajaran, pengajar, ruangan, mulai, selesai, detail_jadwal.id_pelajaran, detail_jadwal.id_jadwal')
		->from('detail_jadwal')
		->join('pelajaran', 'detail_jadwal.id_pelajaran = pelajaran.id_pelajaran and detail_jadwal.username= pelajaran.username')
		->join('jadwal', 'detail_jadwal.id_jadwal = jadwal.id_jadwal and detail_jadwal.username = "'.$username.'"');
		$this->db->order_by('urutan', 'asc');
		$this->db->order_by('mulai', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function selectData($username)
	{
		$this->db->where('username',$username);
		return $this->db->get('pelajaran')->result();
	}
	
	public function selectById($username, $id, $hari, $mulai)
	{
		$this->db
		->select('hari, detail_jadwal.id_pelajaran, nama_pelajaran, pengajar, ruangan, mulai, selesai')
		->from('detail_jadwal')
		->join('pelajaran', 'pelajaran.id_pelajaran = detail_jadwal.id_pelajaran and detail_jadwal.id_pelajaran="'.$id.'" and detail_jadwal.username = pelajaran.username and mulai="'.$mulai.'"')
		->join('jadwal', 'jadwal.id_jadwal = detail_jadwal.id_jadwal and hari="'.$hari.'" and detail_jadwal.username="'.$username.'"');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function insertData($data)
	{
		$this->db->insert('detail_jadwal', $data);
	}
	
	public function updateData($data, $hari, $mulai)
	{
		$id_jadwal = $this->get_hari($hari);
		$kondisi = ['username' => $data['username'], 'id_pelajaran' => $data['id_pelajaran'], 'id_jadwal' => $id_jadwal, 'mulai' => $mulai];
		$this->db->where($kondisi);
		return $this->db->update('detail_jadwal', $data);
	}
	
	public function deleteData($hari, $id, $mulai, $username)
	{
		$id_jadwal = $this->get_hari($hari);
		$kondisi = ['username' => $username, 'id_pelajaran' => $id, 'mulai' => $mulai, 'id_jadwal' => $id_jadwal];
		$this->db->delete('detail_jadwal', $kondisi);
	}
	
	private function get_hari($hari)
	{
		$x = array(
		array('Mon','senin'),
		array('Tue','selasa'),
		array('Wed','rabu'),
		array('Thu','kamis'),
		array('Fri','jumat'),
		array('Sat','sabtu'),
		array('Sun','minggu')
		);
		
		for($i = 0 ; $i < 7; $i++)
		{
			if($x[$i][1] == $hari)
			{
				return $x[$i][0];
			}
		}
	}
}
?>