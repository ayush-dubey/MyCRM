<?php

class LoginModel extends CI_Model
{
	
	public function select_users($data)
	{
		$row=$this->db->query("select * from users where username='".$data->username."' and password='".$data->password."'");
		if($row)
			return $row;
		else
			return false;
	}
	

	
}

