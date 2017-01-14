<?php
class admin_usersModel extends CI_Model{
      public function get_all_users(){
           $query = $this->db->get('usr_users');
           $users = $query->result_array();
           //print("<pre>"); print_r($users); print("</pre>");
           return $users;
      }    
}