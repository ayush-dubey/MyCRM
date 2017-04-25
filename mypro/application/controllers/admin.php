
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
	
	public function admin_dashboard()
	{
		  if($this->session->userdata('my_session')!="")
	    {
			$this->load->view('admin/admin_page');
		}
		else
		{
			return redirect('login');
		}		 
  
	}
	
	
	
    public function settings()
	{
		$this->load->view('admin/admin_header');	
		$this->load->view('settings');
		$this->load->view('admin/admin_footer');
	}
	
	
	
}

