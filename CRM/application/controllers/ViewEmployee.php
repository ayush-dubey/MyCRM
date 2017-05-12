<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewEmployee extends CI_Controller {

	public function get_employee_list()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
		if($rolecheck!="admin" && $rolecheck!="manager")
			return redirect('Login');
		
		$this->load->model('EmployeeModel');
		$row=$this->EmployeeModel->get_employee_list();
		$row['result']=$row;
		if($rolecheck=="admin")
		{	
			$this->load->view('admin/admin_header');
			$this->load->view('employee/employee_list',$row);
			$this->load->view('admin/admin_footer');
		}	
		if($rolecheck=="manager")
		{	
			$this->load->view('manager/manager_header');
			$this->load->view('employee/employee_list_manager',$row);
			$this->load->view('manager/manager_footer');
		}	
	}
	public function edit()
	{
		$row=array();
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
		if($rolecheck!="admin" && $rolecheck!="manager")
			return redirect('Login');
		
		$this->load->model('EmployeeModel');
		$employee_id=$_POST['employee_id'];
		$row=$this->EmployeeModel->get_employee($employee_id);
		$row['mydata']=$row[0];
		
		if($rolecheck=="admin")
		{	
			$this->load->view('admin/admin_header');
			$this->load->view('employee/update_employee',$row);
			$this->load->view('admin/admin_footer');
		}	
		if($rolecheck=="manager")
		{	
			$this->load->view('manager/manager_header');
			$this->load->view('employee/update_employee',$row);
			$this->load->view('manager/manager_footer');
		}	
	}
	public function update_employee()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	    if($rolecheck!="admin" && $rolecheck!="manager")
			return redirect('Login');
		
		if($_POST['employee_id']=="")
		{
		   	
			return redirect('ViewEmployee/get_employee_list');
			
		}
		else
		{	
			$this->load->model('EmployeeModel');
			
			$this->first_name=$_POST['first_name'];
			$this->middle_name=$_POST['middle_name'];
			$this->last_name=$_POST['last_name'];
			$this->father_name=$_POST['father_name'];
			$this->mobile=$_POST['mobile'];
			$this->email=$_POST['email'];
			$this->address=$_POST['address'];
			$this->role=$_POST['role'];
			$this->employee_id=$_POST['employee_id'];
			
		    $this->EmployeeModel->update_employee($this);
			$this->session->set_flashdata('update','Updated successfully...');
			return redirect('ViewEmployee/get_employee_list');
		}	
	}
	public function delete_emp()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
		if($rolecheck!="admin" && $rolecheck!="manager")
			return redirect('Login');
		
		$employee_id=$_POST['employee_id'];
		$this->load->model('EmployeeModel');
		$this->EmployeeModel->delete_employee($employee_id);
		
		
		$this->session->set_flashdata('delete','Employee deleted ...');
			
			return redirect('ViewEmployee/get_employee_list');
	}
	

	
	
	
}
