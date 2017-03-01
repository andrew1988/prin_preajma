 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locatie extends MY_Controller {
    
    private $catType;//tipul categoriei ce va face diferenta intre formulare.
    
    public function index() {
        //get and set location info. from form
        if (isset($_POST) && !is_null($_POST) && !empty($_POST)) {
            $isFileName = $_FILES['image']['name'];
            if (isset($isFileName) && !empty($isFileName)) {
                $uploadedFileData = $this->do_upload();
                $imageName = $uploadedFileData['upload_data']['file_name'];
            } else {
                $imageName = 0;
            }
            $nume_unitate = $this->input->post('name');
            $categorie = $this->input->post('selectCategory');//id-ul categoriei.
            $cat_type = $this->CategoriiModel->getCatTypeModel($categorie); //tipul anuntului este aacelasi cu tipul categoriei.
            $descriere = $this->input->post('description');
            $judet = $this->input->post('judet');
            $oras = $this->input->post('city');
            $contact_data = $this->input->post('contact_data');
            $adresa = $this->input->post('locatie');
            $now = date("Y-m-d H:i:s");
            $loc_data = ['usr_id' => $this->session->userdata('usr_id'),
                'cat_id' => $categorie,
                'loc_pseudonim' => $nume_unitate,
                'loc_nume_firma' => '0',
                'loc_adresa_locatie' => $adresa,
                'cou_id' => $judet,
                'ors_id' => $oras,
                'loc_contact' => $contact_data,
                'loc_poza_locatie' => 'uploads/'.$imageName,
                'loc_promovat' => '0',
                'loc_despre' => $descriere,
                'loc_latitudine'=>'0',
                'loc_longitudine'=>'0',
                'loc_prg_type'=>'0',
                'loc_tip_anunt'=>$cat_type[0]['cat_type'],
                'loc_data_adaugarii' => $now,
                'loc_longitudine'=>($this->input->post('Longitude') ? $this->input->post('Longitude') : '0'),
                'loc_latitudine'=>($this->input->post('Latitude') ? $this->input->post('Latitude') : '0'),
            ];
            $this->add_location($loc_data);
        }
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']);
        $this->load->view('inc/main_search');
        $this->load->view($this->generalViewsList['locatie']); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
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

    public function add_location($loc_data) {
        $lv_start = $this->input->post('lv_start');
        $lv_end = $this->input->post('lv_end');
        $sd_start = $this->input->post('sd_start');
        $sd_end = $this->input->post('sd_end');
        $loc_data['loc_prg_type'] = '0';
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
            $sambata_end = $sd_end;
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
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '0',
                ],
                'luni_end' => [
                    'loc_id' => '',
                    'prg_hour' => $luni_end,
                    'prg_day' => 'Luni',
                    'prg_day_short' => 'L',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '1',
                ],
                'marti_start' => [
                    'loc_id' => '',
                    'prg_hour' => $marti_start,
                    'prg_day' => 'Marti',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '0',
                ],
                'marti_end' => [
                    'loc_id' => '',
                    'prg_hour' => $marti_end,
                    'prg_day' => 'Marti',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '1',
                ],
                'miercuri_start' => [
                    'loc_id' => '',
                    'prg_hour' => $miercuri_start,
                    'prg_day' => 'Miercuri',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '0',
                ],
                'miercuri_end' => [
                    'loc_id' => '',
                    'prg_hour' => $miercuri_end,
                    'prg_day' => 'Miercuri',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '1',
                ],
                'joi_start' => [
                    'loc_id' => '',
                    'prg_hour' => $joi_start,
                    'prg_day' => 'Joi',
                    'prg_day_short' => 'J',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '0',
                ],
                'joi_end' => [
                    'loc_id' => '',
                    'prg_hour' => $joi_end,
                    'prg_day' => 'Joi',
                    'prg_day_short' => 'J',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '1',
                ],
                'vineri_start' => [
                    'loc_id' => '',
                    'prg_hour' => $vineri_start,
                    'prg_day' => 'Vineri',
                    'prg_day_short' => 'V',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '0',
                ],
                'vineri_end' => [
                    'loc_id' => '',
                    'prg_hour' => $vineri_end,
                    'prg_day' => 'Vineri',
                    'prg_day_short' => 'V',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '1',
                ],
                'sambata_start' => [
                    'loc_id' => '',
                    'prg_hour' => $sambata_start,
                    'prg_day' => 'Sambata',
                    'prg_day_short' => 'S',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '0',
                ],
                'sambata_end' => [
                    'loc_id' => '',
                    'prg_hour' => $sambata_end,
                    'prg_day' => 'Sambata',
                    'prg_day_short' => 'S',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '1',
                ],
                'duminica_start' => [
                    'loc_id' => '',
                    'prg_hour' => $duminica_start,
                    'prg_day' => 'Duminica',
                    'prg_day_short' => 'D',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '0',
                ],
                'duminica_end' => [
                    'loc_id' => '',
                    'prg_hour' => $duminica_end,
                    'prg_day' => 'Duminica',
                    'prg_day_short' => 'D',
                    'prg_nonstop' => '0',
                    'prg_type'=>'0',
                    'prg_open_close_hour_type' => '1',
                ]
            ];
        } else {

            //tip orar complex
            $loc_data['loc_prg_type'] = '1';//seteaza tipul programului ca fiind complex
            $programInput = [
                'luni_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('luni_start'),
                    'prg_day' => 'Luni',
                    'prg_day_short' => 'L',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '0',
                ],
                'luni_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('luni_end'),
                    'prg_day' => 'Luni',
                    'prg_day_short' => 'L',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '1',
                ],
                'marti_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('marti_start'),
                    'prg_day' => 'Marti',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '0',
                ],
                'marti_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('marti_end'),
                    'prg_day' => 'Marti',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '1',
                ],
                'miercuri_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('miercuri_start'),
                    'prg_day' => 'Miercuri',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '0',
                ],
                'miercuri_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('miercuri_end'),
                    'prg_day' => 'Miercuri',
                    'prg_day_short' => 'M',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '1',
                ],
                'joi_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('joi_start'),
                    'prg_day' => 'Joi',
                    'prg_day_short' => 'J',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '0',
                ],
                'joi_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('joi_end'),
                    'prg_day' => 'Joi',
                    'prg_day_short' => 'J',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '1',
                ],
                'vineri_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('vineri_start'),
                    'prg_day' => 'Vineri',
                    'prg_day_short' => 'V',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '0',
                ],
                'vineri_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('vineri_end'),
                    'prg_day' => 'Vineri',
                    'prg_day_short' => 'V',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '1',
                ],
                'sambata_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('sambata_start'),
                    'prg_day' => 'Sambata',
                    'prg_day_short' => 'S',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '0',
                ],
                'sambata_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('sambata_end'),
                    'prg_day' => 'Sambata',
                    'prg_day_short' => 'S',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '1',
                ],
                'duminica_start' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('duminica_start'),
                    'prg_day' => 'Duminica',
                    'prg_day_short' => 'D',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '0',
                ],
                'duminica_end' => [
                    'loc_id' => '',
                    'prg_hour' => $this->input->post('duminica_end'),
                    'prg_day' => 'Duminica',
                    'prg_day_short' => 'D',
                    'prg_nonstop' => '0',
                    'prg_type'=>'1',
                    'prg_open_close_hour_type' => '1',
                ]
            ];
        }
        $this->LocationsModel->addLocation($loc_data, $programInput);
    }

}
