<?php
  class PaymentReport_model extends CI_Model {
    public function __construct()
      {
          $this->load->database();
      }

      public function employeefetch()
      {      

        $this->db->select('emp_master.*'); 
        $this->db->from('emp_master');
        $query = $this->db->get();
        return $query->result();
          
      }

    //   public function get_report_data($fkempId = null, $startDate = null, $endDate = null) {
    //     $this->db->select('table_master.*, emp_master.EmpId, emp_master.userName, members_master.memberName');
    //     $this->db->join('emp_master', 'table_master.fkempId = emp_master.EmpId', 'left');
    //     $this->db->join('members_master', 'table_master.fkmemberId = members_master.memberId', 'left');
    //     $this->db->from('table_master');
    
        
    //     if ($fkempId) {
    //         $this->db->where('table_master.fkempId', $fkempId); 
    //     }
    //     if ($startDate && $endDate) {
    //         $this->db->where('table_master.Date >=', $startDate); 
    //         $this->db->where('table_master.Date <=', $endDate); 
    //     }
    
    //     $query = $this->db->get();
    
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     } else {
    //         return array(); 
    //     }
    // }
    
    public function get_report_data($fkempId = null, $startDate = null, $endDate = null) {
      $this->db->select('
          table_master.*, 
          emp_master_fk.userName AS fkempUserName, 
          emp_master_modified.userName AS modifiedByUserName, 
          members_master.memberName
      ');
  
      // Join for fkempId with emp_master (using alias emp_master_fk)
      $this->db->join('emp_master AS emp_master_fk', 'table_master.fkempId = emp_master_fk.EmpId', 'left');
  
      // Join for modified_by with emp_master (using alias emp_master_modified)
      $this->db->join('emp_master AS emp_master_modified', 'table_master.modified_by = emp_master_modified.EmpId', 'left');
  
      // Join for fkmemberId with members_master
      $this->db->join('members_master', 'table_master.fkmemberId = members_master.memberId', 'left');
  
      $this->db->from('table_master');
  
      // Filter only rows with modified_by > 0 (not 0 or NULL)
      $this->db->where('table_master.modified_by >', 0);
  
      // Apply filters if parameters are provided
      if ($fkempId) {
          $this->db->where('table_master.modified_by', $fkempId);
      }
  
      if ($startDate && $endDate) {
          $this->db->where('table_master.PaidDate >=', $startDate);
          $this->db->where('table_master.PaidDate <=', $endDate);
      } 
  
      $query = $this->db->get();
  
      if ($query->num_rows() > 0) {
          return $query->result();
      } else {
          return array(); // Return an empty array if no data is found
      }
  }
  
      
      
  }