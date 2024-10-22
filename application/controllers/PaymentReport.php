
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentReport extends CI_Controller {


	public function __construct()
	{		
		parent::__construct();	
		$this->load->model(['PaymentReport_model','Profile_model']);
		if($this->session->userdata('EmpId') == 0) {
			redirect('Login');
		}	
		
 
	}
	  
    public function index()
	{ 
		  $data['data']=$this->Profile_model->getallpatientdata();
		  $data['employeenamereport']=$this->PaymentReport_model->employeefetch();
		  
		 $this->load->view('common/header',$data);
		$this->load->view('Payment/PaymentReport_view',$data);
		$this->load->view('common/footer');
        
	}

    public function GetData() {
        $fkempId = $this->input->post('fkempId');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
    
       
        if (empty($fkempId)) {
            $fkempId = null;
        }
        if (empty($startDate)) {
            $startDate = null;
        }
        if (empty($endDate)) {
            $endDate = null;
        }
    
        $data = $this->PaymentReport_model->get_report_data($fkempId, $startDate, $endDate);
    
        echo json_encode($data);  
    }
    
    


	
	
}
?>
