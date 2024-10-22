<?php
  class AppointmentReport_model extends CI_Model {
    public function __construct()
      {
          $this->load->database();
      }

    

      public function get_report_data($startDate = null, $endDate = null) {
        // Select all fields from appoinment_master and additional fields from joined tables
        $this->db->select('appoinment_master.*, emp_master.userName, members_master.memberName');
        
        // Join emp_master table with appoinment_master based on fkempId
        $this->db->join('emp_master', 'appoinment_master.fkempId = emp_master.EmpId', 'left');
        
        // Join members_master table with appoinment_master based on fkmemberId
        $this->db->join('members_master', 'appoinment_master.fkmemberId = members_master.memberId', 'left');
        
        // Define the base table
        $this->db->from('appoinment_master');
        
        // Ensure that both dates are provided
        if ($startDate && $endDate) {
            $this->db->where('appoinment_master.startDate >=', $startDate);
            $this->db->where('appoinment_master.startDate <=', $endDate);
        }
    
        // Ensure that LoanActiveId is not null
        $this->db->where('appoinment_master.LoanActiveId IS NOT NULL', NULL, FALSE);
        
        // Run the query
        $query = $this->db->get();
        
        // Return query result
        return $query->result();
    }
    
    
    
  
      
      
  }