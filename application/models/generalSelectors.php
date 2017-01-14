<?php
class generalSelectors extends CI_Model{
    
    public function getCountyList(){
        $query = $this->db->get('cou_county_list');    
        $county_list = array();
        foreach($query->result_array() as $row){
            $county_list[] = ['county_id'=>$row['cou_id'],'long'=>$row['cou_long']];
        }
        return $county_list;
    }
}