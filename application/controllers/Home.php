<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index() {
        $locatii = $this->HomeModel->listLocations();
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
                $locatie['harta'] = '<a href="https://maps.google.co.in/maps?q='.$locatie['loc_latitudine'].','.$locatie['loc_longitudine'].'" target="_blank">Harta</a>';
            } else {
                $locatie['harta'] = 'Vezi Adresa';
            }

            array_push($loc, $locatie);
        }
        $data['locatii'] = $loc;
        //print("<pre>"); print_r($data); print("</pre>");    
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('inc/main_search');
        $this->load->view('inc/cat_listing');
        $this->load->view('home', $data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

}
