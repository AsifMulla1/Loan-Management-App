<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppointmentReport extends CI_Controller {

	public function __construct() {		
		parent::__construct();	
		$this->load->model(['AppointmentReport_model', 'Profile_model']);
		if($this->session->userdata('EmpId') == 0) {
			redirect('Login');
		}	
	}
	  
    public function index() { 
		$data['data'] = $this->Profile_model->getallpatientdata();		  
		$this->load->view('common/header', $data);
		$this->load->view('Appointment/AppointmentReport_view', $data);
		$this->load->view('common/footer');
	}

    public function GetData() {
        // Retrieve data from POST request
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
    
        // Validate input data
        if (empty($startDate) || empty($endDate)) {
            echo json_encode([]); // Return empty array if dates are not provided
            return;
        }
    
        // Call model method to fetch data based on date range
        $data = $this->AppointmentReport_model->get_report_data($startDate, $endDate);
    
        // Return JSON-encoded data
        echo json_encode($data);
    }
}
