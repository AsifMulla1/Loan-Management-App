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
        $data['employeenamereport']=$this->AppointmentReport_model->employeefetch();

		$this->load->view('common/header', $data);
		$this->load->view('Appointment/AppointmentReport_view', $data);
		$this->load->view('common/footer');
	}

    public function GetData() {
        // Retrieve data from POST request
        $fkempId = $this->input->post('fkempId'); 
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
    
       
        if (empty($startDate) || empty($endDate)) {
            echo json_encode([]); 
            return;
        }

        $data = $this->AppointmentReport_model->get_report_data($fkempId, $startDate, $endDate);
        echo json_encode($data);
    }
    
}
