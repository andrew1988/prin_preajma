<?php

class LocationsModel extends CI_Model {

    public function addLocation($loc_data, $prg_array) {
        $this->db->insert('loc_locatii', $loc_data);
        $usr_id = $this->session->userdata('usr_id');
        $special_select = "SELECT loc_id FROM loc_locatii WHERE usr_id = '$usr_id'  ORDER BY loc_id DESC LIMIT 1";
        $get_last_loc = $this->db->query($special_select);
        $loc_id = $get_last_loc->result_array();
        foreach ($prg_array as $day) {
            $day['loc_id'] = $loc_id[0]['loc_id'];
            $this->db->insert('prg_program', $day);
        }
        $prg_array['loc_id'] = $loc_id[0]['loc_id'];
    }

    public function getLocationByUser($limit,$offset) {
        $query = $this->db->select('loc_id,loc_pseudonim')
                ->get_where('loc_locatii', array('usr_id' => $this->session->userdata('usr_id')),$limit,$offset);
        return $query->result_array();
    }
    
    public function getLocationsNumber(){
        $query = $this->db->where('usr_id',$this->session->userdata('usr_id'))
                ->count_all_results('loc_locatii');
        return $query;
    }

}
