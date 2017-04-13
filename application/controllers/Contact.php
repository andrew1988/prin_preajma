<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    public function index() {
        
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('inc/main_search');
        $this->load->view('inc/cat_listing');
        $this->load->view('contact'); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }
    
    public function sendMessage(){
        $subiect  = $this->input->post("subject");
        $email    = $this->input->post("mail");
        $message  = $this->input->post("message");
        $now = date("Y-m-d H:i:s");
        $params = [
          'con_subject' => $subiect,
          'con_email'   => $email,
          'con_message' => $message,
          'con_read'    => 0,
          'con_received_date' => $now
        ];
        $this->ContactModel->saveMessage($params);
    }

}
