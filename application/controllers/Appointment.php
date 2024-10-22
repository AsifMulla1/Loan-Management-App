
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {


	public function __construct()
	{		
		parent::__construct();	
		$this->load->model(['Appointment_model','Profile_model']);
		if($this->session->userdata('EmpId') == 0) {
			redirect('Login');
		}	
		
 
	}
	
	public function index()
	{ 
        $data['appoinment']=$this->Appointment_model->getallAppoiment();
		$data['data']=$this->Profile_model->getallpatientdata();
          // echo"<pre>";
		  //  print_r($data);
		$this->load->view('common/header',$data);
		$this->load->view('Appointment/AppointmentDetails_view',$data);
		$this->load->view('common/footer');

	}
    
    public function create()
	{ 
		$data['Member']=$this->Appointment_model->MemberNames();
		// $data['Expert']=$this->Appointment_model->ExpertNames();
		  
		$data['data']=$this->Profile_model->getallpatientdata();

		$this->load->view('common/header',$data);
		$this->load->view('Appointment/Appointment_view',$data);
		$this->load->view('common/footer');
        
	}
	
	// public function getFilteredAppointments() {

	// 	$appointmentDate = $this->input->get('appoinmentDate');
	// 	$week = $this->input->get('Week');
	// 	$this->load->model('Appointment_model');
	// 	$data['appointments'] = $this->Appointment_model->getFilteredAppointments($appointmentDate, $week);
	// 	echo json_encode($data['appointments']);
	// }
	
	public function checkIsActive() {
        $fkmemberId = $this->input->post('fkmemberId');
        
        $this->load->model('Appointment_model');
        $isActive = $this->Appointment_model->checkIsActiveStatus($fkmemberId);

        if ($isActive) {
            echo json_encode(['status' => 'active']);
        } else {
            echo json_encode(['status' => 'inactive']);
        }
    }



	function insertAppoinment(){
		
		$fkmemberId= $this->input->post('fkmemberId');
		$startDate= $this->input->post('startDate');
	    $LoanAmount= $this->input->post('LoanAmount');
		$FirstDeduction= $this->input->post('FirstDeduction');
		$Week= $this->input->post('Week');
		$Amount= $this->input->post('Amount');
		$DandRakkam= $this->input->post('DandRakkam');

		$fkmemberId= $this->input->post('fkmemberId');
		$Date= $this->input->post('Date');
		$HaptaAmount= $this->input->post('HaptaAmount');
		$dandRakkam= $this->input->post('dandRakkam');





		

	       	$fields=array(
	       	
	       	'fkmemberId'=>$fkmemberId,
	       	'startDate'=>$startDate,
   			'LoanAmount'=>$LoanAmount,
			'FirstDeduction'=>$FirstDeduction,
			'Week'=>$Week,
			'Amount'=>$Amount,
			'DandRakkam'=>$DandRakkam,
			
             

            'IsActive'=>1,
			'is_active'=>1,
			// 'created_by'=>$this->session->userdata('userId'),
			// 'created_by'=>1,
			'created_by'=>$this->session->userdata('EmpId'),
			'fkempId'=>$this->session->userdata('EmpId'),

			
			'created_date'=>date('Y-m-d H:i:s')
		);

         $getId =$this->Commonmodel->insertRecord("appoinment_master",$fields);
		//  print_r($getId);


		
		if ($getId > 0) { 
			if (!empty($HaptaAmount)) {
				for ($i = 0; $i < count($HaptaAmount); $i++) { 
					if ($HaptaAmount[$i] > 0) {
						// Convert date from dd-mm-yyyy to yyyy-mm-dd
						$standardDate = date('Y-m-d', strtotime(str_replace('/', '-', $Date[$i])));
		
						$insertkeys = array(
							'fkLoanId' => $getId,
							'fkmemberId' => $fkmemberId,
							'Date' => $standardDate, // Store in standard format
							'HaptaAmount' => $HaptaAmount[$i],
							'dandRakkam' => $dandRakkam[$i],
							// 'created_by' => 1,
			                'is_active'=>1,
			                'created_date'=>date('Y-m-d H:i:s'),
							'created_by'=>$this->session->userdata('EmpId'),
			                'fkempId'=>$this->session->userdata('EmpId'),


						);
						
						
						print_r($insertkeys);
		
						
						$this->Commonmodel->insertRecord("table_master", $insertkeys);
					}
				}
			}
		}
		

	       
	}


	    public function update()
	{
		$data['dataa']=$this->Brand_model->getallAppoinmentByid($this->uri->segment(3));
		// 	echo $this->uri->segment(3);
		// echo "<pre>";
		// 	print_r($data);
		 $this->load->view('common/header');
		$this->load->view('Appointment/Appointment_view',$data);
		$this->load->view('common/footer');
	}

	public function updateBrand()
	{
		$brandId=$this->input->post('brandId');
		$brandName= $this->input->post('brandName');
		$brandDescription= $this->input->post('brandDescription');
		
		
		$fields=array(
			'brandId'=>$brandId,
			'brandName'=>$brandName,
			'brandDescription'=>$brandDescription,
			'modified_date'=>date('Y-m-d H:i:s'),
			'modified_by'=>$this->session->userdata('userId'));
		$whereArray=array('brandId'=>$brandId);
// 		echo "<prev>";
// print_r($fields);
// print_r($whereArray);
		 $this->Commonmodel->updateRecord("brand_master",$fields,$whereArray);
		
      }


	
}
?>
