<?php

class ClientModel extends CI_Model
{
	public function get_active_clients()
	{
		$result=$this->db->query("select * from client where active='yes' and status='converted'");		
		return $result=$result->result();
	
	}
	public function get_expired_clients()
	{
		$result=$this->db->query("select * from client where active='no' and status='converted'");		
		return $result=$result->result();
	
	}
	public function get_hold_clients()
	{
		$result=$this->db->query("select * from client where status='pending'");		
		return $result=$result->result();
	
	}
}	