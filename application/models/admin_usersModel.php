.<?php
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
      
      public function update_user_details($data){
          
          print("<pre>"); print_r($data); print("</pre>");
          $user_id = $data['usr_id'];

          unset($data['usr_id']);
          $this->db->set($data);
          $this->db->where('usr_id',$user_id);
          $this->db->update('usr_users');
      }
      public function delete_user($data){
          extract($data);
          $this->db->where('usr_id',$usr_id);
          $this->db->delete('users');
      }
}