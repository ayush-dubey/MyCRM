
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Leads extends CI_Controller {
	
	
	
	public function insert_leads()
	{
		if($_POST['first_name']=="")
		{
		   	return redirect('admin/admin_dashboard');
		}
		else
		{
			$this->load->model('LeadModel');
			$this->first_name=$_POST['first_name'];
			$this->middle_name=$_POST['middle_name'];
			$this->last_name=$_POST['last_name'];
			$this->gender=$_POST['gender'];
			$this->mobile=$_POST['mobile'];
			$this->email=$_POST['email'];
			$addr1=$_POST['address1'];
			$addr2=$_POST['address2'];
			$city=$_POST['city'];
			$pincode=$_POST['pincode'];
			$state=$_POST['state'];
			$this->address = ''.$addr1.'  '.$addr2.'  '.$city.'  ('.$pincode.')  '.$state;
			$this->profession=$_POST['profession'];
			$this->LeadModel->insert_users($this);
			
			
			
		}
	}
   
}

