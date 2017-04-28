<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Clients extends CI_Controller {
	
	public function view_active_clients()
	{
		$data   = array();
        $this->load->model('LeadModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->LeadModel->get_active_leads();
        
		$this->load->view('admin/admin_header');
			$this->load->view('clients/view_clients', $data);
		$this->load->view('admin/admin_footer');
	}
	public function view_expired_clients()
	{
			$data   = array();
        $this->load->model('LeadModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->LeadModel->get_expired_leads();
        
		$this->load->view('admin/admin_header');
			$this->load->view('clients/view_clients', $data);
		$this->load->view('admin/admin_footer');
	}
	public function view_hold_clients()
	{
		$data   = array();
        $this->load->model('LeadModel');
        $this->load->helper('url');
        //$this->load->library('acl');
        $data['result'] = $this->LeadModel->get_hold_leads();
        
		$this->load->view('admin/admin_header');
			$this->load->view('clients/view_clients', $data);
		$this->load->view('admin/admin_footer');
	
	}

}