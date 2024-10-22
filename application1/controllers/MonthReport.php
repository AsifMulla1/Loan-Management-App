
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MonthReport extends CI_Controller {


	public function __construct()
	{		
		parent::__construct();	
		$this->load->model(['MonthReport_model','Profile_model']);
		if($this->session->userdata('EmpId') == 0) {
			redirect('Login');
		}	
		
 
	}
	  
    public function index()
	{ 
		  $data['data']=$this->Profile_model->getallpatientdata();
		  $data['employeenamereport']=$this->MonthReport_model->employeefetch();
		  
		 $this->load->view('common/header',$data);
		$this->load->view('Payment/MonthReport_view',$data);
		$this->load->view('common/footer');
        
	}

    public function GetData() {
        $fkempId = $this->input->post('fkempId');
        $startDate = $this->input->post('startDate');
    
        if (empty($fkempId)) {
            $fkempId = null;
        }
        if (empty($startDate)) {
            $startDate = null;
        }
    
        $data = $this->MonthReport_model->get_report_data($fkempId, $startDate);
    
        echo json_encode($data);  
    }
    
    
    


	
	
}
?>
