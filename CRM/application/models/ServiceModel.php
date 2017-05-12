<?php

class ServiceModel extends CI_Model
{
	
	public function insert($service_name)
	{
		$this->db->query("insert into services(service_name) values('".$service_name."')");
	}
	public function view()
	{
		$row=$this->db->query("select * from services");
		$row=$row->result();
		return $row;
	}
	
	public function delete($service_id)
	{
		$this->db->query("delete from services where service_id=".$service_id);
	}
	
	public function insert_client_services($service_id,$client_id)
	{
		foreach($service_id as $sid)
			$this->db->query("insert into client_services values('".$client_id."','".$sid."')");
	}
	
	public function view_client_services($client_id)
	{
		$row=$this->db->query("select client_services.service_id,client_services.client_id,client.first_name,client.last_name,client.mobile,services.service_name  from client_services,services,client where client.client_id=".$client_id." and client_services.client_id=".$client_id." and client_services.service_id=services.service_id" );
		$row=$row->result();
		return $row;
	}
	public function delete_client_services($data)
	{
		$this->db->query("delete from client_services where client_id=".$data->client_id." and service_id=".$data->service_id);
	}
}