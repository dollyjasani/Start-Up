<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('id');
        $this->user_type = $this->session->userdata('user_type');
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }

    public function index()
    {
        $this->data['title']      = 'Dashboard';
        $this->data['users']    = $this->general_model->getCount('mstuser');
        $this->template->admin_render('admin/dashboard/index', $this->data);
    }
}
