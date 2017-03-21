<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location_details extends MY_Controller {

    public function index() {
        /*
         * Pseudocod pentru ceea ce ar trebui sa apara in acest controller
         * caz special pentru rating-uri : 
         * 1.daca un user nu a votat apare formularul cu stelute
         * 2. daca un user a votat o loacatie atunci apare media
         * (imaginea cu stelele corespunzatoare mediei calculate)
         * 3. restul informatiilor afisate corect in pagina
         * 4. formularul de adaugare/afisare comentarii
         *     formularul asta este local, doar in aceasta paagina de detalii
         *     deci nu va fi nevoie de controller special, eventual doar de model
         */

        $loc_id = $this->uri->segment(3);
        $detaliiLocatie = $this->LocationDetailsModel->getLocationDetails($loc_id);
        $flat = call_user_func_array('array_merge', $detaliiLocatie);
        if ($flat['loc_poza_locatie'] == 'uploads/0') {
            $flat['loc_poza_locatie'] = 'uploads/placeholder.jpg';
        }
        //start generare link-uri pentru view-uri - functia se executa in MY_controller.
        $flat['comentarii'] = $this->generalViewsList['comments'];
        $flat['ratings'] = $this->generalViewsList['ratings'];
        //end generare link pentru view-uri
        //preia componentele detaliilor: commentarii,rating,program
        $comments = $this->getComments($loc_id);
        $rating = $this->getRating($loc_id);
        $program['program'] = $this->genereazaProgram($loc_id, $flat['loc_prg_type']);
        //end preluare componente.

        $toView = array_merge($flat, $comments, $rating, $program);
        //structura marcata pentru codecleanup(o fac cu ruta separata ca la setRating
        if (!empty($this->input->post('comments'))) {
            $this->addComment($loc_id);
        }

        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('inc/main_search');
        $this->load->view('inc/cat_listing');
        $this->load->view('detaliiLocatie', $toView); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }

    public function addComment($loc_id) {
        $this->form_validation->set_rules('comment', 'Comentariul', 'required|min_length[6]|max_length[400]');
        if ($this->form_validation->run() == true) {
            $comment = $this->input->post('comment');
            $savedData = [
                'usr_id' => $this->session->userdata('usr_id'),
                'loc_id' => $loc_id,
                'rev_comment' => $comment,
                'rev_data_adaugarii' => date('Y-m-d h:i:s', now())
            ];
            $this->load->model('CommentsModel');
            $this->CommentsModel->addComment($savedData);
            $locatie = $this->uri->segment(2);
            redirect('details/'. $locatie .'/'. $loc_id .'', 'refresh');
        }
    }

    public function getComments($loc_id) {
        $data = array();
        $this->load->model('CommentsModel');
        $location_name = $this->uri->segment(2);
        $location_id = $this->uri->segment(3);
        //comments pagination starts
        $config['base_url'] = base_url("details/$location_name/$location_id");
        $config['suffix'] = '#comment_section';
        $config['total_rows'] = $this->CommentsModel->getCommentsNumber($location_id);
        $config['first_link'] = 'Prima';
        $config['last_link'] = 'Ultima';
        $config['per_page'] = 5;
        $config['num_links'] = 10;
        $config['first_url'] = '0';
        $config['uri_segment'] = 4;
        //comments paginations ends
        $comments = $this->CommentsModel->getComments($loc_id, $config['per_page'], $this->uri->segment(4));
        $this->pagination->initialize($config);
        $data['comments'] = $comments;
        $data['link'] = $this->pagination->create_links();
        return $data;
    }

    /*
     * metoda asta se apeleaza direct prin routerr din formularul de rating varianta logata
     * deci este views/loggedViews/inc/rating.php
     */

    public function setRating() {
        $location_id = $this->uri->segment(3);
        $location_name = $this->uri->segment(2);
        echo 'Id Locatie:' . $location_id;
        $this->load->model('UserVotingModel');
        $rating = $this->input->post('rate_vote');
        //iau valoare din usv_user_voting si verific daca un user a mai votat o locatie
        $userVoteExists = $this->UserVotingModel->checkExistingVote($location_id);
        if ($userVoteExists == 0) {//un nivel in plus de securitate, ramane de vazut cum se comporta sub trafic
            //daca nu a mai votat aceasta locatie verific daca locatia are sau nu voturi
            $this->load->model('RatingsModel');
            $checkRatingExisntance = $this->RatingsModel->checkVoteExistance($location_id);
            if ($checkRatingExisntance == 0) {
                //daca nuu are voturi fac insert nou in tabele usv_user_voting si 
                //rat_rating
                $this->RatingsModel->addVote($location_id, $rating);
                $this->UserVotingModel->addUserVote($location_id);
            } else {
                //daca are voturi apeles functia de update informatii
                //si insert in usv_user_voting
                echo $this->RatingsModel->updateVote($location_id, $rating);
                $this->UserVotingModel->addUserVote($location_id);
            }
        }
        redirect('details/' . $location_name . '/' . $location_id . '/0');
    }

    /*
     * ia media rating-ului si verifica daca trimite daca se 
     * afiseaza pe user/locatie formularul de rating 
     */

    public function getRating($location_id) {
        $flat = array();
        $this->load->model('UserVotingModel');
        $userVoteExists = $this->UserVotingModel->checkExistingVote($location_id);
        if ($userVoteExists == 0) {
            //aici pun daca se afiseaza adica 1
            $ableToVote = 1;
        } else {
            //aici pun daca nu se afiseaza adica 0
            $ableToVote = 0;
        }
        $this->load->model('RatingsModel');
        $getAverage = $this->RatingsModel->getAverage($location_id);
        //asta ca sa reduc array-ul de la multidimensional la o singura dimensiune
        //ia media doar daca exista inregistrarea pentru locatie
        /*
         * as putea sa modific si sa evit verificarea asta adaugand la inscriere automat
         * inregistrarea cu default la 0.
         */
        $existaVotare = $this->RatingsModel->checkVoteExistance($location_id);
        if ($existaVotare != 0) {
            $flat = call_user_func_array('array_merge', $getAverage);
        }
        if (!array_key_exists('rat_nr_voturi', $flat)) {
            $flat['rat_nr_voturi'] = 0;
            $flat['rat_medie_valori'] = 0;
        }
        $flat['vote'] = $ableToVote;
        return $flat;
    }

    /*
     * genereaza programul locatiilor
     * @pparam loc_id  = id-ul locatiei
     * @param prg_tyoe = tipul programului
     *  0 program compact
     *  1 program complex
     *  2 non stop
     */

    public function genereazaProgram($loc_id, $prg_type) {

        if (($prg_type == 0) || ($prg_type == 1)) {
            $generateProgramArray = array();
            $program = $this->ProgramModel->getFullHours($loc_id);

            foreach ($program as $prg) {

                if ((!array_key_exists($prg['prg_day'], $generateProgramArray))) {
                    $generateProgramArray[$prg['prg_day']] = [
                        'ziua' => $prg['prg_day'],
                        'deschide_la' => $prg['prg_hour'],
                    ];
                } else {
                    $generateProgramArray[$prg['prg_day']]['inchide_la'] = $prg['prg_hour'];
                }
                //print("<pre>"); print_r($prg); print("</pre>");
            }
            $program['non_stop'] = '0';
            return $generateProgramArray;
        } elseif ($prg_type == 2) {
            $program['non_stop'] = '1';
            return $program;
        }
    }

}
