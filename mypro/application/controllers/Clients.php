<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Clients extends CI_Controller {
	
	public function view_active_clients()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
		$data   = array();
        $this->load->model('ClientModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->ClientModel->get_active_clients();
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
		if($rolecheck=="employee")
		{	
			$this->load->view('employee/employee_header');
			$this->load->view('clients/view_clients', $data);
			$this->load->view('employee/employee_footer');
		}
	}
	public function view_expired_clients()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
			$data   = array();
        $this->load->model('ClientModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->ClientModel->get_expired_clients();
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
		if($rolecheck=="employee")
		{	
			$this->load->view('employee/employee_header');
			$this->load->view('clients/view_clients', $data);
			$this->load->view('employee/employee_footer');
		}
		
	}
	public function view_all_clients()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
		$data   = array();
        $this->load->model('ClientModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->ClientModel->get_all_clients();
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
		if($rolecheck=="employee")
		{	
			$this->load->view('employee/employee_header');
			$this->load->view('clients/view_clients', $data);
			$this->load->view('employee/employee_footer');
		}
		
		
	}
	

}