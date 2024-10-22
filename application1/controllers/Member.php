
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {


	public function __construct()
	{		
		parent::__construct();	
		$this->load->model(['Member_model','Profile_model']);
		if($this->session->userdata('EmpId') == 0) {
			redirect('Login');
		}	
		
 
	}
	
	public function index()
	{ 
		  $data['data']=$this->Profile_model->getallpatientdata();
		  $data['member']=$this->Member_model->getallMember();
    // echo"<pre>";
		  // print_r($data);
		 $this->load->view('common/header',$data);
		$this->load->view('Member/memberDetails_view',$data);
		$this->load->view('common/footer');

	}
    
    public function create()
	{ 
		  $data['data']=$this->Profile_model->getallpatientdata();
		//   $data['Gender']=$this->Member_model->Gender();
		  
		 $this->load->view('common/header',$data);
		$this->load->view('Member/member_view',$data);
		$this->load->view('common/footer');
        
	}


	function insertMember(){
		
		$memberName= $this->input->post('memberName');
		$mobileNo= $this->input->post('mobileNo');
		$wtsAppNo= $this->input->post('wtsAppNo');
		$Address= $this->input->post('Address');
		$dateOfBirth= $this->input->post('dateOfBirth');
		$adharNo= $this->input->post('adharNo');
        $Nondani= $this->input->post('Nondani');


		

	       	$fields=array(
	       	
	       	'memberName'=>$memberName,
	       	'mobileNo'=>$mobileNo,
	       	'wtsAppNo'=>$wtsAppNo,
   			'Address'=>$Address,
			'dateOfBirth'=>$dateOfBirth,
			'adharNo'=>$adharNo,
			'Nondani'=>$Nondani,

			'is_active'=>1,
			 'created_by'=>$this->session->userdata('EmpId'),
			  'fkempId'=>$this->session->userdata('EmpId'),
			// 'created_by'=>1,
			'created_date'=>date('Y-m-d H:i:s')
		);
	  	  
		 $this->Commonmodel->insertRecord("members_master",$fields);
		 // print_r($fields);
	}
	
	public function update()
	{
		$data['member']=$this->Member_model->getallMemberByid($this->uri->segment(3));
		$data['data']=$this->Profile_model->getallpatientdata();

		// 	echo $this->uri->segment(3);
		// echo "<pre>";
		// 	print_r($data);
		 $this->load->view('common/header',$data);
		$this->load->view('Member/member_view',$data);
		$this->load->view('common/footer');
	}

	public function updateMember()
	{
		$memberId=$this->input->post('memberId');
		$memberName= $this->input->post('memberName');
		$mobileNo= $this->input->post('mobileNo');
		$wtsAppNo= $this->input->post('wtsAppNo');
		$Address= $this->input->post('Address');
		$dateOfBirth= $this->input->post('dateOfBirth');
		$adharNo= $this->input->post('adharNo');
        $Nondani= $this->input->post('Nondani');
		
		
		$fields=array(
			'memberId'=>$memberId,
			'memberName'=>$memberName,
			'mobileNo'=>$mobileNo,
			'wtsAppNo'=>$wtsAppNo,
			'Address'=>$Address,
			'dateOfBirth'=>$dateOfBirth,
			'adharNo'=>$adharNo,
			'Nondani'=>$Nondani,

			'modified_date'=>date('Y-m-d H:i:s'),
			// 'modified_by'=>$this->session->userdata('userId')
		);
		$whereArray=array('memberId'=>$memberId);
            // echo "<prev>";
            // print_r($fields);
            // print_r($whereArray);
		 $this->Commonmodel->updateRecord("members_master",$fields,$whereArray);
		
      }
	
}
?>
