<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_users extends CI_Controller {

	public function index()
	{        
                $users = $this->admin_usersModel->get_all_users();
                $config['base_url'] = site_url("admin_users/index");
                $config['first_link'] = 'Prima';
                $config['last_link']  = 'Ultima';
                $config['per_page'] = 2;
                $config['num_links'] = 5;
                $config['total_rows'] = count($users);
                $this->pagination->initialize($config);
                $data['users'] = $users;  
                $data['link']  = $this->pagination->create_links();
               //print("<pre>"); print_r($data); print("</pre>");
                
                $this->load->view('inc/head');
		$this->load->view('loggedViews/inc/header'); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
                $this->load->view('adminViews/inc/admin_menu');
                $this->load->view('adminViews/admin_users',$data);//asta e singurrul care se schmiba in functie de controllerul accesat.
                $this->load->view('inc/footer.php');
	}
        
        
}