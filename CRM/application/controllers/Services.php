<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function index()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
			return redirect('Login');
		$this->load->view('admin/admin_header');
		$this->load->view('services/add_new_service');
		$this->load->view('admin/admin_footer');	
	}
	public function insert()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
			return redirect('Login');
		
		$service_name=$_POST['service_name'];
		$this->load->model('ServiceModel');
		$this->ServiceModel->insert($service_name);
		return redirect('Services/view');
		
	}
	public function view()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
			return redirect('Login');
		
		$this->load->model('ServiceModel');
		$row=$this->ServiceModel->view();
		$row['result']=$row;
		$this->load->view('admin/admin_header');
		$this->load->view('services/view',$row);
		$this->load->view('admin/admin_footer');
	}	
	public function delete()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	    if($rolecheck=="")
				return redirect('Login');
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
			return redirect('Login');
		
		$service_id=$_POST['service_id'];
		$this->load->model('ServiceModel');
		$this->ServiceModel->delete($service_id);
		return redirect('Services/view');

		
	}
	public function view_client_services()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	    if($rolecheck=="")
				return redirect('Login');
		if($_POST['client']=="")
		{	
			if($rolecheck=="admin")
				return redirect('Admin/viewLeads');
			if($rolecheck=="manger")
				return redirect('Manager/viewLeads');
			if($rolecheck=="employee")
				return redirect('Employee/viewLeads');
		}
		else
		{	
			$client_id=$_POST['client'];
			$this->load->model('ServiceModel');
			$row=$this->ServiceModel->view_client_services($client_id);
			$row['result']=$row;
			if($rolecheck=="admin")
			{
				$this->load->view('admin/admin_header');
				$this->load->view('services/view_client_services',$row);
				$this->load->view('admin/admin_footer');
			}	
			if($rolecheck=="manager")
			{
				$this->load->view('manager/manager_header');
				$this->load->view('services/view_client_services',$row);
				$this->load->view('manager/manager_footer');
			}	
			if($rolecheck=="employee")
			{
				$this->load->view('employee/employee_header');
				$this->load->view('services/view_client_services',$row);
				$this->load->view('employee/employee_footer');
			}	
		}
	}
	
	public function delete_client_services()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	    if($rolecheck=="")
				return redirect('Login');
			
		$this->client_id=$_POST['client_id'];
		$this->service_id=$_POST['service_id'];		
		$this->load->model('ServiceModel');
		$this->ServiceModel->delete_client_services($this);
		
		$client_id=$this->client_id;
		$this->load->model('ServiceModel');
		$row=$this->ServiceModel->view_client_services($client_id);
		$row['result']=$row;
		if($rolecheck=="admin")
		{
			$this->load->view('admin/admin_header');
			$this->load->view('services/view_client_services',$row);
			$this->load->view('admin/admin_footer');
		}	
		if($rolecheck=="manager")
		{
			$this->load->view('manager/manager_header');
			$this->load->view('services/view_client_services',$row);
			$this->load->view('manager/manager_footer');
		}	
		if($rolecheck=="employee")
		{
			$this->load->view('employee/employee_header');
			$this->load->view('services/view_client_services',$row);
			$this->load->view('employee/employee_footer');
		}
	}		
	
	
}
