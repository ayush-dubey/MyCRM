<?php ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');


class RegisterUser extends CI_Controller {
	
	public function index()
	{   
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
		if($rolecheck!="admin" && $rolecheck!="manager")
			return redirect('Login');
		
		if($rolecheck=="admin")
		{		
			$this->load->view('admin/admin_header');
			$message['msg']="";
			$this->load->view('admin/register_user',$message);
			$this->load->view('admin/admin_footer');
		}
		if($rolecheck=="manager")
		{		
			$this->load->view('manager/manager_header');
			$message['msg']="";
			$this->load->view('manager/register_user',$message);
			$this->load->view('manager/manager_footer');
		}
	}
   /* public function check_available()
	{
		$this->load->model('SignupModel');
		$username=$_POST['username'];   		

        $check_exist=$this->SignupModel->check($username);
		$check_exist= $check_exist->result();
		if($check_exist==null)
		{
			$message['msg']="username available";
			$this->load->view('public/header');
			$this->load->view('sign_up/insert',$message);
			$this->load->view('public/footer');
		}
		else
		{
			$message['msg']="";
			$this->load->view('public/header');
			$this->load->view('sign_up/insert',$message);
			$this->load->view('public/footer');
		}
		
	} */
	public function insert()
	{
		$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];

		if($rolecheck!="admin" && $rolecheck!="manager")
			return redirect('Login');
		
		if($_POST['username']=="")
		{
		   	if($rolecheck=="admin")
				return redirect('Admin/admin_dashboard');
			if($rolecheck=="manager")
				return redirect('Manager/manager_dashboard');
		}
		else
		{
			$this->load->model('RegisterUserModel');
			
			$username=$_POST['username'];   		

			$check_exist=$this->RegisterUserModel->check($username);
			$check_exist= $check_exist->result();
			if($check_exist==null)
			{
		 
				$this->username=$_POST['username'];
				$this->role=$_POST['user'];
				$this->password= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
				$this->first_name=$_POST['first_name'];
				$this->middle_name=$_POST['middle_name'];
				$this->last_name=$_POST['last_name'];
				$this->dob=$_POST['dob'];
				$this->doj=$_POST['doj'];
				$this->gender=$_POST['gender'];
				$this->father_name=$_POST['fname'];
				$this->mobile=$_POST['mobile'];
				$this->email=$_POST['email'];
				//$this->address=$_POST['address'];
				      
				$addr1=$_POST['address1'];
				$addr2=$_POST['address2'];
				$city=$_POST['city'];
				$pincode=$_POST['pincode'];
				$state=$_POST['state'];
				$this->address = ''.$addr1.'  '.$addr2.'  '.$city.'  ('.$pincode.')  '.$state;
				
				
				

				$this->RegisterUserModel->insert_users($this);
				if($rolecheck=="admin")
				{			
					$this->load->view('admin/admin_header');
					$this->load->view('public/thank');
					$this->load->view('admin/admin_footer');
				}
				if($rolecheck=="manager")
				{			
					$this->load->view('manager/manager_header');
					$this->load->view('public/thank');
					$this->load->view('manager/manager_footer');
				}
			}
			else
			{
				$message['msg']="username already exist";
				if($rolecheck=="admin")
				{		
					$this->load->view('admin/admin_header');
					
					$this->load->view('admin/register_user',$message);
					$this->load->view('admin/admin_footer');
				}	
				if($rolecheck=="manager")
				{		
					$this->load->view('manager/manager_header');
					
					$this->load->view('manager/register_user',$message);
					$this->load->view('manager/manager_footer');
				}
			}
		}	
	}

	
	
		
}

