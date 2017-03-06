<?php

class Admin_locationsModel extends CI_Model {
    
    public function getLocations($limit,$offset){
        $query = $this->db->select('loc_locatii.loc_id,loc_locatii.loc_pseudonim,usr_users.usr_username,usr_users.usr_id','left')
                 ->join('usr_users','loc_locatii.usr_id = usr_users.usr_id')
                 ->get('loc_locatii',$limit,$offset);
        return $query->result_array();
    }
    
    public function getLocationsNumber(){
        $query = $this->db->count_all_results('loc_locatii');
        return $query;
    }
    
    public function getLocationDetails($loc_id){
        $location = $this->db->join('cat_categorii','loc_locatii.cat_id = cat_categorii.cat_id','left')
                             ->join('prg_program','prg_program.loc_id = loc_locatii.loc_id','left')
                             ->join('ors_orase','ors_orase.ors_id = loc_locatii.ors_id','left')
                             ->get_where('loc_locatii',array('loc_locatii.loc_id'=>$loc_id));
        return $location->result_array();
    }
    
    public function updateLocation($loc_id){
        
    }
    
}
