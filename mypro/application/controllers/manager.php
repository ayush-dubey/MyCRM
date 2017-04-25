<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Manager extends CI_Controller {
	public function manager_dashboard()
	{	
		
		$row=$this->session->userdata('my_session');	
		if($row['role']=="manager")
	    {
			$this->load->view('manager/manager_header');	
				  //$this->load->view('manager/manager_page');
			$this->load->view('manager/manager_footer');
		}
		else
		{
			return redirect('login');
		}		
	
	}
    public function settings()
	{
		$this->load->view('manager/manager_header');	
		$this->load->view('settings');
		$this->load->view('manager/manager_footer');
	}
	
	
	
}