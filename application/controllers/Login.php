<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
   public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        
        $this->load->model('Login_model');
    }
	
	public function index()
	{ 
		$this->load->view('login');
	}
	
	public function login_validation()
	{ 

		$mobileNo =  $this->input->post('mobileNo');
        $password =  $this->input->post('password');

        
        
        $data=$this->Login_model->login($mobileNo,$password);
       
        if(!empty($data))
					{
                      
						$newdata = array(
							
							'mobileNo'  => $mobileNo,
							'EmpId'     => $data[0]->EmpId
							
							// 'logged_in' => TRUE
						);//echo $data[0]->userId;
						$this->session->set_userdata($newdata);
						echo 1;
						
					}
					else
					{
						echo 2;
					}
	}
	   public function logout()
	{
		session_destroy();
		
        $this->load->view('login');
	}
	
}
