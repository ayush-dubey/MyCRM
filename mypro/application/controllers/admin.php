
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
	
	public function admin_dashboard()
	{
		$row=$this->session->userdata('my_session');	
		  if($row['role']=="admin")
	    {
			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_page');
			$this->load->view('admin/admin_footer');
		}
		else
		{
			return redirect('login');
		}		 
  
	}
	public function update()
	{
		$this->load->view('admin/admin_update');
	}
	public function update_profile()
	{
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
		$this->load->model('Update');
		$this->Update->update_admin($this);
		//LOADING vIEW
		$this->load->view('admin/admin_header');
		$this->load->view('public/thank');
		$this->load->view('admin/admin_footer');
	}
	public function change_password()
	{
		$this->load->view('admin/change_password');
	}
	public function update_password()
	{
		$this->old_pswd=$_POST['old_pswd'];
		$this->new_pswd=password_hash($_POST['new_pswd'], PASSWORD_DEFAULT, ['cost' => 12]);
		$this->load->model('Update');
		$isUpdated=$this->Update->updatePassword($this);
		if($isUpdated)
		{
			$this->session->set_flashdata('registered','password sucessfully changed');
			
			return redirect('admin/admin_dashboard');
		}
		else
		{
			$this->session->set_flashdata('error','password not changed');
			
			$this->load->view('admin/change_password');
		}
	}
	public function register_leads()
	{
		$this->load->view('admin/admin_header');
			$this->load->view('leads/leads');
		$this->load->view('admin/admin_footer');
	}

}

