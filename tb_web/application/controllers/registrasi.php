<?php
  
  defined('BASEPATH') OR exit('No direct script access allowed');
  
   class Registrasi extends CI_Controller {
   
      public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
      } 
	
      public function index() 
	  {			
         /* Load form validation library */ 
         $this->load->library('form_validation');
			
		/* Validation rule */
		$this->form_validation->set_rules('inputUsername', 'Username', 'required|min_length[6]|max_length[30]|callback_check_customer');
		$this->form_validation->set_rules('inputPassword', 'Password', 'required|min_length[6]|max_length[100]');	 
		
		/* Page title */
		$title['judul'] = "Halaman Registrasi";
			
         if ($this->form_validation->run() == FALSE) 
		 { 
			$this->load->view('head/head',$title);
            $this->load->view('content/register');
			$this->load->view('footer/footer');
         } 
         else 
		 { 
			$data = array
			(
				"username" => $this->input->post('inputUsername'),
				"password" => $this->input->post('inputPassword'),
			);
            $this->load->model('model_registrasi');
		    $this->model_registrasi->saveUser($data);
		    $success = "Your account has been successfully created!";
			$this->load->view('head/head',$title);
            $this->load->view('content/register', compact('success'));
			$this->load->view('footer/footer');
         } 
      }
	  
	  public function check_customer($username)
	  {
			$data['username'] = $username;
			$this->load->model('model_registrasi');
			$x = $this->model_registrasi->selectData($data);
			if ($x > 0)
			{
				$this->form_validation->set_message('check_customer','Username telah terdaftar pada database, silahkan gunakan username lain');
		        return FALSE;
		    }
			else 
				return TRUE;
	  }
   }
?>