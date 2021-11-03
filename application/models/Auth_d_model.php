<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_d_model extends CI_Model
{
    /**
     * Set Session User Data
     * 
     * @param bool $validAccount account yang valid
     */
    public function login($username, $password): bool
    {
        $password = $this->hash($password);
        $this->db->where('users_username', $username);
        $this->db->where('users_password', $password);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $row) {
                $data = [
                    'uid'           => $row->users_id,
                    'username'      => $row->users_username,
                    'email'         => $row->users_email,
                    'nama'          => $row->users_nama,
                    'iduser'          => $row->users_id,
                    'role'              => $row->users_role,
                    'rolename'          => $row->users_role == 99 ? 'Administrator' : 'Guru',
                    'status'         => $row->users_status,
                    'avatar'           => $row->users_avatar,
                    'isLoggon'     => true,
                    'isAdmin'       => $row->users_role == 99 ? true : false,
                    'isGuru' => $row->users_role == 55 ? true : false
                ];
            }
            $this->session->set_userdata($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function _log_attemps($log_time)
    {
        $this->db->insert('login_attemps', $log_time);
    }

    public function logAttemp($log_time)
    {
        return $this->_log_attemps($log_time);
    }

    private function _last_login($last_login, $id)
    {
        $this->db->update('users', $last_login, $id);
    }

    public function lastLogin($last_login, $id)
    {
        return $this->_last_login($last_login, $id);
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }
}

/* End of file Auth.php */
