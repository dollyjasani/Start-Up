<?php
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
            ->select('users.id, users.name')
            ->from('users');
        $this->datatables->add_column("Actions", $action, "users.id");
        echo $this->datatables->generate();
    }

    public function import()
    {
        if (isset($_FILES["csv_file"])) {
            $this->load->library('upload');
            $sheet_data = array_map('str_getcsv', file($_FILES['csv_file']['tmp_name']));
            echo "<pre>";
            print_r($sheet_data);
            exit;
            if (isset($sheet_data[0])) {
                $headings = $sheet_data[0];
                if ($sheet_data) {
                    $startup = array();
                    $message = '';
                    $success = 0;   
                    foreach ($sheet_data as $key => $value) {
                        if (!empty($value[0]) && $key > 0) {
                            if ($product_type && $product_price) {
                                $data = array(
                                    'name' => trim($value[0]) ? trim($value[0]) : '',
                                );
                                if($prostartupdstartupucts){
                                    $data['updated_on'] = time();
                                    $this->general_model->update('users', array('id' => $startup->id), $data);
                                }else{
                                    $data['created_on'] = time();
                                    $this->general_model->insert('users', $product);
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
