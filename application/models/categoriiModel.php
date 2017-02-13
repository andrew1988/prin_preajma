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
    public function getCatTypeModel($id){
        $query = $this->db->get_where('cat_categorii', array('cat_id'=> $id));
        //print_r($query->result_array());
        return $query->result_array();
    }

}
