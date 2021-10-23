<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of D_auth
 *
 * @author Dante
 * @link https://github.com/taraz14
 */
class D_auth
{

    private $ci;
    private $msg;

    function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('auth_d_model');
    }

    /*
     * get message
     */

    private function get_msg($msg)
    {
        $this->msg .= $msg . nl2br("\n");
    }

    /*
     * display message
     */

    function display_msg()
    {
        return $this->msg;
    }

    /**
     * Login user on the site. Return TRUE if login is successful
     * (user exists and activated, password is correct), otherwise FALSE.
     *
     * @param	string	(username)
     * @param	string  (password)
     */
    function login($username, $password)
    {
        if ((strlen($username) > 0) and (strlen($password) > 0)) {
            $user = $this->ci->auth_d_model->login($username, $password);

            if ($user !== NULL) {
                $this->ci->session->set_userdata(array(
                    'username' => $user->username,
                    'last_login' => $user->last_login
                ));
                return TRUE;
            } else {
                $this->get_msg('Username atau Password salah!');
            }
        }

        return FALSE;
    }

    /**
     * Logout user from the site
     *
     * @return	void
     */
    function logout()
    {
        $this->ci->session->set_userdata(array('username' => '', 'last_login' => ''));
        //$this->ci->session->unset_userdata('username');
        //$this->ci->session->unset_userdata('last_login');
        $this->ci->session->sess_destroy();
    }

    /**
     * Check if user logged in. Also test if user is activated or not.
     *
     * @param	bool
     * @return	bool
     */
    function is_logged_in()
    {
        if ($this->ci->session->userdata('username') && ($this->ci->session->userdata('username') !== NULL || $this->ci->session->userdata('username') !== '')) {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Get username
     *
     * @return	string
     */
    function get_username()
    {
        if ($this->ci->session->userdata('username')) {
            return $this->ci->session->userdata('username');
        }
        return '';
    }

    /**
     * Get error message.
     * Can be invoked after any failed operation such as login.
     *
     * @return	string
     */
    function get_error_message()
    {
        return $this->msg;
    }
}

/* End of file authlibrary.php */
/* Location: ./application/libraries/authlibrary.php */