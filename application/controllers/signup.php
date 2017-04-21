
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Signup extends CI_Controller {
	
	public function index()
	{   $this->load->view('sign_up/signup_header');
	    $message['msg']="";
		$this->load->view('sign_up/insert',$message);
		$this->load->view('sign_up/signup_footer');
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
		
		if($_POST['username']=="")
		{
		   	return redirect('signup');
		}
		else
		{
			$this->load->model('SignupModel');
			
			$username=$_POST['username'];   		

			$check_exist=$this->SignupModel->check($username);
			$check_exist= $check_exist->result();
			if($check_exist==null)
			{
		 
				$this->username=$_POST['username'];
				$this->role=$_POST['user'];
				$this->password=$_POST['password'];
				$this->first_name=$_POST['first_name'];
				$this->middle_name=$_POST['middle_name'];
				$this->last_name=$_POST['last_name'];
				$this->dob=$_POST['dob'];
				$this->doj=$_POST['doj'];
				$this->gender=$_POST['gender'];
				$this->father_name=$_POST['fname'];
				$this->mobile=$_POST['mobile'];
				$this->email=$_POST['email'];
				$this->address=$_POST['address'];


				$this->SignupModel->insert_users($this);

				$this->load->view('public/header');
				$this->load->view('public/thank');
				$this->load->view('public/footer');
			}
			else
			{
				$message['msg']="username already exist";
				$this->load->view('public/header');
				$this->load->view('sign_up/insert',$message);
				$this->load->view('public/footer');
			}
		}	
	}

	
	
		
}

