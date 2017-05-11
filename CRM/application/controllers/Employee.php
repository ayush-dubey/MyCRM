<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Controller {
	public function employee_dashboard()
	{
		$row=$this->session->userdata('my_session');		
		
		if($row['role']=="employee")
	    {
		  $this->load->view('employee/employee_header');	
		  $this->load->view('employee/employee_page');
		  $this->load->view('employee/employee_footer');
		}
		else
		{
			return redirect('login');
		}	 		 
	}
    public function settings()
	{
		$this->load->view('employee/employee_header');	
		$this->load->view('settings');
		$this->load->view('employee/employee_footer');
	}
	
	public function viewLeads()
	{
		$data   = array();
        $this->load->model('EmployeeModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->EmployeeModel->get_emp_leads();
        
		$this->load->view('employee/employee_header');
			$this->load->view('leads/viewLeadsEmp', $data);
		$this->load->view('employee/employee_footer');
	}
	public function importLeads()
	{
		$this->load->view('employee/employee_header');
			$this->load->view('leads/leads_excel');
		$this->load->view('employee/employee_footer');	
	}
	public function register_leads()
	{
		$this->load->view('employee/employee_header');
			$this->load->view('leads/leads');
		$this->load->view('employee/employee_footer');
	}
	public function todays_followup()  
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	
		$data   = array();
        $this->load->model('EmployeeModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->EmployeeModel->get_todays_followup();
		
			$this->load->view('employee/employee_header');
			$this->load->view('leads/viewleads', $data);
			$this->load->view('employee/employee_footer');
		
	}
	public function comment_history()
	{
		$data   = array();
        $this->load->model('LeadModel');
		$data['result'] = $this->LeadModel->get_comment_history();
        
		$this->load->view('employee/employee_header');
		$this->load->view('leads/comment_history', $data);
		$this->load->view('employee/employee_footer');
	
	}
	public function change_password()
	{
		$this->load->view('employee/change_password');
	}
	
	public function update_password()
	{
		if($_POST['old_pswd']!="")
		{
			$this->old_pswd=$_POST['old_pswd'];
			$this->new_pswd=password_hash($_POST['new_pswd'], PASSWORD_DEFAULT, ['cost' => 12]);
			$this->load->model('UpdateProfile');
			$isUpdated=$this->UpdateProfile->updatePassword($this);
			if($isUpdated)
			{
				$this->session->set_flashdata('registered','password sucessfully changed');
				
				return redirect('employee/employee_dashboard');
			}
			else
			{
				$this->session->set_flashdata('error','password not changed');
				
				$this->load->view('employee/change_password');
			}
		}
		else
			return redirect('employee/change_password');
	}
	
	public function update()
	{
		$this->load->view('employee/employee_update');
	}
	public function update_profile()
	{
		//Using Form Entries
		if($_POST['first_name']!="")
		{
			$this->first_name=$_POST['first_name'];
			$this->middle_name=$_POST['middle_name'];
			$this->last_name=$_POST['last_name'];
			$this->father_name=$_POST['fname'];
			$this->mobile=$_POST['mobile'];
			$this->email=$_POST['email'];
			$this->address=$_POST['address'];
			$this->dob=$_POST['dob'];
			//Loading Model
			$this->load->model('UpdateProfile');
			$this->UpdateProfile->update_user($this);
			//LOADING vIEW
			$this->session->set_flashdata('profile','profile updated sucessfully...');
			return redirect('employee/employee_dashboard');
		}
		else 
			return redirect('employee/employee_dashboard');
	}
	
}