<?php
  class AppointmentReport_model extends CI_Model {
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

      public function get_report_data($fkempId = null, $startDate = null, $endDate = null) {
        
        $this->db->select('appoinment_master.*, emp_master.userName, members_master.memberName');
        $this->db->join('emp_master', 'appoinment_master.fkempId = emp_master.EmpId', 'left');
        $this->db->join('members_master', 'appoinment_master.fkmemberId = members_master.memberId', 'left');
        $this->db->from('appoinment_master');

        if ($fkempId) {
          $this->db->where('appoinment_master.fkempId', $fkempId);
        }
        if ($startDate && $endDate) {
            $this->db->where('appoinment_master.startDate >=', $startDate);
            $this->db->where('appoinment_master.startDate <=', $endDate);
        }
        $this->db->where('appoinment_master.LoanActiveId IS NOT NULL', NULL, FALSE);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
  
      
      
  }