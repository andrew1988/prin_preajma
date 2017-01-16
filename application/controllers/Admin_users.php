<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users extends CI_Controller {

	public function index()
	{        
                //paginatia----pentru----------utilizatori.{
                $config['base_url'] = base_url("admin_users/index");
                $config['first_link'] = 'Prima';
                $config['last_link']  = 'Ultima';
                $config['per_page'] = 10;
                $config['num_links'] = 10;
                $config['uri_segment'] = 3;
                $users = $this->admin_usersModel->get_all_users($config['per_page'],$this->uri->segment(3));
                $config['total_rows'] = $this->admin_usersModel->get_users_number();
                $this->pagination->initialize($config);
                //}finalizare preluare paginatie cu informatii simple despre user.
                $data['users'] = $users;
                $data['link']  = $this->pagination->create_links();
                //print("<pre>"); print_r(count($users)); print("</pre>");
                
                $this->load->view('inc/head');
		$this->load->view('loggedViews/inc/header'); 
                $this->load->view('adminViews/inc/admin_menu');
                $this->load->view('adminViews/admin_users',$data);//asta e singurrul care se schmiba in functie de controllerul accesat.
                $this->load->view('inc/footer.php');
	}
        
        public function admin_editUser(){
                
                
                $userId = $this->uri->segment(2);
                
                $userDetails = $this->admin_usersModel->get_user_details($userId);
                
                $data['user_details'] = $userDetails;
            
                $this->load->view('inc/head');
		$this->load->view('loggedViews/inc/header'); 
                $this->load->view('adminViews/inc/admin_menu');
                $this->load->view('adminViews/admin_editUser',$data);//asta e singurrul care se schmiba in functie de controllerul accesat.
                $this->load->view('inc/footer.php');
        }
        
        
}
