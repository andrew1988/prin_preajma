<?php

class RatingsModel extends CI_Model {

    //verifica daca exista inserare in tabela de
    //rat ratings, daca nu exista voi crea una noua
    //daca exista iau informatiile si le updatez,
    //multe dintre verificari se vac in controllerul
    //location_details.
    public function checkVoteExistance($loc_id) {
        $checkExistance = $this->db->where('loc_id', $loc_id)
                ->count_all_results('rat_rating');
        return $checkExistance;
    }

    /*
     * @param loc_id = id-ul localitatii
     * @param vote = votul trimis de user
     * insereaza in baza de date valorile setate in $data.
     */

    public function addVote($loc_id, $vote) {
        $data = [
            'loc_id' => $loc_id,
            'rat_nr_voturi' => 1,
            'rat_suma_totala' => $vote,
            'rat_medie_valori' => $vote
        ];
        $this->db->insert('rat_rating', $data);
    }

    /*
     * @param loc_id = id-ul localitatii
     * @param vote = votul trimis de user
     * ia ultimele valorii, si face media artimetica
     * salveaza noile valori in baza de date.
     */

    public function updateVote($loc_id, $vote) {
        $selectLastData = $this->db->get('rat_rating', array('loc_id' => $loc_id));
        $last_data = $selectLastData->result_array();
        var_dump($last_data);
        $suma_noua = $last_data[0]['rat_suma_totala'] + $vote;
        $numar_voturi = ++$last_data[0]['rat_nr_voturi'];
        $noua_medie = $suma_noua / $numar_voturi; //calculul noii medii
        $data = [
            'rat_nr_voturi' => $numar_voturi,
            'rat_suma_totala' => $suma_noua,
            'rat_medie_valori' => round($noua_medie)
        ];
        $this->db->set($data)
                ->where('loc_id', $loc_id)
                ->update('rat_rating');
    }

    /*
     * @param loc_id = id-ul localitatii
     * Sql pentru preluarea mediei calculate
     */

    public function getAverage($loc_id) {
        $average = $this->db->select('rat_medie_valori,rat_nr_voturi')
                ->get_where('rat_rating', array('loc_id' => $loc_id));
        return $average->result_array();
    }

}
