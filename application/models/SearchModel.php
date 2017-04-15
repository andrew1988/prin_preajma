<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel extends CI_Model{
    
    public function getResults($limit,$offset,$params){
       
        extract($params);
        $this->db->select('*');
        
        if(isset($loc_pseudonim)){
            $this->db->where("loc_pseudonim like '%$loc_pseudonim%'");
        }
        if(isset($cou_id) && ($cou_id != 0)){
            $this->db->where('cou_id',$cou_id);
        }
        if(($ors_id != 0) && (is_numeric($ors_id))){
            $this->db->where('ors_id',$ors_id);
        }
       /* if(isset($ora_inchidere)){
            //query->where('ora_inchidere',$ora_inchidere)
        }
        
        if(isset($ora_deschidere)){
            //$quer->where('ora_deschidee')
        }*/
        
        $rezultate = $this->db->join('cat_categorii','cat_categorii.cat_id = loc_locatii.cat_id')
                ->get('loc_locatii',$limit,$offset);
        //$array_rez = $rezultate->result_array();
        //o sa ii trebuiascaa functie speciala pentru numararea tuturor rezultatelor
        $array_rez = ['rezults'=>$rezultate->result_array(),'rows'=>$rezultate->result_id->num_rows];
        return $array_rez;
        
    }
    
}