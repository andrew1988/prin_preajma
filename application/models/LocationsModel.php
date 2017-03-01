<?php
class LocationsModel extends CI_Model{
        public function addLocation($loc_data,$prg_array){
            $this->db->insert('loc_locatii',$loc_data);
            $special_select = 'SELECT loc_id FROM loc_locatii ORDER BY loc_id DESC LIMIT 1';
            $get_last_loc = $this->db->query($special_select);
            $loc_id = $get_last_loc->result_array();
            foreach($prg_array as $day){
                $day['loc_id'] = $loc_id[0]['loc_id'];
                $this->db->insert('prg_program',$day);               
            }
            $prg_array['loc_id'] = $loc_id[0]['loc_id'];   
        }
}