<?php
  class Transection_model extends CI_Model {
    public function __construct()
      {
          $this->load->database();
      }
    public function getallTransection()
  
    {
     
      $App_id= $this->session->userdata('EmpId');

      $this->db->select('transection_master.transectionId, transection_master.senderId,sender.userName AS senderName, transection_master.reciverId, receiver.userName AS receiverName, transection_master.amount, transection_master.transectionDate,transection_master.transectionDescription,transection_master.	Verify,');
      $this->db->from('transection_master');

       // Join emp_master for sender information with alias 'sender'
      $this->db->join('emp_master AS sender', 'transection_master.senderId = sender.EmpId', 'left');
    
      // Join emp_master for receiver information with alias 'receiver'
      $this->db->join('emp_master AS receiver', 'transection_master.reciverId = receiver.EmpId', 'left');

 
      $this->db->where('transection_master.is_active','1');
        $this->db->where('(transection_master.reciverId = ' . $App_id . ' OR transection_master.senderId = ' . $App_id . ')');
      $this->db->order_by("transection_master.transectionId", "asc");
      $query = $this->db->get();
      return $query->result();
          
    }

    public function EmployeeNames1($EmpId)
    {
      $this->db->select("EmpId ,userName");
      $this->db->from('emp_master');
      $this->db->where('EmpId', $EmpId);
      $this->db->where('is_active',1);
      $query = $this->db->get();
      return $query->row();
    }


    public function EmployeeNames2()
    {
      $this->db->select("EmpId ,userName");
      $this->db->from('emp_master');
      $this->db->where('is_active',1);
      $query = $this->db->get();
      return $query->result();
    }


    // verification code for transection_verification detaile page
    public function verifyTransaction($transectionId)
    {
      $this->db->set('Verify', 1);
      $this->db->where('transectionId', $transectionId);
      return $this->db->update('transection_master');
    }

    
  }    