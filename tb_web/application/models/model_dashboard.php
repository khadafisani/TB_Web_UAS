<?php
class Model_dashboard extends CI_Model
{
    public function jadwal_today($hari, $username)
    {
	   $this->db
	   ->select('nama_pelajaran, hari, pengajar, ruangan, mulai, selesai')
	   ->from('pelajaran')
	   ->join('pengguna', 'pelajaran.username = pengguna.username and pengguna.username="'.$username.'"')
	   ->join('detail_jadwal', 'pengguna.username = detail_jadwal.username and detail_jadwal.id_pelajaran = pelajaran.id_pelajaran')
	   ->join('jadwal', 'detail_jadwal.id_jadwal = jadwal.id_jadwal and jadwal.id_jadwal="'.$hari.'" order by mulai');
	   $query = $this->db->get();
	   return $query->result();
    }
}
?>