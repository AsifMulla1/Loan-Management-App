<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		 $this->load->model(['Profile_model']);
		if($this->session->userdata('EmpId') == 0) {
			redirect('Login');
		}
	}
	
	public function index()
	{ 
		 $data['data']=$this->Profile_model->getallpatientdata();
		 
		  $this->load->view('common/header',$data);
		$this->load->view('Home/home');
		  $this->load->view('common/footer');

	}

	
}
?>
