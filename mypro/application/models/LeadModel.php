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
	public function edit($data)
	{
		$row=$this->db->query("select * from client where client_id=".$data->client_id);
		return $row;
	}
	public function update_leads($data)
	{
		$row=$this->db->query("update client set first_name='".$data->first_name."', last_name='".$data->last_name."',
		middle_name='".$data->middle_name."' , mobile='".$data->mobile."',
		address='".$data->address."', email='".$data->email."', status='".$data->status."', follow_up_date='".$data->follow_up_date."' where client_id=".$data->client_id);
	
	    return $row;
	}
	
	public function delete_leads($data)
	{
		$row=$this->db->query("select * from client where client_id=".$data->client_id);
		$row=$row->result();
		$this->db->insert('disposed_leads',$row[0]);
		$this->db->query("delete from client where client_id=".$data->client_id);
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
}