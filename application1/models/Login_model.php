<?php
class Login_model extends CI_Model {

    
  public function __construct()
  {
    $this->load->database();
  }

  public function login($mobileNo,$password)
		{
			$this->db->select('EmpId,mobileNo,password');
			$this->db->where('mobileNo',$mobileNo);
			$this->db->where('password',$password );
			$query=$this->db->get('emp_master');
				//echo "no of rows".$query->num_rows();
					if($query->num_rows()>0)
						{
							return $query->result();
						}
					else
						{
							return false;
						}
		}
     


}