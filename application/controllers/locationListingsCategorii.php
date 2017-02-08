<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class locationListingsCategorii extends MY_Controller {

    public function index() {
        $cat_name = $this->uri->segment(2); //segmentul 2 din link. aici se
        $cat_id = $this->uri->segment(3); //segmentul 3 id-ul categoriei      
        $config['base_url'] = base_url("categorie/$cat_name/$cat_id");
        $config['total_rows'] = $this->listingCategoriiModel->getLocationNumberByCat($cat_id);
        $config['first_link'] = 'Prima';
        $config['last_link'] = 'Ultima';
        $config['per_page'] = 4;
        $config['num_links'] = 10;
        $config['first_url'] = '1';
        $config['uri_segment'] = 4;
        $locatii = $this->listingCategoriiModel->showOnCat($config['per_page'],$this->uri->segment(4),$cat_id);
        $this->pagination->initialize($config);
        $data['locatii'] = $locatii;
        $data['link'] = $this->pagination->create_links();
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('inc/main_search');
        $this->load->view('inc/cat_listing');
        $this->load->view('listare_pe_categorie',$data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

}
