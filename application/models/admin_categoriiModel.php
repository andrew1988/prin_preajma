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
         //sterge categoria doar daca id-ul acesteia exista
         $query = $this->db->get_where('cat_categorii',array('cat_id'=>$cat_id)); 
         if(count($query->result_array()) !=0 ){
             $this->db->where('cat_id',$cat_id);
             $this->db->delete('cat_categorii');
         } 
     }
     public function checkExistance($data){
         extract($data);
         $query = $this->db->get_where('cat_categorii',array('cat_nume'=>$cat_nume));
         return $query->result_array(); 
     }
     public function editareCategorie($data){
          $cat_id = $data['cat_id'];
          unset($data['cat_id']);
          $this->db->set($data);
          $this->db->where('cat_id',$cat_id);
          $this->db->update('cat_categorii');
     }
     public function detaliiCategorie($cat_id){
         $query = $this->db->get_where('cat_categorii',array('cat_id'=>$cat_id));
         return $query->result_array(); 
     }
     
}