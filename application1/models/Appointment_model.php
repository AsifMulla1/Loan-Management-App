<?php
  class Appointment_model extends CI_Model {
    public function __construct()
      {
          $this->load->database();
      }
    public function getallAppoiment()
  
    {
      $App_id= $this->session->userdata('EmpId');
      $this->db->select('appoinment_master.LoanActiveId,members_master.memberName, appoinment_master.startDate, appoinment_master.LoanAmount, appoinment_master.	FirstDeduction, appoinment_master.Week,appoinment_master.Amount,appoinment_master.DandRakkam,appoinment_master.IsActive');
      $this->db->from('appoinment_master');
 
      $this->db->join('members_master','appoinment_master.fkmemberId  = members_master.memberId','left');
     
      // $this->db->join('employee_master','appoinment_master.fkemployeeId  = employee_master.employeeId','left');
  
      $this->db->where('appoinment_master.is_active','1');
      $this->db->where('appoinment_master.fkempId',$App_id);
 
      $this->db->order_by("appoinment_master.LoanActiveId", "asc");
      $query = $this->db->get();
      return $query->result();
          
    }
       
    public function checkIsActiveStatus($fkmemberId) {
     
      $this->db->select('IsActive');
      $this->db->from('appoinment_master');
      $this->db->where('fkmemberId', $fkmemberId);
      $this->db->where('IsActive', 1);
  
      $query = $this->db->get();
  
      // Return true if there is at least one active loan, otherwise false
      return ($query->num_rows() > 0);
    }

    public function MemberNames()
    {
      //  $patient_id= $this->session->userdata('patientId');
      $this->db->select("memberId,memberName");
      $this->db->from('members_master');
      // $this->db->where('members_master.fkempId',$patient_id);
      $this->db->where('is_active',1);
      $query = $this->db->get();
      return $query->result();
    }

    public function ExpertNames()
    {
      $this->db->select("employeeId,employeeName");
      $this->db->from('employee_master');
      $this->db->where('is_active',1);
      $query = $this->db->get();
      return $query->result();
    }

    public function getallAppoinmentByid($brandId)
    {   
   
      $this->db->select('brandId,brandName,brandDescription');
      $this->db->from('brand_master');
      $this->db->where('brand_master.brandId',$brandId);
      $this->db->where('brand_master.is_active','1');
      $query = $this->db->get();
      return $query->result();

    }

  // public function getFilteredAppointments($appointmentDate, $week) {
  //   $this->db->select('appoinmentDate, Week');
  //   $this->db->from('appoinment_master');
  //   $this->db->where('appoinmentDate', $appointmentDate);
  //   $this->db->where('Week', $week);
  //   $this->db->where('is_active', 1);

  //   $query = $this->db->get();
  //   return $query->result();
  // }

  


  }