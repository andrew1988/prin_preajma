<?php

/*
 *  Modelul selecteaza si afiseaza produsele/locatiile/servicciile pe fiecare
 * categorie in parte
 */

class listingCategoriiModel extends CI_Model {
    /*
     * Functie care se ocupa de afisarea pe categorie.
     */

    public function showOnCat($per_page, $offset, $cat_id) {

        $query = $this->db->where('cat_id',$cat_id)
                ->where('cat_id',$cat_id)
                ->order_by('loc_id','desc')
                ->get('loc_locatii',$per_page,$offset);
        return $query->result_array();
    }
    
    public function getLocationNumberByCat($cat_id){
        $query = $this->db->where('cat_id',$cat_id)->count_all_results('loc_locatii');
        return $query;
    }

}
