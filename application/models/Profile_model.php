<?php
  class Profile_model extends CI_Model {
    public function __construct()
      {
          $this->load->database();
      }

        public function getallpatientdata()
  
  {
   $patient_id= $this->session->userdata('EmpId');
    $this->db->select('EmpId, userName, mobileNo, dateOfBirth,AttachFile');
    $this->db->from('emp_master');

    
    $this->db->where('emp_master.is_active','1');
    $this->db->where('emp_master.EmpId',$patient_id);
  
    // $this->db->order_by("emp_master.EmpId", "desc");
    $query = $this->db->get();
    return $query->result();
    
  }

   public function updateRecord($model)
    {
      return $sql=$this->db->where('EmpId',$model['EmpId'])
              ->update('emp_master',$model);

    } 
}

?>