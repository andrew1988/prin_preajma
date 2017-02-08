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
               
                $data['users'] = $users;
                $data['link']  = $this->pagination->create_links();
                //print("<pre>"); print_r(count($users)); print("</pre>");
                //$this->delete_user();
                $action =  html_escape($this->input->post('action',TRUE));
                if($action == 'delete'){
                    $user_id =  html_escape($this->input->post('usr_id',TRUE));
                    $this->delete_user($user_id);
                }
                
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
                $this->form_validation->set_rules('usr_username','Utilizator','required|min_length[6]');
                $this->form_validation->set_rules('usr_email','E-mail','required|min_length[6]|valid_email');
                if($this->form_validation->run() == FALSE){
                    
                    $data['successsflag'] = 0;
                    $data['message'] = '';
                }
                else{
                
                     $username      =  html_escape($this->input->post('usr_username',TRUE));
                     $email         =  html_escape($this->input->post('usr_email',TRUE));
                     $cont_premium  =  html_escape($this->input->post('usr_premium',TRUE));
                     $usr_rank      =  html_escape($this->input->post('usr_rank',TRUE));
                     $usr_persoana_juriddica   =  html_escape($this->input->post('usr_persoana_juridica',TRUE));
                     $updated = ['usr_id'=>$userId,
                                 'usr_username'=>$username,
                                 'usr_email'=>$email,
                                 'usr_premium'=>$cont_premium,
                                 'usr_rank'=>$usr_rank,
                                 'usr_persoana_juridica'=>$usr_persoana_juriddica
                         ];
                     $this->admin_usersModel->update_user_details($updated);
                     $userDetails = $this->admin_usersModel->get_user_details($userId);
                     $data['user_details'] = $userDetails;

                }         
                $this->load->view('inc/head');
		$this->load->view('loggedViews/inc/header'); 
                $this->load->view('adminViews/inc/admin_menu');
                $this->load->view('adminViews/admin_editUser',$data);//asta e singurrul care se schmiba in functie de controllerul accesat.
                $this->load->view('inc/footer.php');
        }
        public function delete_user($user_id){
                $this->admin_usersModel->delete_user($user_id);
        }
}
