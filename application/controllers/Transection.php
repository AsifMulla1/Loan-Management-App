
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transection extends CI_Controller {


	public function __construct()
	{		
		parent::__construct();	
		$this->load->model(['Transection_model','Profile_model']);
		if($this->session->userdata('EmpId') == 0) {
			redirect('Login');
		}	
		
 
	}
	
	public function virify()
	{ 
		  $data['data']=$this->Profile_model->getallpatientdata();
		  $data['Transectionverify']=$this->Transection_model->getallTransection();
    // echo"<pre>";
		  // print_r($data);
		 $this->load->view('common/header',$data);
		$this->load->view('Transection/Transection_verification',$data);
		$this->load->view('common/footer');

	}
    
    public function create()
	{ 
        $EmpId = $this->session->userdata('EmpId');

		  $data['data']=$this->Profile_model->getallpatientdata();
		  $data['Employee1']=$this->Transection_model->EmployeeNames1($EmpId);
		  $data['Employee2']=$this->Transection_model->EmployeeNames2();

		  
		 $this->load->view('common/header',$data);
		$this->load->view('Transection/Transection_view',$data);
		$this->load->view('common/footer');
        
	}


	function insertTransection(){
		
		$senderId= $this->input->post('senderId');
		$reciverId= $this->input->post('reciverId');
		$amount= $this->input->post('amount');
		$transectionDate= $this->input->post('transectionDate');
		$transectionDescription= $this->input->post('transectionDescription');
		


		

	       	$fields=array(
	       	
	       	'senderId'=>$senderId,
	       	'reciverId'=>$reciverId,
	       	'amount'=>$amount,
   			'transectionDate'=>$transectionDate,
			'transectionDescription'=>$transectionDescription,

			'Verify'=>0,
			'is_active'=>1,
			'created_by'=>1,
			'created_date'=>date('Y-m-d H:i:s')
		);
	  	  
		 $this->Commonmodel->insertRecord("transection_master",$fields);
		 // print_r($fields);
	}



	public function verifyTransaction()
{
    $transectionId = $this->input->post('transectionId');

    
    $this->db->set('Verify', 1);
    $this->db->where('transectionId', $transectionId);
    $this->db->update('transection_master');

    if ($this->db->affected_rows() > 0) {
        // Return success if the row is updated
        echo json_encode(['status' => 'success']);
    } else {
        // Return error if there is an issue
        echo json_encode(['status' => 'error']);
    }
}

	
	

	
	
}
?>
