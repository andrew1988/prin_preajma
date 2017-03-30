<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel extends CI_Model{
    
    public function getResultsNumber($params){
        extract($params);
        $this->db->select('*');
        /*if(isset($loc_pseudonim)){
            $this->db->where('loc_pseudonim',$loc_pseudonim);
        }*/
        if(isset($cou_id)){
            $this->db->where('cou_id',$cou_id);
        }
        //if(isset($ors_id)){
        //    $this->db->where('ors_id',$ors_id);
        //}
       /* if(isset($ora_inchidere)){
            //query->where('ora_inchidere',$ora_inchidere)
        }
        
        if(isset($ora_deschidere)){
            //$quer->where('ora_deschidee')
        }*/
        
        $numarRezultate = $this->db->get('loc_locatii');
        $array_rez = $numarRezultate->result_array();
        return $array_rez;
        
    }
    
    public function getResults($params){
        
    }
    
}