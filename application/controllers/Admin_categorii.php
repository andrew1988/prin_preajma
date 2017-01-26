<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_categorii extends CI_Controller {

	public function index()
	{        
               $action = $this->input->post('action');
               if(isset($action) && $action == 'add'){
                   $this->adaugaCategorie();
               }elseif(isset($action) && $action == 'delete'){
                   
               }
               
               $data['categorii'] = $this->admin_categoriiModel->listaCategorii();
              
                
                $this->load->view('inc/head');
		$this->load->view('loggedViews/inc/header'); 
                $this->load->view('adminViews/inc/admin_menu');
                $this->load->view('adminViews/admin_categorii',$data);//asta e singurrul care se schmiba in functie de controllerul accesat.
                $this->load->view('inc/footer.php');
	}
        public function adaugaCategorie(){
            $this->form_validation->set_rules('cat_nume','Categorie','required|min_length[4]');
            if($this->form_validation->run() == TRUE){
                $cat_nume = $this->input->post('cat_nume');
                $cat_type = $this->input->post('cat_type');
                
                $cat_data = ['cat_nume'=>$cat_nume,'cat_type'=>$cat_type];
                $verifica_existenta = count($this->admin_categoriiModel->checkExistance($cat_data));
                
                if($verifica_existenta == 0) {
                    $this->admin_categoriiModel->adaugaCategorie($cat_data);
                }
                
            }
            
        }
        
        public function stergeCategorie(){
            
        }
        
        
        
}
