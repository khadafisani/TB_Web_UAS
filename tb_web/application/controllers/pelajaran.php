<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pelajaran extends CI_Controller 
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
			$this->load->model('model_pelajaran');
			$hasil['pelajaran'] = $this->model_pelajaran->get_pelajaran($this->session->userdata('username'));
			$title['judul'] = "Halaman Pelajaran";
		
			$this->load->view('head/head',$title);
			$this->load->view('sidebar/main');
			$this->load->view('header/main',$title);
			$this->load->view('content/pelajaran',$hasil);
			$this->load->view('footer/main_footer');
		}
		
		public function insert()
		{
			/* Load form validation library */ 
			$this->load->library('form_validation');
			
			/* Validation rule */
			$this->form_validation->set_rules('kodePelajaran', 'Kode Pelajaran', 'required|min_length[4]|max_length[10]|callback_check_pelajaran');
			$this->form_validation->set_rules('namaPelajaran', 'Nama Pelajaran', 'required|max_length[100]');
			$this->form_validation->set_rules('namaPengajar', 'Nama Pengajar', 'required|max_length[100]');
			$this->form_validation->set_rules('kontakPengajar', 'Kontak Pengajar', 'max_length[50]');
			$this->form_validation->set_rules('semester', 'Semester', 'max_length[2]');
			
			$title['judul'] = "Halaman Pelajaran";
			
			$this->load->model('model_pelajaran');
			
			if ($this->form_validation->run() == FALSE) 
			{ 
				$hasil['pelajaran'] = $this->model_pelajaran->get_pelajaran($this->session->userdata('username'));
				$this->load->view('head/head',$title);
				$this->load->view('sidebar/main');
				$this->load->view('header/main',$title);
				$this->load->view('content/pelajaran',$hasil);
				$this->load->view('footer/main_footer');
			} 
			else 
			{ 
				$data = array
				(
					'id_pelajaran' => $this->input->post('kodePelajaran'),
					'nama_pelajaran' => $this->input->post('namaPelajaran'),
					'pengajar' => $this->input->post('namaPengajar'),
					'kontak_pengajar' => $this->input->post('kontakPengajar'),
					'semester' => $this->input->post('semester'),
					'username' => $this->session->userdata('username'),
				);
				$this->load->model('model_pelajaran');
				$this->model_pelajaran->insertData($data);
				redirect('pelajaran/index');
			}
		}
		
		public function detail($kondisi)
		{
			$x = rawurldecode($kondisi);
			$this->load->model('model_pelajaran');
			$hasil['detail'] = $this->model_pelajaran->selectData($x, $this->session->userdata('username'));
			$title['judul'] = "Detail Pelajaran";
		
			$this->load->view('head/head',$title);
			$this->load->view('sidebar/main');
			$this->load->view('header/main',$title);
			$this->load->view('content/detail_pelajaran',$hasil);
			$this->load->view('footer/main_footer');
		}
		
		public function update($id)
		{
			$x = rawurldecode($id);
			/* Load form validation library */ 
			$this->load->library('form_validation');
			
			/* Validation rule */
			$this->form_validation->set_rules('kodePelajaran', 'Kode Pelajaran', 'required|min_length[4]|max_length[10]|callback_check_pelajaran');
			$this->form_validation->set_rules('namaPelajaran', 'Nama Pelajaran', 'required|max_length[100]');
			$this->form_validation->set_rules('namaPengajar', 'Nama Pengajar', 'required|max_length[100]');
			$this->form_validation->set_rules('kontakPengajar', 'Kontak Pengajar', 'max_length[50]');
			$this->form_validation->set_rules('semester', 'Semester', 'max_length[2]');
				
			if ($this->form_validation->run() == FALSE) 
			{
				$this->load->model('model_pelajaran');
				$hasil['update'] = $this->model_pelajaran->selectData($x, $this->session->userdata('username'));
				$title['judul']= "Update Pelajaran";
				$this->load->view('head/head',$title);
				$this->load->view('sidebar/main');
				$this->load->view('header/main',$title);
				$this->load->view('content/edit_pelajaran',$hasil);
				$this->load->view('footer/main_footer');
			} 
			else 
			{ 
				$data = array
				(
					'id_pelajaran' => $this->input->post('kodePelajaran'),
					'nama_pelajaran' => $this->input->post('namaPelajaran'),
					'pengajar' => $this->input->post('namaPengajar'),
					'kontak_pengajar' => $this->input->post('kontakPengajar'),
					'semester' => $this->input->post('semester'),
					'username' => $this->session->userdata('username'),
				);
				
				$this->load->model('model_pelajaran');
				$this->model_pelajaran->updateData($data, $x);
				redirect('pelajaran');
			}
		}
		
		public function deleteData($id)
		{
			$x = rawurldecode($id);
			$this->load->model('model_pelajaran');
			$this->model_pelajaran->deleteData($x, $this->session->userdata('username'));
			redirect('pelajaran');
		}
		
		public function check_pelajaran($id)
		{
			$kondisi = array (
			'id_pelajaran' => rawurldecode($id),
			'username' => $this->session->userdata('username')
			);
	        $query = $this->db->where($kondisi)->get("pelajaran");
			if ($query->num_rows() > 0)
			{
				$this->form_validation->set_message('check_pelajaran','ID pelajaran Telah terdaftar');
		        return FALSE;
		    }
			else
			{
			  return TRUE;
			}
		}
	}