
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {


	public function __construct()
	{		
		parent::__construct();
        // $this->load->model('Payment_model');
        $this->load->model(['Payment_model','Profile_model']);	
		
 
	}
	

    
    public function create()
	{ 
		$data['membernamereport']=$this->Payment_model->Memberfetch();
		// $data['Expert']=$this->Appointment_model->ExpertNames();
		  
		$data['data']=$this->Profile_model->getallpatientdata();
		$this->load->view('common/header',$data);
		$this->load->view('Payment/Payment_view',$data);
		$this->load->view('common/footer');
        
	}

    public function GetData()
    {
        $fkmemberId = $this->input->post('fkmemberId');

		$data = $this->Payment_model->Reportdetails($fkmemberId);
            echo json_encode($data);
    }


	/********** Start Important code jo view me table show hota ha usmeke jo input hai use update
	 *  karne ka code using delete query lekin table ke primary key remove hoke update hoti hai*************/


	// public function UpdatePayment()
	// 	 {
	// 		 $fkmemberId= $this->input->post('fkmemberId');
	// 		 $fkLoanId= $this->input->post('fkLoanId');                                                                                                                      
	// 		 $Date= $this->input->post('Date');
	// 		 $HaptaAmount= $this->input->post('HaptaAmount');
	// 		 $dandRakkam= $this->input->post('dandRakkam');
	// 		 $PaidDate= $this->input->post('PaidDate');
	// 		 $PaidHaptaAmount= $this->input->post('PaidHaptaAmount');
	// 		 $PaidDandAmount= $this->input->post('PaidDandAmount');                                                                                                                      

	// 		 if ($fkmemberId >0) {
			
	// 		$whereArray=array('fkmemberId'=>$fkmemberId);
	// 		$this->Commonmodel->deleteRecord('table_master',$whereArray);


	// 		if (!empty($Date)) {
	// 			for ($i=0; $i <count($Date); $i++) { 
					
	// 				$fieldsItem=array(
	// 					'fkmemberId' =>$fkmemberId,
	// 					'fkLoanId' =>$fkLoanId[$i],
	// 					'Date' =>$Date[$i],
    //                     'HaptaAmount' =>$HaptaAmount[$i],
    //                   	'dandRakkam' =>$dandRakkam[$i],
    //                   	'PaidDate' =>$PaidDate[$i],
    //                     'PaidHaptaAmount' =>$PaidHaptaAmount[$i],
    //                   	'PaidDandAmount' =>$PaidDandAmount[$i],



	// 					'created_date'=>date('Y-m-d H:i:s'),
	// 					'created_by'=>1,
	// 				);
					
	// 				// echo "<pre>";
	// 				print_r($fieldsItem);

	// 				$this->Commonmodel->insertRecord("table_master",$fieldsItem);

	// 			}
	// 		}      }  }

	/********** End Important code jo view me table show hota ha usmeke jo input hai use update karne ka code using delete query *************/

    public function UpdatePayment()
    {
        $fkempId = $this->input->post('fkempId');
        $fkmemberId = $this->input->post('fkmemberId');
        $fkLoanId = $this->input->post('fkLoanId');                                                                                                                      
        $Date = $this->input->post('Date');
        $HaptaAmount = $this->input->post('HaptaAmount');
        $dandRakkam = $this->input->post('dandRakkam');
        $PaidDate = $this->input->post('PaidDate');
        $PaidHaptaAmount = $this->input->post('PaidHaptaAmount');
        $PaidDandAmount = $this->input->post('PaidDandAmount'); 
        $IsActive = $this->input->post('IsActive');                                                                                                                      
    
        if ($fkmemberId > 0) {
            // Fetch existing records for the given fkmemberId
            $existingRecords = $this->Payment_model->getRecordsByMemberId($fkmemberId);
    
            // Create a list of existing TableIDs for update
            $existingTableIds = array_column($existingRecords, 'TableID');
    
            if (!empty($Date)) {
                for ($i = 0; $i < count($Date); $i++) {
                    $fieldsItem = array(
                        'fkmemberId' => $fkmemberId,
                        'fkLoanId' => $fkLoanId[$i],
                        'Date' => $Date[$i],
                        'HaptaAmount' => $HaptaAmount[$i],
                        'dandRakkam' => $dandRakkam[$i],
                        'PaidDate' => $PaidDate[$i],
                        'PaidHaptaAmount' => $PaidHaptaAmount[$i],
                        'PaidDandAmount' => $PaidDandAmount[$i],
                        // 'IsActive' => $IsActive[$i],
                        'is_active' => 1,
                        'modified_date' => date('Y-m-d H:i:s'),
                        'modified_by' => $fkempId[$i],
                    );
    
                    if (isset($existingTableIds[$i])) {
                        // Update existing record
                        $this->Payment_model->updateRecord($existingTableIds[$i], $fieldsItem);
                    } else {
                        // Insert new record
                        $this->Payment_model->insertRecord("table_master", $fieldsItem);
                    }
                }
            }
    
            // Update IsActive field in appoinment_master table
            $updateData = array(
                'IsActive' => $IsActive  // or the desired value
            );
    
            // Assuming you want to update based on LoanActiveId, not fkmemberId
            foreach ($fkLoanId as $loanId) {
                $this->Payment_model->updateAppointmentIsActive($loanId, $updateData);
            }
        }
    }
    
	
}
?>
