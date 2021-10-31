<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PelanggaranModel extends CI_Model
{
    private $jp = 'jenis_pelanggaran';
    private $pelanggaran = 'pelanggaran';
    private $kp = 'kriteria';
    private $siswa = 'siswa';
    private $users = 'users';
    private $kelas = 'kelas';

    /**
     * Query save Kriteria
     * @return array
     */
    public function saveKriteria($data)
    {
        return $this->db->insert('kriteria', $data);
    }

    /**
     * get pelanggaran
     *
     */
    public function get_kriteria()
    {
        return $this->db->get('kriteria');
    }

    /**
     * get pelanggaran
     *
     */
    public function savePelanggaran($data)
    {
        return $this->db->insert('jenis_pelanggaran', $data);
    }

    /**
     * Detail JP
     * @return array
     * 
     */
    private function get_pelanggaran()
    {
        $query = $this->db->select('*, jp.kriteria_id AS jpk, k.kriteria_id AS kkr')
            ->from($this->jp . ' jp')
            ->join('kriteria k', 'jp.kriteria_id = k.kriteria_id')
            ->get();
        return $query;
    }

    public function get()
    {
        return $this->get_pelanggaran();
    }

    public function get_detPelanggaran($id)
    {
        $this->db->select('*')
            ->from($this->pelanggaran . ' p')
            ->join($this->jp . ' jp', 'p.jp_id = jp.jp_id', 'left')
            ->join($this->kp . ' kp', 'p.kriteria_id = kp.kriteria_id', 'left')
            ->join($this->siswa . ' s', 'p.siswa_id = s.siswa_id', 'left')
            ->join($this->kelas . ' k', 's.kelas_id = k.kelas_id', 'inner')
            ->join($this->users . ' u', 'p.users_id = u.users_id', 'left');

        $this->db->where('p.siswa_id', $id);
        return $this->db->get();
    }

    /**
     * 
     * @return array
     * get jenis pelanggaran
     */
    public function get_jp()
    {
        return $this->db->get($this->jp);
    }

    /**
     * delete pelanggaran
     */
    public function delete($id)
    {
        return $this->db->delete($this->jp, ['jp_id' => $id]);
    }

    /**
     * Input lapor pelanggaran
     * 
     */
    public function insertPelanggaran($data)
    {
        return $this->db->insert('pelanggaran', $data);
    }

    /**
     * Get @return array
     * Datatable pelanggaran per user_id
     */
    private function queryPelanggaran()
    {
        $users_id = $this->session->userdata('uid');
        $users_role = $this->session->userdata('role');
        $this->db->select('*, SUM(p.poin) as topskor, p.created_at as pcreate, p.updated_at as pupdate, p.siswa_id as sid')
            ->from($this->pelanggaran . ' p')
            ->join($this->jp . ' jp', 'p.jp_id = jp.jp_id', 'left')
            ->join($this->kp . ' kp', 'p.kriteria_id = kp.kriteria_id', 'left')
            ->join($this->siswa . ' s', 'p.siswa_id = s.siswa_id', 'left')
            ->join($this->kelas . ' k', 's.kelas_id = k.kelas_id', 'inner')
            ->join($this->users . ' u', 'p.users_id = u.users_id', 'left');
        $this->db->group_by('s.siswa_id');
        if ($users_role == 55) :
            $this->db->where('p.users_id', $users_id);
        endif;


        if ($this->input->get('search')['value']) {
            $this->db->like('s.siswa_nis', $this->input->get('search')['value']);
            $this->db->or_like('s.siswa_nama', $this->input->get('search')['value']);
        }
        if ($this->input->get('order')) {
            $this->db->order_by(
                $this->input->get('order')['0']['column'],
                $this->input->get('order')['0']['dir']
            );
        } else {
            $this->db->order_by('p.created_at', 'desc');
        }
    }

    public function dataPelanggar()
    {
        self::queryPelanggaran();
        if ($this->input->get('length') !== -1) {
            $this->db->limit($this->input->get('length'), $this->input->get('start'));
        }
        return $this->db->get()->result();
    }

    public function filtered()
    {
        self::queryPelanggaran();
        return $this->db->get()->num_rows();
    }

    public function countAll()
    {
        $this->db->from($this->pelanggaran);
        return $this->db->count_all_results();
    }

    public function deletereq(array $req, $id)
    {
        return $this->db->update($this->pelanggaran, $req, $id);
    }

    public function deleteconfirmed($id)
    {
        return $this->db->delete($this->pelanggaran, $id);
    }

    public function deletePelanggar($id)
    {
        return $this->db->delete($this->pelanggaran, $id);
    }

    public function tolakconnfirmed(array $req, $id)
    {
        return $this->db->update($this->pelanggaran, $req, $id);
    }
}

/* End of file PelanggaranModel.php */