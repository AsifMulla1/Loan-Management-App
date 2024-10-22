<?php
  class Member_model extends CI_Model {
    public function __construct()
      {
          $this->load->database();
      }

        public function getallMember()
  
  {
    $patient_id= $this->session->userdata('EmpId');
    $this->db->select('memberId, memberName, mobileNo,wtsAppNo,Address ,dateOfBirth,adharNo,Nondani');
    $this->db->from('members_master');

    // $this->db->join('gender_master','members_master.fkgenderId  = gender_master.genderId','left');

    
      
    $this->db->where('members_master.is_active','1');
    $this->db->where('members_master.fkempId',$patient_id);
  
    $this->db->order_by("members_master.memberId", "asc");
    $query = $this->db->get();
    return $query->result();
    
  }


    //     public function Gender()
    // {
    //   $this->db->select("genderId,genderName");
    //   $this->db->from('gender_master');
    //   $this->db->where('is_active',1);
    //   $query = $this->db->get();
    //   return $query->result();
    // }
    
    public function getallMemberByid($memberId)
    {   
      $this->db->select('memberId,fkempId,memberName,mobileNo,wtsAppNo,Address,dateOfBirth,adharNo,Nondani');
      $this->db->from('members_master');
      $this->db->where('members_master.memberId',$memberId);
      $this->db->where('members_master.is_active','1');
      $query = $this->db->get();
      return $query->result();
  
    }

  }