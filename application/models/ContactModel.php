<?php
class ContactModel extends CI_Model{
    
    public function saveMessage($params){
        $this->db->insert('con_contact',$params);
    }
     
}