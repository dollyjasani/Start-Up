<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Startup extends Admin_Controller
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
        $this->data['title']      = 'Startup List';
        $this->template->admin_render('admin/startup/index', $this->data);
    }

    public function getStartup()
    {
        $action = '$1';
        $this->load->library('datatables');
        $this->datatables
            ->select('startup_details.id, startup_details.name, startup_details.description, startup_details.country, startup_details.sector')
            ->from('startup_details');
        $this->datatables->add_column("Actions", $action, "startup_details.id");
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
                    $startup = array();
                    $message = '';
                    $success = 0;   
                    foreach ($sheet_data as $key => $value) {
                        if (!empty($value[0]) && $key > 0 && !empty($value[8])) {
                            $startup_details = $this->general_model->getOne('startup_details', array('web_scraper_start_url' => trim($value[1])));
                            $data = array(
                                'web_scraper_start_url' => trim($value[1]),
                                'name' => trim($value[2]),
                                'stage' => trim($value[3]) ? trim($value[3]) : '',
                                'description' => trim($value[4]) ? trim($value[4]) : '',
                                'country' => trim($value[5]) ? trim($value[5]) : '',
                                'sector' => trim($value[6]) ? trim($value[6]) : '',
                                'created_on' => time(),
                            );
                            $link = array(
                                'link' => trim($value[8]),
                                'link_href' => trim($value[9]),
                                'created_on' => time(),
                            );
                            if ($startup_details) {
                                $link['startup_id'] = $startup_details->id;
                                $this->general_model->insert('social_details', $link);
                            } else {
                                // Otherwise, insert new startup details and then social details
                                $startup_id = $this->general_model->insert('startup_details', $data);
                                if ($startup_id) {
                                    $link['startup_id'] = $startup_id;
                                    $this->general_model->insert('social_details', $link);
                                } else {
                                    $error_message .= "Failed to insert startup details for " . $data['name'] . ". ";
                                }
                            }
                            $success++;
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
                    redirect('admin/startup', 'refresh');
                } else {
                    $this->session->set_flashdata('message', array('0', "Please import correct file, did not match excel sheet column"));
                    redirect('admin/startup/', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', array('0', "File is empty or not properly formatted."));
                redirect('admin/startup/', 'refresh');
            }
        }
        $this->data['title'] = 'Import Startup';
        $this->template->admin_render('admin/startup/import', $this->data);
    }
}
