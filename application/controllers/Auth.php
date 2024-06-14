<?php
defined('BASEPATH') or exit('No direct script access allowed');
include APPPATH . '/third_party/PHPMailer/PHPMailerAutoload.php';

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div>");
    }

    public function index()
    {
        if ($this->session->userdata('id')) {
            redirect('admin/dashboard', 'refresh');
        } else {
            redirect('auth/login', 'refresh');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() === true) {
            $password = md5($this->input->post('password'));
            $email    = $this->input->post('email');
            $where    = array('email' => $email, 'password' => $password);
            $user     = $this->general_model->getOne('mstuser', $where);
            if ($user) {
                if ($user->is_active == 1) {
                $session = array(
                    'id' => $user->id,
                    'first_name' => $user->first_name,
                    'user_type' => $user->user_type,
                );
                $this->session->set_userdata($session);
                    $this->session->set_flashdata('message', array('1', 'Successfully login'));
                        redirect('admin/dashboard', 'refresh');
                } else {
                    $this->session->set_flashdata('message', array('0', 'Your account is inactive.'));
                    redirect('auth/login', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', array('0', 'Invalid email or password.'));
                redirect('auth/login', 'refresh');
            }
        }
        $this->data['title'] = 'Login';
        $this->template->auth_render('auth/login', $this->data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', array('1', 'Successfully logout.'));
        redirect('auth/login', 'refresh');
    }

    public function reset_password($code = null)
    {
        if (!$code) {
            show_404();
        }
        $user = $this->general_model->getOne('mstuser', array('forgotten_password_code' => $code));
        if ($user) {
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[re_password]');
            $this->form_validation->set_rules('re_password', 'Confirm Password', 'required');
            if ($this->form_validation->run() === true) {
                $update['password']       = md5($this->input->post('password'));
                $update['forgotten_password_code'] = null;
                $update['forgotten_password_time'] = null;
                if ($this->general_model->update('mstuser', array('id' => $user->id), $update)) {
                    $this->session->set_flashdata('message', array('1', 'Password successfully changed.'));
                    redirect('auth/login', 'refresh');
                } else {
                    $this->session->set_flashdata('message', array('0', 'Unable to change password.'));
                    redirect('auth/login', 'refresh');
                }
            }
            $this->data['title'] = "Reset Password";
            $this->data['code']  = $code;
            $this->template->auth_render('auth/reset_password', $this->data);
        } else {
            $this->session->set_flashdata('message', array('0', 'Your reset password link is expired.'));
            redirect('auth/login', 'refresh');
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() === true) {
            $email = $this->input->post('email');
            $user = $this->general_model->getOne('mstuser', array('email' => $email));
            $setting = $this->general_model->getOne('settings', array('id' => 1));
            if ($user) {
                if ($user->is_active == 1) {
                    $forgot['forgotten_password_code'] = id_crypt($user->id);
                    $forgot['forgotten_password_time'] = time();
                    $this->general_model->update('mstuser', array('id' => $user->id), $forgot);

                    $this->data['forgotten'] = $forgot['forgotten_password_code'];
                    $this->data['user']      = $user;
                    $message                 = $this->load->view('auth/email/forgot_password.tpl.php', $this->data, true);
                    $mail                    = new PHPMailer;
                    $mail->isSMTP();
                    $mail->Host       = 'ssl://smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = $setting->smtp_user_name;
                    $mail->Password   = $setting->smtp_password;
                    $mail->SMTPSecure = $setting->smtp_type;
                    $mail->Port       = $setting->smtp_port;
                    $mail->setFrom($setting->smtp_host, $this->config->item('site_title'));
                    $mail->addAddress($user->email);
                    $mail->isHTML(true);
                    $mail->Subject = 'Forgot Password';
                    $mail->Body    = $message;
                    if ($mail->send()) {
                        $this->session->set_flashdata('message', array('1', 'Forgot password email sent, please check your email.'));
                        redirect('auth/login', 'refresh');
                    } else {
                        $this->session->set_flashdata('message', array('0', 'Unable to send email please try again.'));
                        redirect('auth/forgot_password', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('message', array('0', 'Your account is inactive.'));
                    redirect('auth/forgot_password', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', array('0', 'Account with email does not exist.'));
                redirect('auth/forgot_password', 'refresh');
            }
        }
        $this->data['title'] = 'Forgot Password';
        $this->template->auth_render('auth/forgot_password', $this->data);
    }
}
