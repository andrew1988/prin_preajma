<?php
class admin_usersModel extends CI_Model{
      public function get_all_users($pagination_limit,$limit){
           $query = $this->db->get('usr_users',$pagination_limit,$limit);
           $users = $query->result_array();

           return $users;
      }
      public function get_users_number(){
          $query = $this->db->get('usr_users');
          $row_count = $query->num_rows();
          
          return $row_count;
      }
      
      public function get_user_details($usr_id){
           $query = $this->db->get_where('usr_users',array('usr_id' => $usr_id));
           $user_details = $query->result_array();
           
           return $user_details;
      }
}