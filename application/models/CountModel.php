<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CountModel extends CI_Model
{
    public function guru_count()
    {
        $this->db->from('users');
        return $this->db->count_all_results();
    }

    public function siswa_count()
    {
        $this->db->from('siswa');
        return $this->db->count_all_results();
    }

    public function pelanggaran_count()
    {
        $this->db->from('pelanggaran');
        return $this->db->count_all_results();
    }

    public function request_count()
    {
        $this->db->from('pelanggaran');
        $this->db->where('request_hapus', 1);
        return $this->db->count_all_results();
    }
}

/* End of file CountModel.php */
