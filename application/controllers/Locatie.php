<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locatie extends MY_Controller {

    public function index() {

        $nume_unitate = $this->input->post('name');
        $descriere = $this->input->post('description');
        $imagine_loc = $this->input->post('image'); //asta cred ca se ia altfel dar momentan lasa-l asa.
        $judet = $this->input->post('judet');
        $oras = $this->input->post('city');
        $adresa = $this->input->post('locatie');


        $now = date("Y-m-d H:i:s");
        $loc_data = ['usr_id' => $this->session->userdata('usr_username'),
            'cat_id' => 1, //$this->input->post('cat_id'),
            'loc_pseudonim' => $nume_unitate,
            'loc_nume_firma' => '0',
            'loc_adresa_locatie' => $adresa,
            'cou_id' => $judet,
            'ors_id' => $oras,
            'loc_contact' => '0',
            'loc_poza_profil' => '0',
            'loc_promovat' => '0',
            'loc_despre' => $descriere,
            'loc_data_adaugarii' => $now
        ];
        echo $imagine_loc;
        /*if(isset($loc_data) && !is_null($loc_data) && !empty($loc_data)){
            $this->add_location($loc_data);
        }*/
        
        print("<pre>"); print_r($this->do_upload()); print("</pre>");
        
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']);
        $this->load->view('inc/main_search');
        $this->load->view($this->generalViewsList['locatie']); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

    public function do_upload() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }

    public function add_location($loc_data) {
        $lv_start = $this->input->post('lv_start');
        $lv_end = $this->input->post('lv_end');
        $sd_start = $this->input->post('sd_start');
        $sd_end = $this->input->post('sd_end');

        if ((isset($lv_start)) && (isset($lv_end) && (!empty($lv_start)) && (!empty($lv_end)))) {
            //tip orar simplu - folosim: salvam toate zilele in baza de date
            $luni_start = $lv_start;
            $luni_end = $lv_end;
            $marti_start = $lv_start;
            $marti_end = $lv_end;
            $miercuri_start = $lv_start;
            $miercuri_end = $lv_end;
            $joi_start = $lv_start;
            $joi_end = $lv_end;
            $vineri_start = $lv_start;
            $vineri_end = $lv_end;
            $sambata_start = $sd_start;
            $sambata_end = '';
            $duminica_start = $sd_start;
            $duminica_end = $sd_end;
            //prg_closed_all_day 0 pentru deschis - 1 pentru inchis
            $programInput = [
                'luni_start' => [
                    'loc_id' => '',
                    'prg_hour' => $luni_start,
                    'prg_day' => 'Luni',
                    'prg_day_short' => 'L',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'luni_end' => [
                    'loc_id' => '',
                    'prg_hour' => $luni_end,
                    'prg_day' => 'Luni',
                    'prg_day_short' => 'L',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'marti_start' => [
                    'loc_id' => '',
                    'prg_hour' => $marti_start,
                    'prg_day' => 'Marti',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'marti_end' => [
                    'loc_id' => '',
                    'prg_hour' => $marti_end,
                    'prg_day' => 'Marti',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'miercuri_start' => [
                    'loc_id' => '',
                    'prg_hour' => $miercuri_start,
                    'prg_day' => 'Miercuri',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'miercuri_end' => [
                    'loc_id' => '',
                    'prg_hour' => $miercuri_end,
                    'prg_day' => 'Miercuri',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'joi_start' => [
                    'loc_id' => '',
                    'prg_hour' => $joi_start,
                    'prg_day' => 'Joi',
                    'prg_day_short' => 'j',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'joi_end' => [
                    'loc_id' => '',
                    'prg_hour' => $joi_end,
                    'prg_day' => 'Joi',
                    'prg_day_short' => 'J',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'vineri_start' => [
                    'loc_id' => '',
                    'prg_hour' => $vineri_start,
                    'prg_day' => 'Vineri',
                    'prg_day_short' => 'V',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'vineri_end' => [
                    'loc_id' => '',
                    'prg_hour' => $vineri_end,
                    'prg_day' => 'Vineri',
                    'prg_day_short' => 'V',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'sambata_start' => [
                    'loc_id' => '',
                    'prg_hour' => $sambata_start,
                    'prg_day' => 'Sambata',
                    'prg_day_short' => 'S',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'sambata_end' => [
                    'loc_id' => '',
                    'prg_hour' => $sambata_end,
                    'prg_day' => 'Sambata',
                    'prg_day_short' => 'S',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'duminica_start' => [
                    'loc_id' => '',
                    'prg_hour' => $duminica_start,
                    'prg_day' => 'Duminica',
                    'prg_day_short' => 'D',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'duminica_end' => [
                    'loc_id' => '',
                    'prg_hour' => $duminica_end,
                    'prg_day' => 'Duminica',
                    'prg_day_short' => 'D',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ]
            ];
        } else {

            //tip orar complex

            $programInput = [
                'luni_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('luni_start'),
                    'prg_day' => 'Luni',
                    'prg_day_short' => 'L',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'luni_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('luni_end'),
                    'prg_day' => 'Luni',
                    'prg_day_short' => 'L',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'marti_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('marti_start'),
                    'prg_day' => 'Marti',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'marti_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('marti_end'),
                    'prg_day' => 'Marti',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'miercuri_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('miercuri_start'),
                    'prg_day' => 'Miercuri',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'miercuri_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('miercuri_end'),
                    'prg_day' => 'Miercuri',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'joi_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('joi_start'),
                    'prg_day' => 'Joi',
                    'prg_day_short' => 'j',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'joi_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('joi_end'),
                    'prg_day' => 'Joi',
                    'prg_day_short' => 'J',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'vineri_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('vineri_start'),
                    'prg_day' => 'Vineri',
                    'prg_day_short' => 'V',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'vineri_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('vineri_end'),
                    'prg_day' => 'Vineri',
                    'prg_day_short' => 'V',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'sambata_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('sambata_start'),
                    'prg_day' => 'Sambata',
                    'prg_day_short' => 'S',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'sambata_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('sambata_end'),
                    'prg_day' => 'Sambata',
                    'prg_day_short' => 'S',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ],
                'duminica_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('duminica_start'),
                    'prg_day' => 'Duminica',
                    'prg_day_short' => 'D',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '0',
                ],
                'duminica_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('duminica_end'),
                    'prg_day' => 'Duminica',
                    'prg_day_short' => 'D',
                    'prg_nonstop' => '0',
                    'prg_closed_all_day' => '1',
                ]
            ];
        }
        if (isset($imagine_loc) && !empty($imagine_loc)) {
            echo $imagine_loc;
            //$this->do_upload();
        }
        $this->LocationsModel->addLocation($loc_data, $programInput);
    }

}
