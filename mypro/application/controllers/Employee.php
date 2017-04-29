<?php
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
			$this->load->view('employee/viewLeads', $data);
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
			$this->load->view('employee/viewleads', $data);
			$this->load->view('employee/employee_footer');
		
	}
	
}