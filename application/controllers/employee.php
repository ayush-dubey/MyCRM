<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Employee extends CI_Controller {
	
	public function employee_dashboard()
	{
		  $this->load->view('employee/employee_header');	
		 // $this->load->view('employee/employee_page');
		  $this->load->view('employee/employee_footer');
		  
	}
    public function settings()
	{
		$this->load->view('employee/employee_header');	
		$this->load->view('settings');
		$this->load->view('employee/employee_footer');
	}
	
	
	
}