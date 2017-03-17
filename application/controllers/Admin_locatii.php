<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_locatii extends MY_Controller {

    public $days = array('luni', 'marti', 'miercuri', 'joi', 'vineri', 'sambata', 'duminica');

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
        $this->load->model('ProgramModel');
        $getFullHours = $this->ProgramModel->getFullHours($loc_id);
        /* pune programul intr-un singur array pentru fiecare zi */
        $generateProgramArray = array();
        foreach ($getFullHours as $prg) {

            if ((!array_key_exists($prg['prg_day'], $generateProgramArray))) {
                $generateProgramArray[$prg['prg_day']] = [
                    'ziua' => $prg['prg_day'],
                    'deschide_la' => $prg['prg_hour'],
                ];
            } else {
                $generateProgramArray[$prg['prg_day']]['inchide_la'] = $prg['prg_hour'];
            }
        }
        $programPrelucrat['program'] = $generateProgramArray;
        /* end prelucrare program */
        $flatData = call_user_func_array('array_merge', $data);
        $flatData = array_merge($flatData, $programPrelucrat);
        print("<pre>");
        print_r($flatData);
        print("</pre>");

        $this->load->view('inc/head');
        $this->load->view('loggedViews/inc/header'); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('adminViews/inc/admin_menu');
        $this->load->view('adminViews/admin_edit_locations', $flatData); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

    /*
     * pseudocod pentru ce trebuie sa se intample aici:
     * 1. daca schimba categoria de la locatie la serviciu
     *          (tipul locatie , respectiv tipul serviciu.
     *          categoriile sunt de doua feluri).
     *    verifica sterge programul din lista de programe
     * 2. Daca schimba programul in nonstop aceeasi miscare
     * 3. Daca schimba din serviciu in locatie trebuie sa adauge programul
     * 4. Daca nu schimba tipul programului sau tipul locatiei face update
     *    normal la cel actual
     * 5. Restul elementelor se updateaza normal.
     */

    public function updateLocation() {
        $loc_id = $this->input->post('loc_id');
        $nonstop = $this->input->post('non_stop'); // asta se seteaza doar daca alege nonstop.
        $cat_id = $this->input->post('selectCategory');
        $this->load->model('CategoriiModel');
        $this->load->model('ProgramModel');
        $cat_type = $this->CategoriiModel->getCatTypeModel($cat_id);

        //intai verificam dupa categorie , pentru ca este deasupra
        //dupa care verificam dupa program, trebuie sa vedem
        /*
         * Daca avem categorie de tip 0:
         * 1. verifica daca are program
         *      1.a. Daca nu are program , adaugam
         *      1.b. Daca are program updatam
         *      1.c. Daca alege nonstop sterge programul
         * Daca avem categorie de tip 1:
         *      1.a. Verifica daca are program, stergem
         *      1.b. Daca nu are program atunci ok, face update
         *           doar in loc_locatii, nu umbla in prg_program
         *  
         */
        //start sectiune ce necesita separare in alta functie
        if ($cat_type[0]['cat_type'] == 0) {
            $ProgramNumber = $this->ProgramModel->checkProgramExistance($loc_id);
            if ($ProgramNumber != 0) {//aici verificam daca are program, cazul daca are
                //aici facem update
                $prgData = array();
                $prg_type = $this->input->post('prg_type'); 
                echo $prg_type;
                if ($prg_type == 0) {
                    $lv_start = $this->input->post('lv_start');
                    $lv_end = $this->input->post('lv_end');
                    $sd_start = $this->input->post('sd_start');
                    $sd_end = $this->input->post('sd_end');
                    echo 'tip_simplu';
                    
                    
                } elseif($prg_type == 1) {
                    echo 'tip_complex';
                    $i = 0;
                    foreach ($this->days as $day) {
                        $dayStart = $this->input->post($day . '_start');
                        $dayEnd = $this->input->post($day . '_end');
                        //construirea array-ului pe zi pentru update
                        $prgData[$i] = [
                            'prg_day' => $day,
                            'prg_hour_start' => $dayStart,
                            'prg_hour_end' => $dayEnd,
                        ];
                        $i++;
                        //end construirea array-ului oe zi pentru update.
                    }
                    print("<pre>");
                    print_r($prgData);
                    print("</pre>");
                    $this->ProgramModel->updateProgram($loc_id);
                }
            } else {//cazul daca nu are program
                //aici facem insert
            }
        } elseif ($cat_type[0]['cat_type'] == 1) {
            if ($ProgramNumber != 0) {//aici verificam daca are program, cazul daca are
                $this->ProgramModel->deleteProgram($loc_id);
            } else {//cazul daca nu are program
            }
        }
        //end sectiune ce trebuie pusa in alta sectiune.

        $data = $this->Admin_locationsModel->getLocationDetails($loc_id);
        $flatData = call_user_func_array('array_merge', $data);

        $isFileName = $_FILES['image']['name'];
        //sterge poza(fisierul fizic) 
        if (!empty($isFileName) && isset($isFileName)) {
            if ($flatData['loc_poza_locatie'] != 'uploads/0') {
                unlink('uploads/' . $flatData['loc_poza_locatie']);
            }
        }
        $inputData = [
            'cat_id' => $cat_id,
            'loc_pseudonim' => $this->input->post('loc_pseudonim'),
            'loc_adresa_locatie' => $this->input->post('loc_adresa_locatie'),
            'loc_despre' => $this->input->post('loc_despre'),
            'cou_id' => $this->input->post('judet'),
            'ors_id' => $this->input->post('city'),
            'loc_contact' => $this->input->post('loc_contact'),
            //(!empty($_FILES['image']['name'] ? 'loc_poza_locatie' => $_FILES['image']['name'] : '' ),
            'loc_prg_type' => $this->input->post('loc_contact'),
            'loc_tip_anunt' => $this->input->post('loc_tip_anunt'),
        ];
        print("<pre>");
        print_r($inputData);
        print("</pre>");

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
