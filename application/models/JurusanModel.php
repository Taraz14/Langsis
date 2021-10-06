<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JurusanModel extends CI_Model
{
    /**
     * save jurusan
     */
    public function saveJurusan($data)
    {
        return $this->db->insert('jurusan', $data);
    }

    /**
     * get single jurusan
     */
    public function get()
    {
        return $this->db->get('jurusan');
    }

    //Query Datatable loaded
    private function queryJurusan()
    {
        $this->db->select('*')->from('jurusan');

        if ($this->input->get('search')['value']) {
            $this->db->like('jurusan_kode', $this->input->get('search')['value']);
            $this->db->or_like('jurusan_nama', $this->input->get('search')['value']);
        }
        if ($this->input->get('order')) {
            $this->db->order_by(
                $this->input->get('order')['0']['column'],
                $this->input->get('order')['0']['dir']
            );
        } else {
            $this->db->order_by('jurusan_id', 'desc');
        }
    }

    public function dataJurusan()
    {
        self::queryJurusan();
        if ($this->input->get('length') !== -1) {
            $this->db->limit($this->input->get('length'), $this->input->get('start'));
        }
        return $this->db->get()->result();
    }

    public function filtered()
    {
        self::queryJurusan();
        return $this->db->get()->num_rows();
    }

    public function countAll()
    {
        $this->db->from('jurusan');
        return $this->db->count_all_results();
    }
    //!--End of Query datatable loaded

    public function delete($id)
    {
        return $this->db->delete('jurusan', ['jurusan_id' => $id]);
    }
}

/* End of file JurusanModel.php */
