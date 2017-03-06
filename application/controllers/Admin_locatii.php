<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_locatii extends MY_Controller {

    public function index() {
        $config['base_url'] = base_url("admin_locations");
        $config['first_link'] = 'Prima';
        $config['last_link'] = 'Ultima';
        $config['per_page'] = 10;
        $config['num_links'] = 10;
        $config['first_url'] = '0';
        $config['uri_segment'] = 10;
        $config['total_rows'] = $this->Admin_locationsModel->getLocationsNumber();
        $locatii = $this->Admin_locationsModel->getLocations($config['per_page'], $this->uri->segment(2));
        $this->pagination->initialize($config);
        $data['locatii'] = $locatii;
        $data['link'] = $this->pagination->create_links();
        //print("<pre>"); print_r($data); print("</pre>"); 
        $this->load->view('inc/head');
        $this->load->view('loggedViews/inc/header'); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('adminViews/inc/admin_menu');
        $this->load->view('adminViews/admin_locations', $data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

    public function edit() {
        $loc_id = $this->uri->segment(2);
        $data = $this->Admin_locationsModel->getLocationDetails($loc_id);
        $flatData = call_user_func_array('array_merge', $data);
        print("<pre>"); print_r($flatData); print("</pre>");

        $this->load->view('inc/head');
        $this->load->view('loggedViews/inc/header'); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('adminViews/inc/admin_menu');
        $this->load->view('adminViews/admin_edit_locations', $flatData); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

    public function updateLocation() {
        $loc_id = $this->input->post('loc_id');
        $data = $this->Admin_locationsModel->getLocationDetails($loc_id);
        $flatData = call_user_func_array('array_merge', $data);

        $isFileName = $_FILES['image']['name'];
       //sterge poza(fisierul fizic) 
       if(!empty($isFileName) && isset($isFileName)){
            if($flatData['loc_poza_locatie'] != 'uploads/0'){
                unlink('uploads/'.$flatData['loc_poza_locatie']);
            }
        }
        $inputData = [
            'cat_id' => $this->input->post('cat_id'),
            'loc_pseudonim' => $this->input->post('loc_pseudonim'),
            'loc_adresa_locatie' => $this->input->post('loc_adresa_locatie'),
            'loc_despre'=>$this->input->post('loc_despre'),
            'cou_id' => $this->input->post('judet'),
            'ors_id' => $this->input->post('city'),
            'loc_contact' => $this->input->post('loc_contact'),
            //(!empty($_FILES['image']['name'] ? 'loc_poza_locatie' => $_FILES['image']['name'] : '' ),
            'loc_prg_type' => $this->input->post('loc_contact'),
            'loc_tip_anunt' => $this->input->post('loc_tip_anunt'),
        ];
        print("<pre>"); print_r($inputData); print("</pre>");

        if (isset($isFileName) && !empty($isFileName)) {
            $uploadedFileData = $this->do_upload();
            $imageName = $uploadedFileData['upload_data']['file_name'];
        } else {
            $imageName = 0;
        }
        
    }

    public function do_upload() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['remove_spaces'] = 'TRUE';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }

}
