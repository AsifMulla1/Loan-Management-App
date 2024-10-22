
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	public function __construct()
	{		
		parent::__construct();	
		$this->load->model(['Profile_model']);
		if($this->session->userdata('EmpId') == 0) {
			redirect('Login');
		}	
		
 
	}
	
	public function index()
	{ 
		  $data['data']=$this->Profile_model->getallpatientdata();
     // echo"<pre>";
		   //  print_r($data);
		  $this->load->view('common/header',$data);
		 $this->load->view('Profile/profile_view',$data);
		 $this->load->view('common/footer');

	}

	 function photoupdate()
      {
      	$patient_id = $this->session->userdata('EmpId');
		 

		  $AttachFile="";
		   if($_FILES['image']['name']!='') {
			 $AttachFile=$this->upload_image();
		   }else{
			   $AttachFile=$this->input->post("hiddenphoto1");
		   }
		     $fields=array('EmpId'=>$patient_id,
		                
		                 
		                 'AttachFile'=>$AttachFile,
						 
			    'modified_date'=>date('Y-m-d H:i:s'),
	  	  	    'modified_by'=>1);
	  	 
		$dd=$this->Profile_model->updateRecord($fields);
        echo json_encode($dd);
      }

      
  function upload_image(){
        if(isset($_FILES["image"]))  
            {  	
                if($_FILES["image"]["name"] != '')  
                  { 
              $extension = explode('.', $_FILES['image']['name']);  
              $new_name = rand() . '.' . $extension[1];  
              $destination = './upload/' . $new_name;  
              move_uploaded_file($_FILES['image']['tmp_name'], $destination);  
              return $new_name;  
                }
             }
			}


}

?>