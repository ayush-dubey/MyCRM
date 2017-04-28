
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
			$this->load->view('leads/update_leads',$data);
			$this->load->view('admin/admin_footer');
		}
	}
	public function edit_disposed_leads()
	{
		if($_POST['client']=="")
		{
		   	return redirect('leads/view_disposed_leads');
		}
		else
		{	
			$this->client_id=$_POST['client'];
			$this->load->model('LeadModel');
			$row=$this->LeadModel->edit_disposed_leads($this);
			$row=$row->result();
			$data['mydata']=$row[0];
			$this->load->view('admin/admin_header');
			$this->load->view('leads/update_disposed',$data);
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
			$this->comment=$_POST['comment'];
			
			date_default_timezone_set("Asia/Kolkata");
			$date_today= date("Y-m-d");
			
				
			$this->LeadModel->update_leads($this,$date_today);
			$this->session->set_flashdata('update','Updated successfully...');
			return redirect('admin/viewLeads');
		}	
	}
	
	public function delete_leads()
	{
		$this->client_id=$_POST['client'];
		$this->load->model('LeadModel');
		$this->LeadModel->delete_leads($this);
		
		
			$this->session->set_flashdata('delete','Deleted  successfully and moved to disposed leads...');
			return redirect('admin/viewLeads');
		
		
	}
	public function delete_disposed_leads()
	{
		$this->client_id=$_POST['client'];
		$this->load->model('LeadModel');
		$this->LeadModel->delete_disposed_leads($this);
		
		
			$this->session->set_flashdata('delete','Deleted Permanently...');
			return redirect('leads/view_disposed_leads');
		
		
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
	public function view_disposed_leads()
	{
		$data   = array();
        $this->load->model('LeadModel');
        $this->load->helper('url');
        
        $data['result'] = $this->LeadModel->get_disposed_leads();
        
		$this->load->view('admin/admin_header');
			$this->load->view('leads/view_disposed_leads', $data);
		$this->load->view('admin/admin_footer');
	}
	public function todays_followup()
	{
		$data   = array();
        $this->load->model('LeadModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->LeadModel->get_todays_followup();
        
		$this->load->view('admin/admin_header');
			$this->load->view('clients/view_clients', $data);
		$this->load->view('admin/admin_footer');
	}
	public function distribute_leads()
	{
		$this->load->model('DistributeLead');
		
		$count=$this->DistributeLead->get_count();
		$client_id=$this->DistributeLead->get_client_id();
		$emp_id=$this->DistributeLead->get_emp_id();
		$div=($count['client_count'])/($count['emp_count']);	
		$div=intval($div);
		$k=0;
		
		/*print_r($count); echo "<br>";
		print_r($count['client_count']); echo "<br>";
		print_r($count['emp_count']); echo "<br>";
		print_r($client_id); echo "<br>";
		print_r($emp_id); echo "<br>";
		print_r($div); echo "<br>";*/
		
		for($i=0;$i<$count['emp_count'];$i++)
		{
			for($j=$k;$j<($k+$div);$j++)
			{
				$this->DistributeLead->assigned_to($emp_id[$i]->employee_id ,$client_id[$j]->client_id);
				echo "<br>";
			}
			$k=$j;	
		}	
		return redirect('Leads/show_distributed_leads');
	}
	public function show_distributed_leads()
	{
		$this->load->model('DistributeLead');
		$data   = array();
		$data['result']=$this->DistributeLead->show_assigned_leads();
		$this->load->view('admin/admin_header');
			$this->load->view('leads/view_distributed_leads', $data);
		$this->load->view('admin/admin_footer');
		
	}
	public function update_disposed()
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
			$this->comment=$_POST['comment'];
			
			date_default_timezone_set("Asia/Kolkata");
			$date_today= date("Y-m-d");
			if(strcasecmp($status,'pending')==0 || strcasecmp($status,'converted')==0)
			{
				$this->LeadModel->update_dipose_to_client($this);
			}
				
			$this->LeadModel->update_leads($this,$date_today);
			$this->session->set_flashdata('update','Updated successfully...');
			return redirect('admin/viewLeads');
			
		}	
	}
	public function unassign_lead()
	{
		$client_id=$_POST['client_id'];
		$this->load->model('DistributeLead');
		$this->DistributeLead->unassign_lead($client_id);
		$this->session->set_flashdata('unassign','Lead Unassigned...');
		return redirect('Leads/show_distributed_leads');
	}
   
}

