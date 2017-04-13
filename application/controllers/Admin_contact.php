<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index() {
        
        
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('inc/main_search');
        $this->load->view('inc/cat_listing');
        $this->load->view('home', $data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

}
