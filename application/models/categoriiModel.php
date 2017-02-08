<?php

class categoriiModel extends CI_Model {
   /*
    * selecteaza categoriile pentru afisare in site.
    */
    public function selectCategorii() {
        $query = $this->db->get('cat_categorii');
        $rezultat = $query->result_array();      
        return $rezultat;
    }   

}
