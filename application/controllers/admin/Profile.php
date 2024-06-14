<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('id');
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }

    public function index()
    {
        $this->data['title']      = 'Profile';
        $user = $this->general_model->getOne('mstuser', array('id' => $this->user_id));
        if ($_POST) {
            $profile_image      = '';
            if (!empty($_FILES['profile_image']['name'])) {
                /* Conf Image */
                $file_name                     = 'profile_image_' . time() . rand(100, 999);
                $configImg['upload_path']      = './uploads/profile/';
                $configImg['file_name']        = $file_name;
                $configImg['allowed_types']    = 'png|jpg|jpeg';
                $configImg['max_size']         = 2000;
                $configImg['max_width']        = 2000;
                $configImg['max_height']       = 2000;
                $configImg['file_ext_tolower'] = true;
                $configImg['remove_spaces']    = true;
                $this->load->library('upload', $configImg, 'profile_image');
                if ($this->profile_image->do_upload('profile_image')) {
                    $uploadData = $this->profile_image->data();
                    $profile_image      = 'uploads/profile/' . $uploadData['file_name'];
                } else {
                    $error = $this->profile_image->display_errors('', '');
                    $this->session->set_flashdata('message', array('0', $error));
                    redirect($_SERVER["HTTP_REFERER"], 'refresh');
                }
            }
        }
        $this->form_validation->set_rules('profile_image', '', 'callback_profile_image_validation');
        if ($this->form_validation->run() == true) {
            $date = $this->input->post('birth_date');
            $update = array(
                'first_name'   => $this->input->post('first_name'),
                'last_name'    => $this->input->post('last_name'),
                'phone'    => $this->input->post('phone'),
                'city'    => $this->input->post('city'),
                'country'    => $this->input->post('country'),
                'updated_on'    => time(),
            );
            if (($this->input->post('password') !== null) && $this->input->post('password') !== "") {
                $update['password'] = md5($this->input->post('password'));
            }
            if ($profile_image) {
                if (file_exists($user->profile_image)) {
                    unlink($user->profile_image);
                }
                $update['profile_image'] = $profile_image;
            }
            if ($this->general_model->update('mstuser', array('id' => $this->user_id), $update)) {
                $this->session->set_flashdata('message', array('1', 'Profile Successfully Updated'));
            } else {
                $this->session->set_flashdata('message', array('0', 'Something went wrong please try again'));
            }
            redirect('admin/profile', 'refresh');
        }
        $this->data['user'] = $user;
        $this->template->admin_render('admin/profile/index', $this->data);
    }

    function profile_image_validation($str) {
        #unused $str
        if (isset($this->custom_errors['profile_image'])) {
            $this->form_validation->set_message('profile_image_validation', $this->custom_errors['profile_image']);
            return FALSE;
        }
        return TRUE;
    }
}
