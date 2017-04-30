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
	public function get_all_clients()
	{
		$result=$this->db->query("select * from client where status='converted'");		
		return $result=$result->result();
	
	}
	
	public function get_active_clients_for_emp()
	{
		$sesVal=$this->session->userdata('my_session');
		$employee_id=$sesVal['employee_id'];
		$result=$this->db->query("select * from lead_assigned_to,client where lead_id=client_id and active='yes' and status='converted' and employee_id=".$employee_id);		
		return $result=$result->result();
	
	}
	
	public function get_expired_clients_for_emp()
	{
		$sesVal=$this->session->userdata('my_session');
		$employee_id=$sesVal['employee_id'];
		$result=$this->db->query("select * from lead_assigned_to,client where lead_id=client_id and active='no' and status='converted' and employee_id=".$employee_id);	
		return $result=$result->result();
	
	}
	public function get_all_clients_for_emp()
	{
		$sesVal=$this->session->userdata('my_session');
		$employee_id=$sesVal['employee_id'];
		$result=$this->db->query("select * from lead_assigned_to,client where lead_id=client_id and status='converted' and employee_id=".$employee_id);		
		return $result=$result->result();
	
	}
}	