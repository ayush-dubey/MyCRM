<?php
class Welcome_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertCSV($data)
            {
                $this->db->insert('clientdmy', $data);
                return TRUE;
            }



    public function view_data(){
        $query=$this->db->query("select * from clientdmy");
        return $query->result_array();
    }

}