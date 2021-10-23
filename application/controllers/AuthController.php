<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Auth Controller
 *  
 * @package     Langsis
 * @subpackage  Controller
 * @category    Auth-Controller
 * @author      Dante @taraz14
 * @link        https://github.com/taraz14
 */

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_d_model');
    }

    /**
     * Check apakah admin sudah login ?
     * 
     * @return void
     */
    private function isSignIn(): void
    {
        $session = $this->session;
        if ($session->isLoggon && $session->isAdmin) redirect('dashboard', 'refresh');
    }

    public function index()
    {
        $this->signIn();
    }

    /**
     * Sign In Function
     */
    public function signIn()
    {
        $this->isSignIn();

        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('login'));
        if (!$valid->run()) {
            return $this->pageSignIn();
        }
        return $this->login();
    }

    /**
     * Page View Sign In
     * 
     * @return void
     */
    private function pageSignIn(): void
    {
        $this->load->view('login');
    }

    /**
     * @return string
     */
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');

        if ($this->auth_d_model->login($username, $password)) {

            $log_time = [
                'users_id' => $this->session->userdata('uid'),
                'time_login' => date("Y-m-d H:i:s"),
            ];
            if ($remember) {
                $cookie = array(
                    'name'   => 'username',
                    'value'  => $username,
                    'expire' => '7200',  // Two weeks
                    'domain' => '.localhost/langsis',
                    'path'   => '/'
                );

                set_cookie($cookie);
                if ($this->session->userdata('role') == 99) {
                    $this->auth_d_model->logAttemp($log_time);
                    redirect('dashboard');
                } elseif ($this->session->userdata('role') == 55) {
                    $this->auth_d_model->logAttemp($log_time);
                    redirect('dashboard');
                }
            } else {
                if ($this->session->userdata('role') == 99) {
                    $this->auth_d_model->logAttemp($log_time);
                    redirect('dashboard');
                } elseif ($this->session->userdata('role') == 55) {
                    $this->auth_d_model->logAttemp($log_time);
                    redirect('dashboard');
                }
            }
        } else {
            $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">
                    <strong>Kesalahan!</strong> Username atau Password <strong>tidak</strong> sesuai!
            </div>');
            redirect();
        }
    }

    /**
     * @param string
     */
    private function _encrypting()
    {
        $param1 = '987654235678';

        $var_encrypt = $this->encrypt->encode($param1);
        $var_decrypt = $this->encrypt->decode($var_encrypt);
    }

    public function logout()
    {
        $id = $this->session->userdata('uid');
        $var = ['username' => ''];
        $last_login = ['last_login' => date("Y-m-d H:i:s")];

        $this->auth_d_model->lastLogin($last_login, ['users_id' => $id]);

        $this->session->unset_userdata($var);
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        delete_cookie('loginId');
        redirect();
    }
}

/* End of file AuthController.php */
