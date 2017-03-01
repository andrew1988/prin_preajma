<?php

class UserVotingModel extends CI_Model {

    public function checkExistingVote($loc_id) {
        $currentUser = $this->session->userdata('usr_id');
        $checkExistance = $this->db->where('loc_id', $loc_id)
                ->where('usr_id', $currentUser)
                ->count_all_results('usv_user_ratings');
        return $checkExistance;
    }
    
    public function addUserVote($loc_id){
        $data = [
            'usr_id' => $this->session->userdata('usr_id'),
            'loc_id' => $loc_id
        ];
        $this->db->insert('usv_user_ratings',$data);
    }

}
