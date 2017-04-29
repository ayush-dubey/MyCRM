<?php

class EmployeeModel extends CI_Model
{
	
	
	public function get_emp_leads()
	{
		$row1=$this->session->userdata('my_session');	
		$result=$this->db->query("select client.first_name,client.status,client.middle_name,client.last_name,
		gender,email,address,profession,client.mobile,client.client_id,follow_up_date from 
		lead_assigned_to,client where client.client_id=lead_assigned_to.lead_id and 
		lead_assigned_to.employee_id=".$row1['employee_id'] );
        $result=$result->result();
		return $result;
    }
	public function get_todays_followup()
	{
		date_default_timezone_set("Asia/Kolkata");
		$date_today= date("Y-m-d");
		$row1=$this->session->userdata('my_session');	
		$result=$this->db->query("select client.first_name,client.status,client.middle_name,client.last_name,
		client.mobile,client.client_id,gender,email,profession,address,mobile,follow_up_date 
		from client,lead_assigned_to where client.client_id=lead_assigned_to.lead_id and follow_up_date='".$date_today."' 
		 and lead_assigned_to.employee_id=".$row1['employee_id']." order by follow_up_date");		
		return $result=$result->result();
	}
}