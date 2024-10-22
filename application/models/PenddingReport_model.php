<?php
  class PenddingReport_model extends CI_Model {
    public function __construct()
      {
          $this->load->database();
      }

      public function employeefetch()
      {      

        $this->db->select(' members_master.*'); 
        $this->db->from(' members_master');
        $query = $this->db->get();
        return $query->result();
          
      }
    
   
      public function get_report_data($fkmemberId = null, $startDate = null, $endDate = null) {
        $this->db->select('table_master.*, emp_master.EmpId, emp_master.userName, members_master.memberName');
        $this->db->join('emp_master', 'table_master.fkempId = emp_master.EmpId', 'left');
        $this->db->join('members_master', 'table_master.fkmemberId = members_master.memberId', 'left');
        $this->db->from('table_master');
        
        // Add condition to filter rows where PaidHaptaAmount is 0 or NULL
        $this->db->group_start();
        $this->db->where('table_master.PaidHaptaAmount =', '0');
        $this->db->or_where('table_master.PaidHaptaAmount IS NULL');
        $this->db->group_end();
        
        if ($fkmemberId) {
            $this->db->where('table_master.fkmemberId', $fkmemberId); 
        }
        if ($startDate && $endDate) {
            $this->db->where('table_master.Date >=', $startDate); 
            $this->db->where('table_master.Date <=', $endDate); 
        }
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }
    
  
      
      
  }