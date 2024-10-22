<?php
  class Registration_model extends CI_Model {
    public function __construct()
      {
          $this->load->database();
      }

        public function Gender()
    {
      $this->db->select("genderId,genderName");
      $this->db->from('gender_master');
      $this->db->where('is_active',1);
      $query = $this->db->get();
      return $query->result();
    }

    // function is_mobile_available($mobileNo)
    // {
    //   $this->db->where('mobileNo',$mobileNo);
    //   $query = $this->db->get('emp_master');

    //   if($query->num_rows() > 0)
    //   {
    //      return false;
    //   }
    //   else
    //   {
    //      return false;
    //   }
    // }
    

    public function chkExistData($mobileNo)
    {
      return $sql=$this->db->get_where('emp_master',['mobileNo'=>$mobileNo,'is_active'=>1])->num_rows();
    }
    
    public function CheckMobileNo($mobileNo) 
    {
      $this->db->select("mobileNo");
      $this->db->from('emp_master');
      $this->db->where('mobileNo',$mobileNo);
      $this->db->where('is_active',1);
      $query = $this->db->get();
      return $query->result();
    }
  }