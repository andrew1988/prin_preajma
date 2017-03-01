<?php
class MY_Controller extends CI_Controller{
    
    public $generalCountyList;
    public $isLoggedFlag;
    public $generalViewsList;
    public $listaCategorii;
    
 function __construct(){
        parent::__construct();
        $this->load->model("GeneralSelectors");
        $this->load->model("CategoriiModel");
        $this->generalCountyList = $this->GeneralSelectors->getCountyList();
        $this->checkLog();
        $this->generalViews();
        $this->listCategorii = $this->listaCategorii();
    }
    
    public function checkLog(){
        $session_data = $this->session->all_userdata();
         //print("<pre>"); print_r($session_data); print("</pre>"); //debug;
        if((isset($session_data['return_type']))&&($session_data['return_type'] == 1)&&(isset($session_data['usr_username']))){
            return $this->isLoggedFlag = 1; //is logged in
        } 
        else{
            return $this->isLoggedFlag = 0; //is not logged in
        }
        
    }
    /*
     * Functie care se ocupa de incarcarea view-urilor specifice
     * daca esti logat trimite un view,daca nu esti logat trimite alt view
     * asta se aplica doar acolo unde trebuie sa afisez parti din site peste tot
     * de exemplu in acest caz pe tot site-ul se incarca head-erul in doua stari
     * 1 stare pentru situatia in care esti logat
     * 1 stare pentru situatia in care nu esti logat.
     */
    public function generalViews(){
        if($this->isLoggedFlag == 1){//daca logat
            $this->generalViewsList['header']   = 'loggedViews/inc/header'; //headerul cu userul atunci cand este logat
            $this->generalViewsList['locatie']  = 'loggedViews/locatie';
            $this->generalViewsList['comments'] = 'loggedViews/inc/comments.php';
            $this->generalViewsList['ratings']  = 'loggedViews/inc/rating.php';
            return $this->generalViewsList;
        }
        else{//daca nu logat
            $this->generalViewsList['header']   = 'inc/header';
            $this->generalViewsList['locatie']  = 'locatie';
            $this->generalViewsList['comments'] = 'inc/comments.php';
            $this->generalViewsList['ratings']  = 'inc/rating.php';
            return $this->generalViewsList;
        }
                
    }
    private function listaCategorii(){
       return $this->CategoriiModel->selectCategorii();
    }
}