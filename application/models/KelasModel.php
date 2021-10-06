<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasModel extends CI_Model
{
    /**
     * save kelas
     */
    public function saveKelas($data)
    {
        return $this->db->insert('kelas', $data);
    }
}

/* End of file KelasModel.php */
