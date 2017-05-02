
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Leads extends CI_Controller {
	
	
	public function insert_leads()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
		if($_POST['first_name']=="")
		{
		   	if($rolecheck=="admin")
				return redirect('admin/admin_dashboard');
			if($rolecheck=="manager")
				return redirect('manager/manager_dashboard');
		   	if($rolecheck=="employee")
				return redirect('employee/employee_dashboard');
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
			if($rolecheck=="admin")
				return redirect('admin/viewLeads');
			if($rolecheck=="manager")
				return redirect('manager/viewLeads');
			if($rolecheck=="employee")
				return redirect('employee/viewLeads');
			
			
		}
	}
	public function edit()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	
		if($_POST['client']=="")
		{
		   	if($rolecheck=="admin")
				return redirect('admin/viewLeads');
			if($rolecheck=="manger")
				return redirect('manager/viewLeads');
			if($rolecheck=="employee")
				return redirect('employee/viewLeads');
			
		}
		else
		{	
			$this->client_id=$_POST['client'];
			$this->load->model('LeadModel');
			$row=$this->LeadModel->edit($this);
			$row=$row->result();
			$data['mydata']=$row[0];
			if($rolecheck=="admin")
			{
				$this->load->view('admin/admin_header');
				$this->load->view('leads/update_leads',$data);
				$this->load->view('admin/admin_footer');
			}
			if($rolecheck=="manager")
			{
				$this->load->view('manager/manager_header');
				$this->load->view('leads/update_leads',$data);
				$this->load->view('manager/manager_footer');
			}
			if($rolecheck=="employee")
			{
				$this->load->view('employee/employee_header');
				$this->load->view('leads/update_leads',$data);
				$this->load->view('employee/employee_footer');
			}
		}
	}
	public function edit_disposed_leads()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	
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
			if($rolecheck=="admin")
			{
				$this->load->view('admin/admin_header');
				$this->load->view('leads/update_disposed_leads',$data);
				$this->load->view('admin/admin_footer');
			}
			if($rolecheck=="manager")
			{
				$this->load->view('manager/manager_header');
				$this->load->view('leads/update_disposed_leads',$data);
				$this->load->view('manager/manager_footer');
			}
			
		}
	}
	public function update_leads()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	
		if($_POST['client_id']=="")
		{
		   	if($rolecheck=="admin")
				return redirect('admin/viewLeads');
			if($rolecheck=="manager")
				return redirect('manager/viewLeads');
			if($rolecheck=="employee")
				return redirect('employee/viewLeads');
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
			$this->profession=$_POST['profession'];
			
			date_default_timezone_set("Asia/Kolkata");
			$date_today= date("Y-m-d h:i:sa");
			
				
			$this->LeadModel->update_leads($this,$date_today);
			$this->session->set_flashdata('update','Updated successfully...');
			if($rolecheck=="admin")
				return redirect('admin/viewLeads');
			if($rolecheck=="manager")
				return redirect('manager/viewLeads');
			if($rolecheck=="employee")
				return redirect('employee/viewLeads');
		}	
	}
	
	public function delete_leads()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	
		$this->client_id=$_POST['client'];
		$this->load->model('LeadModel');
		$this->LeadModel->delete_leads($this);
		
		
			$this->session->set_flashdata('delete','Deleted  successfully and moved to disposed leads...');
			
			if($rolecheck=="admin")
				return redirect('admin/viewLeads');
			if($rolecheck=="manager")
				return redirect('manager/viewLeads');
			
		
		
	}
	public function delete_disposed_leads()
	{
		$this->client_id=$_POST['client'];
		$this->load->model('LeadModel');
		$this->LeadModel->delete_disposed_leads($this);
		
		$this->session->set_flashdata('delete','Deleted Permanently...');
		return redirect('leads/view_disposed_leads');
		
		
	}
	
	public function filter_leads_by()  //alag se banana for employee
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	
		$status=$_POST['status'];
		$follow_up_date=$_POST['follow_up_date'];
		$this->load->model('LeadModel');
		
        $this->load->helper('url');
		
        if($follow_up_date=="" && $status=="all")
		{	
				
				if($rolecheck=="admin")
					return redirect('admin/viewLeads');
				if($rolecheck=="manager")
					return redirect('manager/viewLeads');
				if($rolecheck=="employee")
					return redirect('employee/viewLeads');
			
		}
		else
		{
			if($follow_up_date!="" && $status!="all")
			{
							
				if($rolecheck=="admin")
				{
					$data = array();
					$data['result'] = $this->LeadModel->get_leads_by_status_date($status,$follow_up_date);
	
					$this->load->view('admin/admin_header');
					$this->load->view('leads/viewLeads', $data);
					$this->load->view('admin/admin_footer');
				}
				if($rolecheck=="manager")
				{	
					$data = array();
					$data['result'] = $this->LeadModel->get_leads_by_status_date($status,$follow_up_date);

					$this->load->view('manager/manager_header');
					$this->load->view('leads/viewLeads', $data);
					$this->load->view('manager/manager_footer');
				}
				if($rolecheck=="employee")
				{	
					$data = array();
					$data['result'] = $this->LeadModel->get_leads_by_status_date_emp($status,$follow_up_date);

					$this->load->view('employee/employee_header');
					$this->load->view('leads/viewLeadsEmp', $data);
					$this->load->view('employee/employee_footer');
				}
				
			}
			else
			{
			
			
				if($status=="all")
				{
					
				
					if($rolecheck=="admin")
					{
						$data   = array();
						$data['result'] = $this->LeadModel->get_leads_by_date($follow_up_date);		
						$this->load->view('admin/admin_header');
						$this->load->view('leads/viewLeads', $data);
						$this->load->view('admin/admin_footer');
					}
					if($rolecheck=="manager")
					{	
						$data   = array();
						$data['result'] = $this->LeadModel->get_leads_by_date($follow_up_date);
						$this->load->view('manager/manager_header');
						$this->load->view('leads/viewLeads', $data);
						$this->load->view('manager/manager_footer');
					}
					if($rolecheck=="employee")
					{
						$data   = array();
						$data['result'] = $this->LeadModel->get_leads_by_date_emp($follow_up_date);		
						$this->load->view('employee/employee_header');
						$this->load->view('leads/viewLeadsEmp', $data);
						$this->load->view('employee/employee_footer');
					}
					
				}
				if($follow_up_date=="")
				{
					
				
					if($rolecheck=="admin")
					{
						$data   = array();
						$data['result'] = $this->LeadModel->get_leads_by_status($status);	
						$this->load->view('admin/admin_header');
						$this->load->view('leads/viewLeadsEmp', $data);
						$this->load->view('admin/admin_footer');
					}
					if($rolecheck=="manager")
					{	
						$data   = array();
						$data['result'] = $this->LeadModel->get_leads_by_status($status);
						$this->load->view('manager/manager_header');
						$this->load->view('leads/viewLeadsEmp', $data);
						$this->load->view('manager/manager_footer');
					}
					if($rolecheck=="employee")
					{	
						$data   = array();
						$data['result'] = $this->LeadModel->get_leads_by_status_emp($status);
						$this->load->view('employee/employee_header');
						$this->load->view('leads/viewLeadsEmp', $data);
						$this->load->view('employee/employee_footer');
					}
				}
			
			}
		}			
		
	}
	public function view_disposed_leads()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	
		$data   = array();
        $this->load->model('LeadModel');
        $this->load->helper('url');
        
        $data['result'] = $this->LeadModel->get_disposed_leads();
        if($rolecheck=="admin")
		{
			$this->load->view('admin/admin_header');
			$this->load->view('leads/view_disposed_leads', $data);
			$this->load->view('admin/admin_footer');
		}
		if($rolecheck=="manager")
		{
			$this->load->view('manager/manager_header');
			$this->load->view('leads/view_disposed_leads', $data);
			$this->load->view('manager/manager_footer');
		}
	}
	public function todays_followup()  //alag se banana
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	
		$data   = array();
        $this->load->model('LeadModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->LeadModel->get_todays_followup();
		if($rolecheck=="admin")
		{	
			$this->load->view('admin/admin_header');
			$this->load->view('clients/view_clients', $data);
			$this->load->view('admin/admin_footer');
		}
		if($rolecheck=="manager")
		{	
			$this->load->view('manager/manager_header');
			$this->load->view('clients/view_clients', $data);
			$this->load->view('manager/manager_footer');
		}
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
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	
		$this->load->model('DistributeLead');
		$data   = array();
		$data['result']=$this->DistributeLead->show_assigned_leads();
		if($rolecheck=="admin")
		{	
			$this->load->view('admin/admin_header');
			$this->load->view('leads/view_distributed_leads', $data);
			$this->load->view('admin/admin_footer');
		}
		if($rolecheck=="manager")
		{	
			$this->load->view('manager/manager_header');
			$this->load->view('leads/view_distributed_leads', $data);
			$this->load->view('manager/manager_footer');
		}
	}
	public function update_disposed()
	{
		
		if($_POST['client_id']=="")
		{
		   	return redirect('leads/view_disposed_leads');
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
			if(strcasecmp($this->status,"pending")==0 || strcasecmp($this->status,"converted")==0)
			{
				$this->LeadModel->update_dispose_to_client($this);
			}
				
			$this->LeadModel->update_leads($this,$date_today);
			$this->session->set_flashdata('update','Updated successfully...');
			
			return redirect('leads/view_disposed_leads');
			
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
  	public function mobile_track()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
		$row=array();
		$mobile=$_POST['mobile'];
		$this->load->model('LeadModel');
		$row=$this->LeadModel->mobile_track($mobile);
		
		if($row)
		{
			$row['result']=$row;
			if($rolecheck=="admin")
			{	
				$this->load->view('admin/admin_header');
				$this->load->view('leads/viewMobileTracker',$row);
				$this->load->view('admin/admin_footer');
			}
			if($rolecheck=="manager")
			{	
				$this->load->view('manager/manager_header');
				$this->load->view('leads/viewMobileTracker',$row);
				$this->load->view('manager/manager_footer');
			}
			if($rolecheck=="employee")
			{	
				$this->load->view('employee/employee_header');
				$this->load->view('leads/viewMobileTracker',$row);
				$this->load->view('employee/employee_footer');
			}
		}
		else
		{
			$this->session->set_flashdata('error','Mobile number not found');
			if($rolecheck=="admin")
			   return redirect('admin/admin_dashboard');
		    if($rolecheck=="manager")
			   return redirect('manager/manager_dashboard');
		}	
	}
}

