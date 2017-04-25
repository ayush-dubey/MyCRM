<?php

class LeadModel extends CI_Model
{
	
	public function insert_users($data)
	{			 
		     $this->db->query("insert into client(first_name,middle_name,last_name,email,mobile,address,gender) values('".$data->first_name."','".$data->middle_name."','".$data->last_name."','".$data->email."','".$data->mobile."','".$data->address."','".$data->gender."')");	 
	}
	
}