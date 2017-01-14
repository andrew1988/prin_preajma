<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locatie extends MY_Controller {

	public function index()
	{
		$this->load->view('inc/head');
                $this->load->view($this->generalViewsList['header']);
                $this->load->view('inc/main_search');
                //$this->load->view('inc/cat_listing');
                $this->load->view($this->generalViewsList['locatie']);//asta e singurrul care se schmiba in functie de controllerul accesat.
                $this->load->view('inc/footer.php');
	}
}
