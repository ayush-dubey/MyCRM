<?php

class LeadModel extends CI_Model
{
	
	public function insert_users($data)
	{			 
		     $this->db->query("insert into client(first_name,middle_name,last_name,email,mobile,address,gender) values('".$data->first_name."','".$data->middle_name."','".$data->last_name."','".$data->email."','".$data->mobile."','".$data->address."','".$data->gender."')");	 
	}
	function get_leads() {
        $this->db->select('*');
        $this->db->from('client');
        $query = $this->db->get();
        return $result = $query->result();
    }
	
	public function get_disposed_leads()
	{
		$this->db->select('*');
        $this->db->from('disposed_leads');
        $query = $this->db->get();
        return $result = $query->result();
	}
	public function edit($data)
	{
		$row=$this->db->query("select * from client where client_id=".$data->client_id);
		return $row;
	}
	public function edit_disposed_leads($data)
	{
		$row=$this->db->query("select * from disposed_leads where client_id=".$data->client_id);
		return $row;
	}
	public function update_leads($data,$date_today)
	{
		
		$this->db->query("update client set first_name='".$data->first_name."', last_name='".$data->last_name."',
		middle_name='".$data->middle_name."' , mobile='".$data->mobile."',
		address='".$data->address."', email='".$data->email."', status='".$data->status."', follow_up_date='".$data->follow_up_date."' where client_id=".$data->client_id);
		//For comments table
		
			$row1=$this->session->userdata('my_session');	
		$this->db->query("insert into comment_history(client_id,employee_id,date,comment) 
		values('".$data->client_id."','".$row1['employee_id']."','".$date_today."','".$data->comment."')");

	    
	}
	
	public function delete_leads($data)
	{
		$row=$this->db->query("select * from client where client_id=".$data->client_id);
		$row=$row->result();
		$this->db->insert('disposed_leads',$row[0]);
		$this->db->query("delete from client where client_id=".$data->client_id);
	}
	public function delete_disposed_leads($data)
	{
		
		$this->db->query("delete from disposed_leads where client_id=".$data->client_id);
	
	}
	public function get_leads_by_date($data)
	{
		$result=$this->db->query("select * from client where follow_up_date='".$data."'");		
		return $result=$result->result();
	}
	public function get_leads_by_status($status)
	{
		$result=$this->db->query("select * from client where status='".$status."'");		
		return $result=$result->result();
	}
	public function get_leads_by_status_date($status,$follow_up_date)
	{
		$result=$this->db->query("select * from client where status='".$status."' and follow_up_date='".$follow_up_date."'");		
		return $result=$result->result();
	
	}
	public function get_active_leads()
	{
		$result=$this->db->query("select * from client where status='converted'");		
		return $result=$result->result();
	
	}
	public function get_expired_leads()
	{
		$result=$this->db->query("select * from client where status='rejected'");		
		return $result=$result->result();
	
	}
	public function get_hold_leads()
	{
		$result=$this->db->query("select * from client where status='pending'");		
		return $result=$result->result();
	
	}
	public function get_todays_followup()
	{
		date_default_timezone_set("Asia/Kolkata");
		$date_today= date("Y-m-d");
			
		$result=$this->db->query("select * from client where follow_up_date='".$date_today."'");		
		return $result=$result->result();
	
	}
}