
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransectionReport extends CI_Controller {


	public function __construct()
	{		
		parent::__construct();	
		$this->load->model(['TransectionReport_model','Profile_model']);
		if($this->session->userdata('EmpId') == 0) {
			redirect('Login');
		}	
		
 
	}
	  
    public function index()
	{ 
		  $data['data']=$this->Profile_model->getallpatientdata();
		  $data['employeenamereport']=$this->TransectionReport_model->employeefetch();
		  
		 $this->load->view('common/header',$data);
		$this->load->view('Transection/TransectionReport_view',$data);
		$this->load->view('common/footer');
        
	}

    public function GetData() {
        $senderId = $this->input->post('senderId');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
    
       
        if (empty($senderId)) {
            $senderId = null;
        }
        if (empty($startDate)) {
            $startDate = null;
        }
        if (empty($endDate)) {
            $endDate = null;
        }
    
        $data = $this->TransectionReport_model->get_report_data($senderId, $startDate, $endDate);
    
        echo json_encode($data);  
    }
    
    


	
	
}
?>
