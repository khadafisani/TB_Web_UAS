<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller 
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
			$hari = date('D');
			$user = $this->session->userdata('username');
			$this->load->model('model_dashboard');
			$hasil['jadwal_hari_ini'] = $this->model_dashboard->jadwal_today($hari, $user);	
			$this->load->model('model_tugas');
			$hasil['tugas'] = $this->model_tugas->get_tugas($this->session->userdata('username'), 'belum selesai');
			
			$title['judul'] = "Halaman Utama";
		
			$this->load->view('head/head',$title);
			$this->load->view('sidebar/main');
			$this->load->view('header/main',$title);
			$this->load->view('content/dashboard',$hasil);
			$this->load->view('footer/main_footer');
		}
		
		public function ubahPassword()
		{
		  $this->load->library('form_validation');

		  $this->form_validation->set_rules('passLama', 'Password lama', 'required|callback_check_password');
		  $this->form_validation->set_rules('passBaru', 'Password baru', 'required|min_length[6]|max_length[100]');
		  $this->form_validation->set_rules('konfirmasi', 'Password konfirmasi', 'required|matches[passBaru]');

		  if($this->form_validation->run() == FALSE)
		  {
				$title['judul'] = "Ganti Password";
				$this->load->view('head/head',$title);
				$this->load->view('sidebar/main');
				$this->load->view('header/main',$title);
				$this->load->view('content/gantiPassword');
				$this->load->view('footer/main_footer');
		  }
		  else
		  {
			  $data['password'] = $this->input->post('passBaru');
			  $this->load->model('model_registrasi');
			  $this->model_registrasi->update($data, $this->session->userdata('username'));
			  redirect('dashboard');
		  }	  
		}
		
		public function check_password($pass)
		{
			$data['password'] = $pass;
			$data['username'] = $this->session->userdata('username');
			$this->load->model('model_registrasi');
			$x = $this->model_registrasi->selectData($data);
			if ($x > 0)
			{
		        return TRUE;
		    }
			else 
			{
				$this->form_validation->set_message('check_password','Password lama salah');
				return FALSE;
			}
		}
	}