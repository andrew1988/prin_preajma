<?php
class commentsModel extends CI_Model{

    public function addComment($saveData){
        $this->db->insert('rev_reviews',$saveData);
    }
    
    public function getComments($loc_id,$per_page,$offset){
        $comments = $this->db->select('usr_users.usr_username,rev_reviews.*')
                             ->order_by('rev_id','desc')
                             ->join('usr_users','usr_users.usr_id = rev_reviews.usr_id')
                             ->get_where('rev_reviews',array('loc_id'=>$loc_id),$per_page,$offset);
        return $comments->result_array();
    }
    
    public function getCommentsNumber($loc_id){
        $commentNumber = $this->db->where('loc_id',$loc_id)
                             ->order_by('rev_id','desc')
                             ->count_all_results('rev_reviews');
        return $commentNumber;
    }
    
}