<?php
class Excel_data_insert_model extends CI_Model {
 
    public function  __construct() {
        parent::__construct();
        
    }
	
public function Add_User($data)
	{
		$this->db->query("insert into leads(first_name,middle_name,last_name,gender,email,mobile,address,profession) 
		values('".$data->FirstName."','".$data->MiddleName."','".$data->LastName."','".$data->Gender."','".$data->Email."',
		'".$data->Mobile."','".$data->Address."','".$data->Profession."')");
   }
	
}
 
