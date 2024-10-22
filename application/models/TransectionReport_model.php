<?php
  class TransectionReport_model extends CI_Model {
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

      public function get_report_data($senderId = null, $startDate = null, $endDate = null) {
        
        $this->db->select('transection_master.*, sender.EmpId as senderId, sender.userName as senderName, receiver.EmpId as receiverId, receiver.userName as receiverName');
        
        $this->db->join('emp_master as sender', 'transection_master.senderId = sender.EmpId', 'left');
        
        $this->db->join('emp_master as receiver', 'transection_master.reciverId = receiver.EmpId', 'left');
        
        $this->db->from('transection_master');

        $this->db->where('transection_master.Verify', 1);
        
        if ($senderId) {
            $this->db->group_start()
                     ->where('transection_master.senderId', $senderId) 
                     ->or_where('transection_master.reciverId', $senderId) 
                     ->group_end();  
        }

        if ($startDate && $endDate) {
            $this->db->where('transection_master.transectionDate >=', $startDate); 
            $this->db->where('transection_master.transectionDate <=', $endDate); 
        }
    
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); 
        }
    }
    
    
   
  
  
      
      
  }