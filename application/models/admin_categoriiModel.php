<?php
class admin_categoriiModel extends CI_Model{
     public function adaugaCategorie($data){
         $this->db->insert('cat_categorii',$data);
     }
     public function listaCategorii(){
         $query = $this->db->get('cat_categorii');
         return $query->result_array();
     }
     public function stergeCategorie($cat_id){
         
     }
     public function checkExistance($data){
         extract($data);
        
         $query = $this->db->get_where('cat_categorii',array('cat_nume'=>$cat_nume));
         return $query->result_array(); 
     }
     public function editareCategorie($cat_id){
         
     }
     public function detaliiCategorie($cat_id){
         $query = $this->db->get_where('cat_categorii',array('cat_id'=>$cat_id));
         return $query->result_array(); 
     }
}