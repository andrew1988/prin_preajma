<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_categorii extends CI_Controller {

	public function index()
	{        
               $action = $this->input->post('action');
               if(isset($action) && $action == 'add'){
                   $this->adaugaCategorie();
               }elseif(isset($action) && $action == 'delete'){
                   $cat_id = $this->input->post('cat_id');
                   $this->admin_categoriiModel->stergeCategorie($cat_id);
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
        public function admin_editCategorii(){
                $catId = $this->uri->segment(2);
                $detaliiCategorie = $this->admin_categoriiModel->detaliiCategorie($catId);
                //print("<pre>"); print_r($detaliiCategorie); print("</pre>");//debug
                 $this->form_validation->set_rules('cat_nume','Categorie','required|min_length[4]');
                 if($this->form_validation->run() == TRUE){
                     $cat_nume = $this->input->post('cat_nume');
                     $cat_type = $this->input->post('cat_type');
                     $savedData = [
                         'cat_id'=>$catId,
                         'cat_nume'=>$cat_nume,
                         'cat_type'=>$cat_type
                     ];
                     $this->admin_categoriiModel->editareCategorie($savedData);
                     $detaliiCategorie = $this->admin_categoriiModel->detaliiCategorie($catId);
                 }
                $data['detaliiCategorie'] = ['cat_id'=>$detaliiCategorie[0]['cat_id'],
                                             'cat_nume'=>$detaliiCategorie[0]['cat_nume'],
                                             'cat_type'=>$detaliiCategorie[0]['cat_type']];
                $this->load->view('inc/head');
		$this->load->view('loggedViews/inc/header'); 
                $this->load->view('adminViews/inc/admin_menu');
                $this->load->view('adminViews/admin_editCategorii',$data);//asta e singurrul care se schmiba in functie de controllerul accesat.
                $this->load->view('inc/footer.php');
        }
        
        public function stergeCategorie($cat_id){
          
        }
        
        
        
}
