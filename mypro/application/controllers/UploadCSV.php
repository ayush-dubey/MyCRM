<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadcsv extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->helper('url');                    
    $this->load->model('Welcome_model','welcome');
}

public function index()
{
	$sesVal=$this->session->userdata('my_session');
		$rolecheck=$sesVal['role'];
	if($rolecheck=="admin")	
	{	
		$this->data['view_data']= $this->welcome->view_data();
		$this->load->view('admin/admin_header');
		$this->load->view('excelimport', $this->data, FALSE);
		$this->load->view('admin/admin_footer');
	}
	if($rolecheck=="manager")	
	{	
		$this->data['view_data']= $this->welcome->view_data();
		$this->load->view('manager/manager_header');
		$this->load->view('excelimport', $this->data, FALSE);
		$this->load->view('manager/manager_footer');
	}
	if($rolecheck=="employee")	
	{	
		$this->data['view_data']= $this->welcome->view_data();
		$this->load->view('employee/employee_header');
		$this->load->view('excelimport', $this->data, FALSE);
		$this->load->view('employee/employee_footer');
	}
}

public function importbulkemail(){
    $this->load->view('excelimport');
}

public function import(){
 if(isset($_POST["import"]))
  {
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
        {
          $file = fopen($filename, "r");
           while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
           {
                  $data = array(
                      //'client_id' => $importdata[0],
					  'first_name' => $importdata[0],
					  'middle_name' => $importdata[1],
					  'last_name' => $importdata[2],
					  'gender' => $importdata[3],
					  'email' => $importdata[4],
					  'mobile' => $importdata[5],
                      'status' =>$importdata[6],
					  'address' =>$importdata[7],
					  'profession' =>$importdata[8],
					  //'active' =>$importdata[10],
					 //. 'assigned' =>$importdata[11],
					  //'disposed' =>$importdata[12],
					  
					 // 'follow_up_date' => date('Y-m-d'),
                      
					  );
           $insert = $this->welcome->insertCSV($data);
           }                    
          fclose($file);
$this->session->set_flashdata('message', 'Data are imported successfully..');
redirect('uploadcsv/index');
        }else{
$this->session->set_flashdata('message', 'Something went wrong..');
redirect('uploadcsv/index');
    }
  }
}

}