<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profile extends CI_Controller 
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
			$this->load->model('model_profile');
			$data['user'] = $this->model_profile->selectData($this->session->userdata('username'));
			$title['judul'] = "Halaman Profile";
			$this->load->view('head/head',$title);
			$this->load->view('sidebar/main');
			$this->load->view('header/main',$title);
			$this->load->view('content/profile', $data);
			$this->load->view('footer/main_footer');
		}
		
		 public function do_upload()
        {
            $config['upload_path']      = './assets/img/';
			$config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = 2048;
			$config['file_name']		= 'foto-'.md5($this->session->userdata('username'));
			$config['overwrite']		= TRUE;
            $this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			/* Load form validation library */ 
			$this->load->library('form_validation');
			
			/* Validation rule */
			$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
			$this->form_validation->set_rules('Email', 'Email', 'required');

			$title['judul'] = "Edit Jadwal";
			$this->load->model('model_jadwal');
			
			if($this->form_validation->run() == FALSE) 
			{
				$this->load->model('model_profile');
				$data['user'] = $this->model_profile->selectData($this->session->userdata('username'));
				$title['judul'] = "Halaman Profile";
				$this->load->view('head/head',$title);
				$this->load->view('sidebar/main');
				$this->load->view('header/main',$title);
				$this->load->view('content/profile', $data);
				$this->load->view('footer/main_footer');
			}
			else
			{
				if(@$_FILES['foto']['name'] != null)
				{
					if (!$this->upload->do_upload('foto'))
					{
						$this->load->model('model_profile');
						$data['user'] = $this->model_profile->selectData($this->session->userdata('username'));
						$data['error'] = $this->upload->display_errors();
						$title['judul'] = "Halaman Profile";
						$this->load->view('head/head',$title);
						$this->load->view('sidebar/main');
						$this->load->view('header/main',$title);
						$this->load->view('content/profile', $data);
						$this->load->view('footer/main_footer');	
					}
					else
					{
						$data = array(
						'nama' => $this->input->post('nama'),
						'email' => $this->input->post('Email'),
						'tempat_lahir' => $this->input->post('tempatLahir'),
						'tanggal_lahir' => $this->input->post('tanggalLahir'),
						'telegram' => $this->input->post('telegram'),
						'notifemail' => $this->input->post('notifEmail'),
						'notiftele' => $this->input->post('notifTele'),
						'foto' => $this->upload->data('file_name')
						);
						$session_data['foto'] = $data['foto'];
						$this->load->model('model_profile');
						$this->model_profile->update($data, $this->session->userdata('username'));
						$session_data['nama'] = $data['nama'];
						$this->session->set_userdata($session_data);
						redirect('profile');
					}
				}
				else
				{
					$data = array(
						'nama' => $this->input->post('nama'),
						'email' => $this->input->post('Email'),
						'tempat_lahir' => $this->input->post('tempatLahir'),
						'tanggal_lahir' => $this->input->post('tanggalLahir'),
						'telegram' => $this->input->post('telegram'),
						'notifemail' => $this->input->post('notifEmail'),
						'notiftele' => $this->input->post('notifTele')
						);
					$this->load->model('model_profile');
					$this->model_profile->update($data, $this->session->userdata('username'));
					$session_data['nama'] = $data['nama'];
					$this->session->set_userdata($session_data);
					redirect('profile');
				}
			}
        }
	}
	?>