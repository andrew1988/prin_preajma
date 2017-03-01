<?php
class ProgramModel extends CI_Model{
    /*
     * Metoda trimite orarul pentru luni si vineri pentru zilele de l-v
     * pentru locatiile care au program simplu.
     */
    public function getHoursForListing($loc_id){
           $getHours1 = "SELECT prg_day_short,prg_hour,prg_open_close_hour_type,loc_id FROM prg_program "
                       . "WHERE (prg_day_short = 'L' OR prg_day_short = 'V') AND loc_id = '$loc_id'";
           $q = $this->db->query($getHours1);
        return $q->result_array(); 
      
    }   
    /*
     * Metoda folosita in pagina de detalii
     * afiseaza programul complet pentru locatie. 
     * se ia doar daca tipul programului nu este nonstop
     * @param loc_id = id-ul locatiei
     */
    public function getFullHours($loc_id){
        $getHours = $this->db->order_by('prg_id','asc')
                             ->get_where('prg_program',array('loc_id'=>$loc_id));
        return $getHours->result_array();
    }
}