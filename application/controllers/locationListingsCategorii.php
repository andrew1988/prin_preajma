<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class locationListingsCategorii extends MY_Controller {

    public function index() {
        $cat_name = $this->uri->segment(2); //segmentul 2 din link. aici se
        $cat_id = $this->uri->segment(3); //segmentul 3 id-ul categoriei      
        $config['base_url'] = base_url("categorie/$cat_name/$cat_id");
        $config['total_rows'] = $this->ListingCategoriiModel->getLocationNumberByCat($cat_id);
        $config['first_link'] = 'Prima';
        $config['last_link'] = 'Ultima';
        $config['per_page'] = 4;
        $config['num_links'] = 10;
        $config['first_url'] = '0';
        $config['uri_segment'] = 4;
        $locatii = $this->ListingCategoriiModel->showOnCat($config['per_page'], $this->uri->segment(4), $cat_id);
        $this->pagination->initialize($config);

        $data = array();
        $loc = array();
        foreach ($locatii as $locatie) {//sa incerc faza cu pointerul de pe discovery ca s-ar putea sa rescriu mare parte din ce este aicii
            //face parte ddin codecleanup --- se pune &inainte variiabilei si face referire la cea originala si inlocuieste diirect.
            //setare poza
            if ($locatie['loc_poza_locatie'] == 'uploads/0') {
                $locatie['loc_poza_locatie'] = 'uploads/placeholder.jpg';
            }
            //setare program
            if ($locatie['loc_prg_type'] == 0) {
                $hours = $this->ProgramModel->getHoursForListing($locatie['loc_id']);
                $locatie['orar'] = $hours[0]['prg_day_short'] . '-' . $hours[3]['prg_day_short'] . ' ' . $hours[0]['prg_hour'] . '-' . $hours[3]['prg_hour'];
            } else {
                $locatie['orar'] = 'Vezi Orar';
            }
            //setare vizualizare harta/mesaj lipsa de coordonate
            if (($locatie['loc_longitudine'] != 0) && ($locatie['loc_latitudine'])) {
                $locatie['harta'] = '<a href="https://maps.google.co.in/maps?q=' . $locatie['loc_latitudine'] . ',' . $locatie['loc_longitudine'] . '" target="_blank">Harta</a>';
            } else {
                $locatie['harta'] = 'Vezi Adresa';
            }
            $locatie['cat_nume'] = $cat_name; //seteaza numele categoriei pentru trimitere in view
            array_push($loc, $locatie);  
        }
        
        $data['locatii'] = $loc;
        $data['link'] = $this->pagination->create_links();

        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('inc/main_search');
        $this->load->view('inc/cat_listing');
        $this->load->view('listare_pe_categorie', $data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

}
