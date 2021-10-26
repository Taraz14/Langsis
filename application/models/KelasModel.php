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

    public function getKelas()
    {
        return $this->db->get('kelas');
    }

    public function get($id)
    {
        return $this->db->get_where('kelas', ['jurusan_id' => $id]);
    }

    /**
     * delete kelas
     */
    public function delete($id)
    {
        return $this->db->delete('kelas', ['kelas_id' => $id]);
    }

    //Query Datatable loaded
    private function queryKelas()
    {
        $this->db->select('*')->from('kelas k');
        $this->db->join('jurusan j', 'k.jurusan_id = j.jurusan_id', 'left');


        if ($this->input->get('search')['value']) {
            $this->db->like('kelas_kode', $this->input->get('search')['value']);
            $this->db->or_like('kelas_nama', $this->input->get('search')['value']);
        }
        if ($this->input->get('order')) {
            $this->db->order_by(
                $this->input->get('order')['0']['column'],
                $this->input->get('order')['0']['dir']
            );
        } else {
            $this->db->order_by('k.jurusan_id', 'desc');
        }
    }

    public function dataKelas()
    {
        self::queryKelas();
        if ($this->input->get('length') !== -1) {
            $this->db->limit($this->input->get('length'), $this->input->get('start'));
        }
        return $this->db->get()->result();
    }

    public function filtered()
    {
        self::queryKelas();
        return $this->db->get()->num_rows();
    }

    public function countAll()
    {
        $this->db->from('kelas');
        return $this->db->count_all_results();
    }
    //!--End of Query datatable loaded
}

/* End of file KelasModel.php */
