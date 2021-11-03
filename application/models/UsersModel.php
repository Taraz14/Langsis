<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model
{
    private $user = 'users';
    private $agama = 'agama';

    public function get($id)
    {
        return $this->db->get_where($this->user, ['users_id' => $id], 1);
    }

    public function agama()
    {
        return $this->db->get($this->agama);
    }

    public function update(array $new_data, $id)
    {
        return $this->db->update($this->user, $new_data, $id);
    }
}

/* End of file UsersModel.php */
