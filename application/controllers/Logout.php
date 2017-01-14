<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function index()
	{
            $session_data = $this->session->all_userdata();
            $this->session->unset_userdata($session_data);
            $this->session->sess_destroy();
            header('Location: '. base_url().'');
            $this->load->view('inc/head');
            $this->load->view($this->generalViewsList['header']);
            $this->load->view('inc/main_search');
                //$this->load->view('inc/cat_listing');
            $this->load->view('logout');
            $this->load->view('inc/footer.php');
	}
}
