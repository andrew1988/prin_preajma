<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_locatii extends CI_Controller {

    public function index() {

        $config['base_url'] = base_url("admin_locations/");
        $config['first_link'] = 'Prima';
        $config['last_link'] = 'Ultima';
        $config['per_page'] = 2;
        $config['num_links'] = 10;
        $config['first_url'] = '0';
        $config['uri_segment'] = 10;
        $locatii = $this->Admin_locationsModel->getLocations($config['per_page'], $this->uri->segment(2));
        $config['total_rows'] = $this->Admin_locationsModel->getLocationsModel();
        $this->pagination->initialize($config);
        $data['locatiii'] = $locatii;
        $data['link'] = $this->pagination->create_links();
        //print("<pre>"); print_r($data); print("</pre>");
        $this->load->view('inc/head');
        $this->load->view('loggedViews/inc/header'); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('adminViews/inc/admin_menu');
        $this->load->view('adminViews/admin_locations',$data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

}
