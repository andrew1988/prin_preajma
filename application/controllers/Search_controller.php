<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search_controller extends MY_Controller {

    public function index() {
        //form validation required
        
        //preia informatiile din formular
        $params = [
            'loc_pseudonim' => $this->input->post('name'),
            'cou_id' => $this->input->post('judet'),
            'ors_id' => $this->input->post('city'),
            'ora_inchidere' => $this->input->post('lv_start'),
            'ora_deschidere' => $this->input->post('lv_end')
        ];
        //prelucrarea informatiilor apelarea modelelor 
        //si generarea rezultatelor
        $numarRezultate = $this->SearchModel->getResultsNumber($params);
        print("<pre>"); print_r($numarRezultate); print("</pre>");
        
        
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('inc/main_search');
        $this->load->view('inc/cat_listing');
        $this->load->view('search_view'); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

}
