<?php
class homeModel extends CI_Model{
    public function listLocations(){
       $query = $this->db->order_by("loc_id", "desc")->limit(20)->get('loc_locatii');
        return $query->result_array();
    }    
}