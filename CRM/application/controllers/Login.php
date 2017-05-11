<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
	
	
	public function index()
	{
			$message['msg']="";
			$this->load->view('login/login',$message);
			
	}
	public function check_login()
	{
		if($_POST==null)
		{
			return redirect('login');
		}
		else
		{		
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_username_check');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_password_check');
			$this->load->model('LoginModel');
			$this->username=$_POST['username'];
			$this->password=$_POST['password'];
			$this->mylist=$_POST['mylist'];
			
			$user=$_POST['mylist'];
			
			$row=$this->LoginModel->select_users($this);	
				
			if($row)
			{
				date_default_timezone_set("Asia/Kolkata");
				$last_login= date("Y-m-d h:i:sa");
				$this->load->model('LoginModel');
				$this->LoginModel->set_last_login($last_login,$this->username);
				
				//session begins
				
				$session_array=array('employee_id'=>$row[0]->employee_id,'username'=>$row[0]->username, 'first_name'=>$row[0]->first_name,'middle_name'=>$row[0]->middle_name,
				'last_name'=>$row[0]->last_name,'gender'=>$row[0]->gender,'dob'=>$row[0]->dob ,'doj'=>$row[0]->doj,'role'=>$row[0]->role,
				'father_name'=>$row[0]->father_name,'address'=>$row[0]->address,'last_login'=>$row[0]->last_login,'email'=>$row[0]->email,
				'mobile'=>$row[0]->mobile);	
				$this->load->library('session');
				$this->session->set_userdata('my_session',$session_array);
				
					if($_POST['mylist']=="admin")
						return redirect('admin/admin_dashboard');
					if($_POST['mylist']=="manager")
						return redirect('manager/manager_dashboard');
					if($_POST['mylist']=="employee")
						return redirect('employee/employee_dashboard');
				
			}
			else
			{	
				
			   $message['msg']="invalid username or password";
				$this->load->view('login/login',$message);
				//return redirect('login/index',$message);
			  
			}
		}	
	}
	
	

	public function logout()
	{
		
		$this->session->unset_userdata('my_session');
		return redirect('welcome');
	}	
	

	
}

