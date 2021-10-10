<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{
    /**
     * save siswa
     * String @param array
     */
    public function save($data)
    {
        return $this->db->insert('siswa', $data);
    }

    /**
     * delete kelas
     */
    public function delete($id)
    {
        return $this->db->delete('siswa', ['siswa_id' => $id]);
    }


    //Query Datatable loaded
    private function querySiswa()
    {
        $this->db->select('*')->from('siswa s');

        if ($this->input->get('search')['value']) {
            $this->db->like('Siswa_nis', $this->input->get('search')['value']);
            $this->db->or_like('Siswa_nama', $this->input->get('search')['value']);
        }
        if ($this->input->get('order')) {
            $this->db->order_by(
                $this->input->get('order')['0']['column'],
                $this->input->get('order')['0']['dir']
            );
        } else {
            $this->db->order_by('s.siswa_id', 'desc');
        }
    }

    public function dataSiswa()
    {
        self::querySiswa();
        if ($this->input->get('length') !== -1) {
            $this->db->limit($this->input->get('length'), $this->input->get('start'));
        }
        return $this->db->get()->result();
    }

    public function filtered()
    {
        self::querySiswa();
        return $this->db->get()->num_rows();
    }

    public function countAll()
    {
        $this->db->from('siswa');
        return $this->db->count_all_results();
    }
    //!--End of Query datatable loaded
}

/* End of file SiswaModel.php */
