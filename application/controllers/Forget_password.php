<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget_password extends CI_Controller {

	
	public function index()
	{ 
		
		 // $this->load->view('common/header');
		$this->load->view('Forget_password/forget_password');
		 // $this->load->view('common/footer');

	}

	
}
?>
