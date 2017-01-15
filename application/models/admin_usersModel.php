<?php
class admin_usersModel extends CI_Model{
      public function get_all_users($pagination_limit){
           $query = $this->db->get('usr_users',$pagination_limit);
           $users = $query->result_array();

           return $users;
      }
      public function get_users_number(){
          $query = $this->db->get('usr_users');
          $row_count = $query->num_rows();
          
          return $row_count;
          
      }
}