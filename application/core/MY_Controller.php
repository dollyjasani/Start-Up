<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* Load */
        $this->load->library(array('form_validation', 'template'));
        $this->load->helper(array('array', 'language', 'url', 'api'));
        $this->load->model('Model');
        $userData = $this->session->userdata("mstuser");
		$segments = $this->uri->segment_array();
        Auth_login();
    }

}

class Admin_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$segments = $this->uri->segment_array();
		if (empty($this->session->userdata('id'))) {
			redirect('auth/login', 'refresh');
		}
		$this->user = $this->general_model->getOne('mstuser', array('id' => $this->session->userdata('id')));
		$url = base_url($segments[1] . '/' . $segments[2] . '/' );
		$this->session->set_userdata('public_base_url', $url);
		$this->home_url = $this->session->userdata('public_base_url');
		
	}

}

