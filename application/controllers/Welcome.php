<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$message['msg']="";
		$this->load->view('public/homepage',$message);
		
	}
	public function index1()
	{
	
		$this->load->view('login/login');
		
	}
	
	

	
}
