<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');*/

class Ajax_controller extends MY_Controller {
        
	public function index(){
              $cou_county = json_decode($this->input->post('cou_county'));
              $cities = $this->generalSelectors->getCityList($cou_county);
              $encoded = json_encode($cities);
              print_r($encoded);
	}
        public function getCategoryType(){
            $var = "ajunge in ajax_controller";
            print_r(json_encode($var));
        }
}
