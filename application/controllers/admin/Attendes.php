<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Attendes extends Admin_Controller
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
        $this->data['title']      = 'Attendes List';
        $this->template->admin_render('admin/attendes/index', $this->data);
    }

    public function getAttende()
    {
        $action = '$1';
        $this->load->library('datatables');
        $this->datatables
            ->select('attende_details.id, attende_details.name, attende_details.position, attende_details.industry, attende_details.country')
            ->from('attende_details');
        $this->datatables->add_column("Actions", $action, "attende_details.id");
        echo $this->datatables->generate();
    }

    public function import()
    {
        if (isset($_FILES["csv_file"])) {
            $this->load->library('upload');
            $sheet_data = array_map('str_getcsv', file($_FILES['csv_file']['tmp_name']));
            if (isset($sheet_data[0])) {
                $headings = $sheet_data[0];
                if ($sheet_data) {
                    $attende = array();
                    $message = '';
                    $success = 0;   
                    foreach ($sheet_data as $key => $value) {
                        if (!empty($value[0]) && $key > 0 && !empty($value[4])) {
                            $data = array(
                                'web_scraper_start_url' => isset($value[1]) ? trim($value[1]) : '',
                                'above_name' => isset($value[2]) ? trim($value[2]) : '',
                                'email' => isset($value[3]) ? trim($value[3]) : '',
                                'name' => trim($value[4]),
                                'position' => isset($value[5]) ? trim($value[5]) : '',
                                'industry' => isset($value[6]) ? trim($value[6]) : '',
                                'about' => isset($value[7]) ? trim($value[7]) : '',
                                'country' => isset($value[8]) ? trim($value[8]) : '',
                                'profile_image' => isset($value[9]) ? trim($value[9]) : '',
                                'startup_name' => isset($value[10]) ? trim($value[10]) : '',
                                'startup_country' => isset($value[11]) ? trim($value[11]) : '',
                                'startup_logo' => isset($value[12]) ? trim($value[12]) : '',
                                'startup_page_link' => isset($value[13]) ? trim($value[13]) : '',
                                'startup_page_link_href' => isset($value[14]) ? trim($value[14]) : '',
                                'created_on' => time(),
                            );
                            if ($id = $this->general_model->insert('attende_details', $data)) {
                                for ($i = 15; $i <= 21; $i++) {
                                    if (isset($value[$i]) && !empty($value[$i])) {
                                        $expertise_tag = array(
                                            'attende_id' => $id,
                                            'expertise'  => trim($value[$i]),
                                            'created_on' => time(),
                                        );
                                        $this->general_model->insert('expertise_tag', $expertise_tag);
                                    }
                                }
                                for ($i = 22; $i <= 31; $i++) {
                                    if (isset($value[$i]) && !empty($value[$i])) {
                                        $learn_about_tag = array(
                                            'attende_id' => $id,
                                            'tag'        => trim($value[$i]),
                                            'created_on' => time(),
                                        );
                                        $this->general_model->insert('learn_about_tag', $learn_about_tag);
                                    }
                                }
                                $success++;
                            }
                        }
                    }
                    if ($success == 0) {
                        $this->session->set_flashdata('message', array('0', "Please import correct file, did not match excel sheet column"));
                    } else {
                        $msg = "Total (" . $success . ") item successfully imported.";
                        if ($message) {
                            $msg .= "<br>" . $message;
                        }
                        $this->session->set_flashdata('message', array('1', $msg));
                    }
                    redirect('admin/attendes', 'refresh');
                } else {
                    $this->session->set_flashdata('message', array('0', "Please import correct file, did not match excel sheet column"));
                    redirect('admin/attendes/', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', array('0', "File is empty or not properly formatted."));
                redirect('admin/attendes/', 'refresh');
            }
        }
        $this->data['title'] = 'Import Attende';
        $this->template->admin_render('admin/attendes/import', $this->data);
    }
}