<?php

class AdminBlocker {
    
   private $CI;

    function __construct()
    {
        $this->CI =& get_instance();

        if(!isset($this->CI->session)){  //Check if session lib is loaded or not
              $this->CI->load->library('session');  //If not loaded, then load it here
        }
        
    }
    public function checkAdmin(){
       //echo "Afiseaza informatiile sesiunii din hook";
        
       $page_prefix = substr(basename($_SERVER['PHP_SELF']),0,6);
       //echo $page_prefix;
       //daca nu este admin redirectioneaza catre prima pagina.
       if(($page_prefix == 'admin_')&&($this->CI->session->userdata('usr_rank')!= 1 )){
           header('Location: '. base_url().'');
       }
       
       //print("<pre>"); print_r($this->CI->session->all_userdata()); print("</pre>"); 
    }
}

