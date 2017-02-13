<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');*/

class Ajax_controller extends MY_Controller {
        
	public function index(){
              $cou_county = json_decode($this->input->post('cou_county'));
              $cities = $this->generalSelectors->getCityList($cou_county);
              $encoded = json_encode($cities);
              print_r($encoded);
	}
        /*
         * functia cauta tipul categoriei pentru a fi returnat in 
         * formularul de adaugare locatii/servicii
         * in functie de rezultat afiseaza sau nu partea de program
         * daca returneaza 0 afiseaza daca nu, afiseaza formular simplu
         */
        public function getCategoryType(){
            $categoryId = $this->input->post('cat_id');
            $getType = $this->categoriiModel->getCatTypeModel($categoryId);
            print_r(json_encode($getType));
        }
}
