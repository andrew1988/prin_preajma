<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_contact extends MY_Controller {

    public function index() {
        
        $this->load->model("Admin_contactModel");
        
        $config['base_url'] = base_url("admin_contact");
        $config['per_page'] = 10;
        $unread = $this->Admin_contactModel->getUnreadMessagesList($config['per_page'], $this->uri->segment(2));
        
        $config['total_rows'] = $this->Admin_contactModel->countAllUnreadMessages();
        $config['first_link'] = 'Prima';
        $config['last_link'] = 'Ultima';
        
        $config['num_links'] = 10;
        $config['first_url'] = '0';
        $config['uri_segment'] = 2;
                
        $this->pagination->initialize($config);
        $data['messages'] =  $unread;
        $data['link'] = $this->pagination->create_links();
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('adminViews/inc/admin_menu');
        $this->load->view('adminViews/admin_contact',$data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }
    
    public function readMessagesList(){
        $this->load->model("Admin_contactModel");
        
        $config['base_url'] = base_url("admin_contact_read");
        $config['per_page'] = 10;
        $unread = $this->Admin_contactModel->getReadMessagesList($config['per_page'], $this->uri->segment(2));
        
        $config['total_rows'] = $this->Admin_contactModel->countAllReadMessages();
        $config['first_link'] = 'Prima';
        $config['last_link'] = 'Ultima';
        
        $config['num_links'] = 10;
        $config['first_url'] = '0';
        $config['uri_segment'] = 2;
                
        $this->pagination->initialize($config);
        $data['messages'] =  $unread;
        $data['link'] = $this->pagination->create_links();
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('adminViews/inc/admin_menu');
        $this->load->view('adminViews/admin_contact',$data); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }
    
    public function readMessages(){
        
        $this->load->model("Admin_contactModel");
        $data = $this->Admin_contactModel->getMessageDetails($this->uri->segment(2));
        $flatData = call_user_func_array('array_merge', $data);
        
        $this->load->view('inc/head');
        $this->load->view($this->generalViewsList['header']); //apeleaza proprietatea din MY_controller unde stabileste ce header incarca.
        $this->load->view('adminViews/inc/admin_menu');
        $this->load->view('adminViews/admin_contactMessage',$flatData); //asta e singurrul care se schmiba in functie de controllerul accesat.
        $this->load->view('inc/footer.php');
    }
    
    public function deleteMessage(){
        $this->load->model("Admin_contactModel");
        $this->Admin_contactModel->deleteMessage($this->uri->segment(2));
        return redirect('admin_contact/0','refresh');
    }

}
