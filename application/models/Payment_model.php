<?php
class Payment_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function Memberfetch()
    {
        $this->db->select('memberId, memberName'); // Adjust the fields as necessary
        $this->db->from('members_master');
        $query = $this->db->get();
        return $query->result();
    }


  
    // public function Reportdetails($fkmemberId)
    // {
    //     $this->db->select('table_master.*, members_master.memberId, members_master.memberName'); 
    //     $this->db->from('table_master');
    //     $this->db->join('members_master', 'table_master.fkmemberId = members_master.memberId', 'left');
    //     $this->db->where('table_master.is_active', '1');

    //     if ($fkmemberId > 0) {
    //         $this->db->where('table_master.fkLoanId', $fkmemberId);
    //     }

    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // public function Reportdetails($fkmemberId)
    // {
    //     $this->db->select('table_master.*'); 
    //     $this->db->from('table_master'); // Correct table name
    //     $this->db->where('table_master.is_active', '1');
    //     $this->db->where('table_master.fkmemberId', $fkmemberId);
    
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function Reportdetails($fkmemberId)
    {
        $this->db->select('table_master.*'); 
        $this->db->from('table_master');
        
       
        $this->db->join('appoinment_master', 'table_master.fkLoanId = appoinment_master.LoanActiveId', 'inner');
        
        
        $this->db->where('table_master.fkmemberId', $fkmemberId);
        // $this->db->where('table_master.is_active', '1');
        $this->db->where('appoinment_master.IsActive', '1'); 
        
        $query = $this->db->get();
        return $query->result();
    }
    
    
    


   /*********** Start Without use datele query update code ************/

   public function getRecordsByMemberId($fkmemberId)
   {
       $this->db->select('TableID');
       $this->db->from('table_master');
       $this->db->where('fkmemberId', $fkmemberId);
       $query = $this->db->get();
       return $query->result_array(); // Fetch records as an associative array
   }

   public function updateRecord($tableId, $data)
   {
       $this->db->where('TableID', $tableId);
       return $this->db->update('table_master', $data);
   }

   public function insertRecord($table, $data)
   {
       return $this->db->insert($table, $data);
   }

    /*********** End Without use datele query update code ************/
    public function updateAppointmentIsActive($loanActiveId, $data)
    {
        $this->db->where('LoanActiveId', $loanActiveId);
        return $this->db->update('appoinment_master', $data);
    }
    

   
}
?>
