<?php
class HomeModel extends CI_Model{
    public function listLocations(){
       $query = $this->db->select('usr_users.usr_username,cat_categorii.cat_id,cat_categorii.cat_nume,loc_locatii.*')
                         ->join('cat_categorii','cat_categorii.cat_id = loc_locatii.cat_id','left')
                         ->join('usr_users','usr_users.usr_id = loc_locatii.usr_id','left')
                         //->join('prg_program','prg_program.loc_id = loc_locatii.loc_id','left')
                         //->where('prg_program.prg_type',0)
                         ->order_by("loc_id", "desc")
                         ->limit(20)
                         ->get('loc_locatii');
        return $query->result_array();
    }
    /*public function listLocations(){
       $query = $this->db->select('usr_users.usr_username,cat_categorii.cat_id,cat_categorii.cat_nume,loc_locatii.*')
                         ->join('cat_categorii','cat_categorii.cat_id = loc_locatii.cat_id','left')
                         ->join('usr_users','usr_users.usr_id = loc_locatii.usr_id','left')
                         ->order_by("loc_id", "desc")
                         ->limit(20)
                         ->get('loc_locatii');
        return $query->result_array();
    }*/
    
}