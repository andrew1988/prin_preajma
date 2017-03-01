<?php
class LocationDetailsModel extends CI_Model{

    public function getLocationDetails($loc_id){
        $locationDetails = $this->db->get_where('loc_locatii',array('loc_id'=>$loc_id));
        return $locationDetails->result_array();
    }
    
}