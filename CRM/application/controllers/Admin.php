<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
	
	public function admin_dashboard()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
			return redirect('Login');
		
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_page');
		$this->load->view('admin/admin_footer');
	  
	}
	public function update()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
	    	return redirect('Login');
		  
		$this->load->view('admin/admin_update');
		
	}
	public function update_profile()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
	    	return redirect('Login');

		//Using Form Entries
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
			$this->session->set_flashdata('profile','profile sucessfully updated');
		return redirect('Admin/admin_dashboard');
	}
	public function change_password()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
	    	return redirect('Login');
		  
		$this->load->view('admin/change_password');
		
	}
	public function update_password()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
	     	return redirect('Login');
			
		$this->old_pswd=$_POST['old_pswd'];
		$this->new_pswd=password_hash($_POST['new_pswd'], PASSWORD_DEFAULT, ['cost' => 12]);
		$this->load->model('UpdateProfile');
		$isUpdated=$this->UpdateProfile->updatePassword($this);
		if($isUpdated)
		{
			$this->session->set_flashdata('registered','password sucessfully changed');
			
			return redirect('Admin/admin_dashboard');
		}
		else
		{
			$this->session->set_flashdata('error','password not changed');
			
			$this->load->view('admin/change_password');
		}
		
	}
	public function register_leads()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
	    	return redirect('Login');
		
		$this->load->view('admin/admin_header');
			$this->load->view('leads/leads');
		$this->load->view('admin/admin_footer');

	}
	public function importLeads()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
	    	return redirect('Login');
		
		$this->load->view('admin/admin_header');
		$this->load->view('leads/leads_excel');
		$this->load->view('admin/admin_footer');	
	
	}
	
	public function viewLeads()
	{
		$row=$this->session->userdata('my_session');	
	    if($row['role']!="admin")
	    	return redirect('Login');
		
		$data   = array();
		$this->load->model('LeadModel');
		$this->load->helper('url');
		//$this->load->library('acl');
		$data['result'] = $this->LeadModel->get_leads();
		
		$this->load->view('admin/admin_header');
			$this->load->view('leads/viewLeads', $data);
		$this->load->view('admin/admin_footer');
	
	}
	public function comment_history()
	{
		$row=$this->session->userdata('my_session');	
		if($row['role']!="admin")
	    	return redirect('Login');
		
		$data   = array();
		$this->load->model('LeadModel');
		$data['result'] = $this->LeadModel->get_comment_history();
		
		$this->load->view('admin/admin_header');
			$this->load->view('leads/comment_history', $data);
		$this->load->view('admin/admin_footer');

	}


}

