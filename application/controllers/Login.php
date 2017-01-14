<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function index()
	{
		$email    = $this->input->post('email','Email','valid_email');
                $password = $this->input->post('password','Parola','');
                
                $userInfo = ['usr_email'=>$email,'usr_password'=>$password];
                $checkUser = $this->userModel->userLogin($userInfo);
                //print("<pre>"); print_r($checkUser); print("</pre>");//debug
               
               //print("<pre>"); print_r($this->session->all_userdata()); print("</pre>");//debug
                if($checkUser['return_type'] == 1){
                    $this->session->set_userdata($checkUser);
                    header('Location: '. base_url().'');
                }else{
                   if((!isset($email))&&(!isset($password))){
                       $data['message'] = '';
                   }
                   else{
                       $data['message'] = 'Ai gresit userul sau parola';
                   }
                    
                }
                $this->load->view('inc/head');
                $this->load->view($this->generalViewsList['header']);
                $this->load->view('inc/main_search');
                //$this->load->view('inc/cat_listing');
                $this->load->view('login',$data);//asta e singurrul care se schmiba in functie de controllerul accesat.
                $this->load->view('inc/footer.php');
	}
}
