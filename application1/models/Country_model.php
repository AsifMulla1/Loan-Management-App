<?php
  class Country_model extends CI_Model {
    public function __construct()
      {
          $this->load->database();
      }
  
     public function getallcountry()
     {      
      
             $this->db->select('country_master.countryId,country_master.countryName,country_master.countryCode');
             $this->db->from('country_master');
             $this->db->where('country_master.is_active','1');
             $this->db->order_by("country_master.countryId", "desc"); 
              $query = $this->db->get();
              return $query->result();
             
     }
     public function getcountryByid($countryId)
     {   
             $this->db->select('country_master.countryId,country_master.countryName,country_master.countryCode');
             $this->db->from('country_master');
            $this->db->where('country_master.countryId',$countryId);
              $query = $this->db->get();
              return $query->result();
             
     }
      
      
}