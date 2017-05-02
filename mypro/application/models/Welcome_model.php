<?php
class Welcome_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertCSV($data)
            {
                $this->db->insert('client', $data);
                return TRUE;
            }



    public function view_data(){
        $query=$this->db->query("select * from client");
        return $query->result_array();
    }

}