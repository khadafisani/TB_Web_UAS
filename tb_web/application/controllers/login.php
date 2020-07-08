<?php
  
	defined('BASEPATH') OR exit('No direct script access allowed');
	
    class Login extends CI_Controller {
   
      public function __construct() 
	  { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url')); 
      } 
	
      public function index() 
	  {		
         /* Load form validation library */ 
         $this->load->library('form_validation');
			
		/* Validation rule */
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');	 
		
		/* Page Title */
		$title['judul'] = "Login";
		
         if ($this->form_validation->run() == FALSE) { 
            $this->load->view('head/head',$title);
			$this->load->view('content/login'); 
			$this->load->view('footer/footer');
         } 
         else 
		 {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('model_login');
			$result = $this->model_login->login($username,$password);
			if ($result)
			{
				foreach($result as $row)
				{				
					$session_data = array (
					'username' => $row->username,
					'nama' => $row->nama,
					'log_in' => TRUE,
					'foto' => $row->foto
					);
					$this->session->set_userdata($session_data);
					redirect('dashboard');
				}
			}
			else 
			{ 
				$msg = "The username or password you entered is incorrect.";
				$this->load->view('head/head',$title);
				$this->load->view('content/login', compact('msg'));
				$this->load->view('footer/footer');
			} 
		}
	} 
 }
?>