<?php
class UserModel extends CI_Model{
    
    public function userRegistration($params){
       extract($params);
       $query = $this->db->get('usr_users');
      // $flag = 1;
        foreach($query->result_array() as $row){
            
            if(($row['usr_username'] == $usr_username)||($row['usr_email'] == $usr_email)){
                $flag = 1;
                break;//opreste daca gaseste n-are rost sa mai continue
            }
            else{
                $flag = 0;
            }
        }
        if($flag == 0){//daca este 0 inseamna ca nu exista. 
           $now = date("Y-m-d H:i:s");
           $data = [
               'usr_username'=>$usr_username,
               'usr_email'=>$usr_email,
               'usr_password'=>$usr_password,
               'usr_rank'=>0,
               'usr_premium'=>0,
               'usr_register_date'=>$now,
               'usr_last_login'=>0,
               'usr_persoana_juridica'=>$usr_persoana_juridica
           ];
           $this->db->insert('usr_users',$data);
           return 1; // returneaza 1 daca userul nu exista.
       }
       else{
          return 0; // returneaza 0 daca userul exista deja.
       }
    }
    
    public function userLogin($params){
        extract($params);
        $query = $this->db->get_where('usr_users',array('usr_email'=>$usr_email,'usr_password'=>$usr_password));
        /*===========pseudocod pentru ce vreau sa fac
         * 1. verifica daca exista
         * 2. crreez un array pe care il returnez
         * 3. forma array-ului $data[] = ["return_type"=>[0 sau 1]....restul datelor userului cu informatii din baza de date tabelul usr_users]
         * 4. utilizez astea (le salvez in sesiune in controller)
         * nota* return_type are doua valori 1 si 0 ele inseamna : 1 daca gaseste user, 0 daca nu.
         * 5. daca nu gasesc user returnez doar return_type cu 0 , ceea ce este suficient.
         */
        $rezultate = $query->result_array();
        $data = array();
        if(count($rezultate) != 0){
            $data = ["return_type"=>1,
                     "usr_id"=>$rezultate[0]['usr_id'],
                     "usr_username"=>$rezultate[0]['usr_username'],
                     "usr_email"=>$rezultate[0]['usr_email'],
                     "usr_rank"=>$rezultate[0]['usr_rank'],
                     "usr_premium"=>$rezultate[0]['usr_premium'],
                     "usr_register_date"=>$rezultate[0]['usr_register_date'],
                     "usr_last_login"=>$rezultate[0]['usr_last_login'],
                     "usr_persoana_juridica"=>$rezultate[0]['usr_persoana_juridica']
                    ];
            //print("<pre>"); print_r($data); print("</pre>"); //debug
            return $data;
        }else{
            //daca userul nu este gasit.
            $data["return_type"] = 0;
            return $data;
        }    
    }
    
    public function updateUserData($data){
          $user_id = $this->session->userdata('usr_id');
          if(empty($data['usr_password'])){
              unset($data['usr_password']);
          }
          $this->db->set($data);
          $this->db->where('usr_id',$user_id);
          $this->db->update('usr_users');
    }
    
    public function getUserInfo(){
        $getData = $this->db->select('usr_nume,usr_prenume')
                            ->get_where('usr_users',array('usr_id'=>$this->session->userdata('usr_id')));
        return $getData->result_array();
    }
    
}