
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Leads extends CI_Controller {
	
	
	
	public function insert_leads()
	{
		if($_POST['first_name']=="")
		{
		   	return redirect('admin/admin_dashboard');
		}
		else
		{
			$this->load->model('LeadModel');
			$this->first_name=$_POST['first_name'];
			$this->middle_name=$_POST['middle_name'];
			$this->last_name=$_POST['last_name'];
			$this->gender=$_POST['gender'];
			$this->mobile=$_POST['mobile'];
			$this->email=$_POST['email'];
			$addr1=$_POST['address1'];
			$addr2=$_POST['address2'];
			$city=$_POST['city'];
			$pincode=$_POST['pincode'];
			$state=$_POST['state'];
			
			if($pincode!="")
			{	
				$this->address = $addr1.'  '.$addr2.'  '.$city.'  ('.$pincode.')  '.$state;
			}
			else
			{	
				$this->address = $addr1.'  '.$addr2.'  '.$city.'  '.$state;
			}	
			
			
			$this->profession=$_POST['profession'];
			$this->LeadModel->insert_users($this);
			$this->session->set_flashdata('insert',' Lead registered successfully');
			return redirect('admin/viewLeads');
			
		}
	}
	public function edit()
	{
		if($_POST['client']=="")
		{
		   	return redirect('admin/viewLeads');
		}
		else
		{	
			$this->client_id=$_POST['client'];
			$this->load->model('LeadModel');
			$row=$this->LeadModel->edit($this);
			$row=$row->result();
			$data['mydata']=$row[0];
			$this->load->view('admin/admin_header');
			$this->load->view('leads/update',$data);
			$this->load->view('admin/admin_footer');
		}
	}
	public function update_leads()
	{
		if($_POST['client_id']=="")
		{
		   	return redirect('admin/viewLeads');
		}
		else
		{	
			$this->load->model('LeadModel');
			
			$this->first_name=$_POST['first_name'];
			$this->middle_name=$_POST['middle_name'];
			$this->last_name=$_POST['last_name'];
			$this->gender=$_POST['gender'];
			$this->mobile=$_POST['mobile'];
			$this->email=$_POST['email'];
			$this->address=$_POST['address'];
			$this->status=$_POST['status'];
			$this->client_id=$_POST['client_id'];
			$this->follow_up_date=$_POST['follow_up_date'];
			
			$this->LeadModel->update_leads($this);
			$this->session->set_flashdata('update','Updated successfully...');
			return redirect('admin/viewLeads');
		}	
	}
	
	public function delete_leads()
	{
		$this->client_id=$_POST['client'];
		$this->load->model('LeadModel');
		$this->LeadModel->delete_leads($this);
		
		
			$this->session->set_flashdata('delete','Deleted  successfully...');
			return redirect('admin/viewLeads');
		
		
	}
	
	public function filter_by()
	{
		$status=$_POST['status'];
		$follow_up_date=$_POST['follow_up_date'];
		$this->load->model('LeadModel');
		
        $this->load->helper('url');
		
        if($follow_up_date=="" && $status=="all")
		{	
				return redirect('admin/viewLeads');
		}
		else
		{
			if($follow_up_date!="" && $status!="all")
			{
				$data   = array();
				$data['result'] = $this->LeadModel->get_leads_by_status_date($status,$follow_up_date);
			
				$this->load->view('admin/admin_header');
				$this->load->view('admin/viewLeads', $data);
				$this->load->view('admin/admin_footer');
			}
			else
			{
			
			
				if($status=="all")
				{
					$data   = array();
					$data['result'] = $this->LeadModel->get_leads_by_date($follow_up_date);
				
					$this->load->view('admin/admin_header');
					$this->load->view('admin/viewLeads', $data);
					$this->load->view('admin/admin_footer');
				}
				if($follow_up_date=="")
				{
					$data   = array();
					$data['result'] = $this->LeadModel->get_leads_by_status($status);
				
					$this->load->view('admin/admin_header');
					$this->load->view('admin/viewLeads', $data);
					$this->load->view('admin/admin_footer');
				}
			
			}
		}			
		
	}
   
}

