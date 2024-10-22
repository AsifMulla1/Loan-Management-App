<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenddingReport extends CI_Controller {

    public function __construct() {		
        parent::__construct();	
        $this->load->model(['PenddingReport_model', 'Profile_model']);
        if ($this->session->userdata('EmpId') == 0) {
            redirect('Login');
        }
    }
	  
    public function index() { 
        $data['data'] = $this->Profile_model->getallpatientdata();
        $data['employeenamereport'] = $this->PenddingReport_model->employeefetch();
		  
        $this->load->view('common/header', $data);
        $this->load->view('Payment/PenddingReport_view', $data);
        $this->load->view('common/footer');
    }

    public function GetData() {
        $fkmemberId = $this->input->post('fkmemberId');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
    
        // Ensure proper handling of null values
        $fkmemberId = !empty($fkmemberId) ? $fkmemberId : null;
        $startDate = !empty($startDate) ? $startDate : null;
        $endDate = !empty($endDate) ? $endDate : null;
    
        // Fetch report data using PenddingReport_model
        $data = $this->PenddingReport_model->get_report_data($fkmemberId, $startDate, $endDate);
    
        // Return the data in JSON format
        echo json_encode($data);  
    }
}
?>
