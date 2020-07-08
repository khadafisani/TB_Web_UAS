<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Tugas extends CI_Controller 
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
			$this->load->model('model_tugas');
			$data['tugasB'] = $this->model_tugas->get_tugas($this->session->userdata('username'), 'belum selesai');
			$data['tugasA'] = $this->model_tugas->get_tugas($this->session->userdata('username'), 'selesai');
			$data['pelajaran'] = $this->model_tugas->get_pelajaran($this->session->userdata('username'));
			$title['judul'] = "Halaman Tugas";
		
			$this->load->view('head/head',$title);
			$this->load->view('sidebar/main');
			$this->load->view('header/main',$title);
			$this->load->view('content/tugas',$data);
			$this->load->view('footer/main_footer');
		}
		
		public function insert()
		{
			/* Load form validation library */ 
			$this->load->library('form_validation');
			
			/* Validation rule */
			$this->form_validation->set_rules('namaTugas', 'Nama Tugas', 'required');
			$this->form_validation->set_rules('kodePelajaran', 'Nama Pelajaran', 'required|max_length[11]');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
			$this->form_validation->set_rules('waktu', 'Waktu', 'required|callback_check_time');
			
			$title['judul'] = "Halaman Jadwal";

			if ($this->form_validation->run() == FALSE) 
			{ 
				$this->load->model('model_tugas');
				$data['tugasB'] = $this->model_tugas->get_tugas($this->session->userdata('username'), 'belum selesai');
				$data['tugasA'] = $this->model_tugas->get_tugas($this->session->userdata('username'), 'selesai');
				$data['pelajaran'] = $this->model_tugas->get_pelajaran($this->session->userdata('username'));
				$title['judul'] = "Halaman Tugas";

				$this->load->view('head/head',$title);
				$this->load->view('sidebar/main');
				$this->load->view('header/main',$title);
				$this->load->view('content/tugas',$data);
				$this->load->view('footer/main_footer');
			} 
			else 
			{ 
				$data = array
				(
					'id_pelajaran' => $this->input->post('kodePelajaran'),
					'nama_tugas' => $this->input->post('namaTugas'),
					'deadline' => date("Y-m-d",strtotime($this->input->post('tanggal'))),
					'waktu' => $this->input->post('waktu'),
					'username' => $this->session->userdata('username')
				);
				$this->load->model('model_tugas');
				$this->model_tugas->insert($data);
				redirect('tugas');
			}
		}
		
		public function updateStatus($id, $deadline, $tugas)
		{
			$this->load->model('model_tugas');
			$x = rawurldecode($tugas);
			$data['status'] = "selesai";
			$this->model_tugas->updateStatus($data, $id, $deadline, $this->session->userdata('username'), $x);
			redirect('tugas');
		}
		
		public function deleteData($id, $deadline, $tugas)
		{
			$x = rawurldecode($tugas);
			$this->load->model('model_tugas');
			$this->model_tugas->deleteData($id, $deadline, $this->session->userdata('username'), $x);
			redirect('tugas');
		}
		
		public function detail($id, $deadline, $tugas)
		{
			$x = rawurldecode($tugas);
			$this->load->model('model_tugas');
			$data['detail'] = $this->model_tugas->selectData($id, $deadline, $this->session->userdata('username'), $x);
			$title['judul'] = "Halaman Tugas";

			$this->load->view('head/head',$title);
			$this->load->view('sidebar/main');
			$this->load->view('header/main',$title);
			$this->load->view('content/detail_tugas',$data);
			$this->load->view('footer/main_footer');
		}
		
		public function update($id, $deadline, $tugas)
		{
			$x = rawurldecode($tugas);
			/* Load form validation library */ 
			$this->load->library('form_validation');
			
			/* Validation rule */
			$this->form_validation->set_rules('namaTugas', 'Nama Tugas', 'required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
			$this->form_validation->set_rules('waktu', 'Waktu', 'required|callback_check_time');
			
			$this->load->model('model_tugas');
			if ($this->form_validation->run() == FALSE) 
			{ 		
				$data['update'] = $this->model_tugas->selectData($id, $deadline, $this->session->userdata('username'), $x);
				$title['judul'] = "Halaman Tugas";

				$this->load->view('head/head',$title);
				$this->load->view('sidebar/main');
				$this->load->view('header/main',$title);
				$this->load->view('content/edit_tugas',$data);
				$this->load->view('footer/main_footer');
			} 
			else 
			{
				$data = array
				(
					'id_pelajaran' => $this->input->post('kodePelajaran'),
					'nama_tugas' => $this->input->post('namaTugas'),
					'deadline' => date("Y-m-d",strtotime($this->input->post('tanggal'))),
					'waktu' => $this->input->post('waktu'),
					'username' => $this->session->userdata('username')
				);
				$this->model_tugas->updateData($data, $deadline, $x);
				redirect('tugas');
			}
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