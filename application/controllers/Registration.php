
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {


	public function __construct()
	{		
		parent::__construct();	
		$this->load->model(['Registration_model']);	
		
 
	}
	
	public function index()
	{ 
		 $data['Gender']=$this->Registration_model->Gender();
		 // $this->load->view('common/header');
		$this->load->view('Registration/registration_view', $data);
		 // $this->load->view('common/footer');

	}

	public function CheckMobileNo(){
		$mobileNo = $this->input->post('mobileNo');
		$data = $this->Registration_model->CheckMobileNo($mobileNo);
		 print_r(json_encode($data));
		
	}

	 public function checkuserexist()
   {
    $mobileNo=$this->input->post('mobileNo');
    $count=$this->Registration_model->chkExistData($mobileNo);
    if($count>0)
    {
      echo 1;
    }
    else
    {
      echo 0;
    }
    // print_r($count);
    
  }



	function insertPatient(){
		
		$userName= $this->input->post('userName');
		
		$mobileNo= $this->input->post('mobileNo');
		$email= $this->input->post('email');
		$password= $this->input->post('password');
		$fkgenderId= $this->input->post('fkgenderId');
		$dateOfBirth= $this->input->post('dateOfBirth');
		

	       	$fields=array(
	       	
	       	'userName'=>$userName,
	       	 'mobileNo'=>$mobileNo,
   			   'email'=>$email,
   			   'password'=>$password,
   			    'fkgenderId'=>$fkgenderId,
			'dateOfBirth'=>$dateOfBirth,
			'is_active'=>1,
			// 'created_by'=>$this->session->userdata('userId'),
			'created_by'=>1,
			'created_date'=>date('Y-m-d H:i:s')
		);
	  	  
		 $this->Commonmodel->insertRecord("emp_master",$fields);
		 // print_r($fields);
	       }

	
}
?>
