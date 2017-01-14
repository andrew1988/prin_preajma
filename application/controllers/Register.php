<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function index()
	{       
                $this->form_validation->set_rules('username','Utilizator','required|min_length[6]|max_length[255]|alpha_numeric');
                $this->form_validation->set_rules('emailid','Email','required|min_length[6]|valid_email');
                $this->form_validation->set_rules('password','Parola','required');
               
                if($this->form_validation->run() == FALSE){
                    
                    $data = ['successFlag'=>0,'message'=>''];
                }
                else{
                    //$successFlag = 1;
                    $user  = html_escape($this->input->post('username',TRUE));
                    $email = html_escape($this->input->post('emailid',TRUE));
                    $pass  = html_escape($this->input->post('password',TRUE));
                    $persj = html_escape($this->input->post('persoana_juridica',TRUE));
                    
                    
                    $data = ['usr_username'=>$user,'usr_email'=>$email,'usr_password'=>$pass,'usr_persoana_juridica'=>$persj];
                    $registration = $this->userModel->UserRegistration($data);

                    if($registration == 0){
                        $data = ['successFlag'=>0,'message'=>'Acest utilizator exista deja'];
                    }
                    else{
                        $data = ['successFlag'=>1,'message'=>'Ai fost inscris cu succes!'];
                    }
                }
            
                $this->load->view('inc/head');
                $this->load->view($this->generalViewsList['header']);
                $this->load->view('inc/main_search');
                //$this->load->view('inc/cat_listing');
                $this->load->view('register',$data);//asta e singurrul care se schmiba in functie de controllerul accesat.
                $this->load->view('inc/footer.php');
	}        
        
}

