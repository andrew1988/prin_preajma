<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_controller extends MY_Controller {
        
	public function index(){
              $cou_county = json_decode($this->input->post('cou_county'));
              $cities = $this->GeneralSelectors->getCityList($cou_county);
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
            $getType = $this->CategoriiModel->getCatTypeModel($categoryId);
            print_r(json_encode($getType));
        }
        public function getFormSection(){
            $form_type = json_decode($this->input->post('cou_county'));
            if($form_type == 0){
               $this->load->view('adminViews/admin_simple_prg_form'); 
            }elseif($form_type == 1){
                $this->load->view('adminViews/admin_complex_prg_form');
            }elseif($form_type == 2){
                
            }
        }
}
