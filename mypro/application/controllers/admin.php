
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
	
	public function admin_dashboard()
	{
		 
		  $this->load->view('admin/admin_page');
		  
		  
	}
    public function settings()
	{
		$this->load->view('admin/admin_header');	
		$this->load->view('settings');
		$this->load->view('admin/admin_footer');
	}
	
	
	
}

