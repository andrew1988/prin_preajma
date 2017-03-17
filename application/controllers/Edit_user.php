<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_user extends MY_Controller {

    public function index() {
        $userInfo = $this->UserModel->getUserInfo();
        print("<pre>"); print_r($userInfo); print("</pre>");
        $data = [
          'usr_nume'=> $userInfo[0]['usr_nume'],
          'usr_prenume'=> $userInfo[0]['usr_prenume'],
        ];

        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']);
        $this->load->view('inc/main_search');
        $this->load->view($this->generalViewsList['editUser'],$data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }
    
    public function updateProfile() {

        $this->form_validation->set_rules('nume', 'Nume', 'alpha_numeric');
        $this->form_validation->set_rules('prenume', 'Prenume', 'alpha_numeric');
        $this->form_validation->set_rules('password', 'Parola', 'min_length[6]');
        $this->form_validation->set_rules('password_check', 'Verifica Parola', 'matches[password]');

        if ($this->form_validation->run() == TRUE) {
            //echo 'dap este adevarat';
            $password = $this->input->post('password');
            $data = [
                'usr_nume' => $this->input->post('nume'),
                'usr_prenume' => $this->input->post('prenume'),
                'usr_password' => (!empty($this->input->post('password_check')) ? $password : ''),
            ];
            //print("<pre>"); print_r($data); print("</pre>");
            $this->UserModel->updateUserData($data);
            redirect('edit_profile');
        } else {
            $data = [
                'usr_nume' => $this->input->post('nume'),
                'usr_prenume' => $this->input->post('prenume'),
                        
            ];
            $this->load->view('inc/head');
            $this->load->view($this->generalViewsList['header']);
            $this->load->view('inc/main_search');
            $this->load->view($this->generalViewsList['editUser'],$data); //asta e singurrul care se schmiba in functie de controllerul accesat.
            $this->load->view('inc/footer.php');
        }
    }

}
