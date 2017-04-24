<?php

class LoginModel extends CI_Model
{
	
	public function select_users($data)
	{
		$row=$this->db->query("select * from users where username='".$data->username."' and role='".$data->mylist."'");
		//and password='".$data->password."'
		$row=$row->result();
		if($row!=null)
		{	
		  
		  $hash=$row[0]->password;
					
		
		  if(password_verify($data->password,$hash))
			{
				
				return $row;
			}
				
			else
			{
				
			   return false;
			}
		}
		else
			return false;
	}
	public function set_last_login($last_login,$username)
	{
		$this->db->query("update users set last_login='".$last_login."' where username='".$username."'");
	}	

	
}


