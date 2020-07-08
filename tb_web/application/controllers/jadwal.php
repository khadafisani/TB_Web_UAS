<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Jadwal extends CI_Controller 
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->check_login();
		}
		
		 private function check_login()
		{
		  if(!$this->session->userdata('log_in'))
		  {
			  redirect('login');
		  }
		}
	
		public function index()
		{
			$title['judul'] = "Halaman Jadwal";
			$this->load->model('model_jadwal');
			$data['jadwal'] = $this->model_jadwal->selectJadwal($this->session->userdata('username'));
			$data['pelajaran'] = $this->model_jadwal->selectData($this->session->userdata('username'));
			$this->load->view('head/head',$title);
			$this->load->view('sidebar/main');
			$this->load->view('header/main',$title);
			$this->load->view('content/jadwal',$data);
			$this->load->view('footer/main_footer');
		}
		
		public function insert()
		{
			/* Load form validation library */ 
			$this->load->library('form_validation');
			/* Validation rule */
			$this->form_validation->set_rules('kodePelajaran', 'Kode Pelajaran', 'required');
			$this->form_validation->set_rules('ruanganBelajar', 'Ruangan', 'required|max_length[50]');
			$this->form_validation->set_rules('jamMulai', 'Jam Mulai', 'required|min_length[5]|max_length[5]|callback_check_time');
			$this->form_validation->set_rules('jamSelesai', 'Jam Selesai', 'required|min_length[5]|max_length[5]|callback_check_time');
			$this->form_validation->set_rules('hari', 'Hari', 'required');

			$title['judul'] = "Halaman Jadwal";
			$this->load->model('model_jadwal');
			
			if ($this->form_validation->run() == FALSE) 
			{ 
				$data['jadwal'] = $this->model_jadwal->selectJadwal($this->session->userdata('username'));
				$data['pelajaran'] = $this->model_jadwal->selectData($this->session->userdata('username'));
				$this->load->view('head/head',$title);
				$this->load->view('sidebar/main');
				$this->load->view('header/main',$title);
				$this->load->view('content/jadwal',$data);
				$this->load->view('footer/main_footer');
			} 
			else 
			{
				$insert = array
				(
					'id_pelajaran' => $this->input->post('kodePelajaran'),
					'ruangan' => $this->input->post('ruanganBelajar'),
					'mulai' => $this->input->post('jamMulai'),
					'selesai' => $this->input->post('jamSelesai'),
					'id_jadwal' => $this->input->post('hari'),
					'username' => $this->session->userdata('username')
				);
				$this->load->model('model_jadwal');
				$this->model_jadwal->insertData($insert);
				redirect('jadwal');
			}
		}
		
		public function detail($hari, $id, $mulai)
		{
			$this->load->model('model_jadwal');
			
			$data['detail'] = $this->model_jadwal->selectById($this->session->userdata('username'), $id, $hari, $mulai);
			$title['judul'] = "Detail Jadwal";
			
			$this->load->view('head/head',$title);
			$this->load->view('sidebar/main');
			$this->load->view('header/main',$title);
			$this->load->view('content/detail_jadwal',$data);
			$this->load->view('footer/main_footer');
		}
		
		public function update($hari, $id, $mulai)
		{
			/* Load form validation library */ 
			$this->load->library('form_validation');
			
			/* Validation rule */
			$this->form_validation->set_rules('Ruangan', 'Ruangan', 'required|max_length[50]');
			$this->form_validation->set_rules('jamMulai', 'Jam Mulai', 'required|min_length[5]|max_length[5]|callback_check_time');
			$this->form_validation->set_rules('jamSelesai', 'Jam Selesai', 'required|min_length[5]|max_length[5]|callback_check_time');
			$this->form_validation->set_rules('hari', 'Hari', 'required');

			$title['judul'] = "Edit Jadwal";
			$this->load->model('model_jadwal');

			if ($this->form_validation->run() == FALSE) 
			{
				$data['jadwal'] = $this->model_jadwal->selectById($this->session->userdata('username'), $id, $hari, $mulai);
				$this->load->view('head/head',$title);
				$this->load->view('sidebar/main');
				$this->load->view('header/main',$title);
				$this->load->view('content/edit_jadwal',$data);
				$this->load->view('footer/main_footer');
			} 
			else 
			{
				$data = array
				(
					'id_pelajaran' => $id,
					'ruangan' => $this->input->post('Ruangan'),
					'mulai' => $this->input->post('jamMulai'),
					'selesai' => $this->input->post('jamSelesai'),
					'id_jadwal' => $this->input->post('hari'),
					'username' => $this->session->userdata('username')
				);

				$this->load->model('model_jadwal');
				$this->model_jadwal->updateData($data, $hari, $mulai);
				redirect('jadwal');
			}
		}
		
		public function deleteData($hari, $id, $mulai)
		{
			$this->load->model('model_jadwal');
			$this->model_jadwal->deleteData($hari, $id, $mulai, $this->session->userdata('username'));
			redirect('jadwal');
			
		}
		
		public function check_time($time)
		{
			$x = preg_match("/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/", $time);
			if($x==1)
			{
				return true;
			}
			else
			{
				$this->form_validation->set_message('check_time', 'Format waktu tidak valid');
				return false;
			}
		}
	}
