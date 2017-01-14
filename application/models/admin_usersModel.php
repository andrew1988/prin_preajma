<?php
class admin_usersModel extends CI_Model{
      public function get_all_users(){
           $query = $this->db->get('usr_users',2);
           $users = $query->result_array();
           return $users;
      }    
}