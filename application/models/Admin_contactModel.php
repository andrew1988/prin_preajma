<?php
class Admin_contactModel extends CI_Model{
     
    public function getUnreadMessagesList($limit,$offset){
        $query = $this->db->select('con_id,con_subject')
                ->get_where('con_contact', array('con_read'=>0),$limit,$offset);
        return $query->result_array();
    }
    
   /* public function getAllMessages($limit,$offset){
        $query = $this->db->get('con_contact',$limit,$offset);
        return $query->result_array();
    }*/
    
    public function getMessageDetails($message_id){
        $query = $this->db->get_where('con_contact',array('con_id'=>$message_id));
        $result = $query->result_array();
        if($result[0]['con_read'] == 0){
            $this->updateReadStatus($message_id);
        }
        print("<pre>"); print_r($result); print("</pre>");
        return $result;
    }
    
    public function updateReadStatus($con_id){
          $this->db->set('con_read',1);
          $this->db->where('con_id',$con_id);
          $this->db->update('con_contact');
    }
    
    public function countAllUnreadMessages(){
        return $this->db->where('con_read',0)
                ->count_all_results('con_contact');
    }
    
    public function getReadMessagesList($limit,$offset){
        $query = $this->db->select('con_id,con_subject')
                ->get_where('con_contact', array('con_read'=>1),$limit,$offset);
        return $query->result_array();
    }
    
    public function countAllReadMessages(){
        return $this->db->where('con_read',1)
                ->count_all_results('con_contact');
    }
    
    public function deleteMessage($con_id){
          $this->db->where('con_id',$con_id);
          $this->db->delete('con_contact');
    }
     
}