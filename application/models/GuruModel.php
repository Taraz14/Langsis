<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuruModel extends CI_Model
{
    public function save($data)
    {
        return $this->db->insert('users', $data);
    }

    //Query Datatable loaded
    private function queryGuru()
    {
        $this->db->select('*')->from('users');

        if ($this->input->get('search')['value']) {
            $this->db->like('users_nip', $this->input->get('search')['value']);
            $this->db->or_like('users_nama', $this->input->get('search')['value']);
        }
        if ($this->input->get('order')) {
            $this->db->order_by(
                $this->input->get('order')['0']['column'],
                $this->input->get('order')['0']['dir']
            );
        } else {
            $this->db->order_by('users_id', 'desc');
        }
    }

    public function dataGuru()
    {
        self::queryGuru();
        if ($this->input->get('length') !== -1) {
            $this->db->limit($this->input->get('length'), $this->input->get('start'));
        }
        return $this->db->get()->result();
    }

    public function filtered()
    {
        self::queryGuru();
        return $this->db->get()->num_rows();
    }

    public function countAll()
    {
        $this->db->from('users');
        return $this->db->count_all_results();
    }
    //!--End of Query datatable loaded

    public function delete($id)
    {
        return $this->db->delete('users', ['users_id' => $id]);
    }
}

/* End of file GuruModel.php */
