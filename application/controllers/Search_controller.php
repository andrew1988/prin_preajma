<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search_controller extends MY_Controller {

    public function index() {
        //form validation required
        
        //preia informatiile din formular
        $params = [
            'loc_pseudonim'  => $this->input->post('name'),
            'cou_id'         => $this->input->post('judet'),
            'ors_id'         => $this->input->post('city'),
            'ora_inchidere'  => $this->input->post('lv_start'),
            'ora_deschidere' => $this->input->post('lv_end')
        ];
        //prelucrarea informatiilor apelarea modelelor 
        
        $config['base_url'] = base_url("search");
        $config['per_page'] = 10;
        $locatii = $this->SearchModel->getResults($config['per_page'], $this->uri->segment(2),$params);
        $config['total_rows'] = $locatii['rows'];
        $config['first_link'] = 'Prima';
        $config['last_link'] = 'Ultima';
        $config['num_links'] = 10;
        $config['first_url'] = '0';
        $config['uri_segment'] = 2;
 
        $this->pagination->initialize($config);
        $data['rezultate'] = $locatii['rezults'];
        $data['link'] = $this->pagination->create_links();
        
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('inc/main_search');
        $this->load->view('inc/cat_listing');
        $this->load->view('search_view',$data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

}
