<?php

class SignupModel extends CI_Model
{
	public function check($data)
	{
		
		 $row=$this->db->query("select username from users where username='".$data."'");
		 return $row;
			 
	          
		 
	}
	public function insert_users($data)
	{			 
		     $this->db->query("insert into users(username,password,role,first_name,middle_name,last_name,dob,doj,gender,father_name,email,mobile,address) values('".$data->username."','".$data->password."','".$data->role."','".$data->first_name."','".$data->middle_name."','".$data->last_name."','".$data->dob."','".$data->doj."','".$data->gender."','".$data->father_name."','".$data->email."','".$data->mobile."','".$data->address."')");	 
	}
	
}