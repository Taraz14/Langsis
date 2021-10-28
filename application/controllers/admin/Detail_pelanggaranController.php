<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_pelanggaranController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelanggaranModel', 'pelanggaran');
        $this->isSingIn();
    }

    /**
     * Check apakah admin sudah login ?
     * 
     * @return boolean|void
     */
    private function isSingIn()
    {
        if ($this->session->isLoggon && $this->session->isAdmin) {
            return true;
        }
        redirect('logout', 'refresh');
    }

    public function index()
    {
        $data = [
            'content' => 'pages/admin/detail_pelanggaran',
            'head' => 'Detail Kriteria dan Jenis Pelanggaran',
            'subhead' => 'Pelanggaran',
            'kriteria' => $this->pelanggaran->get_kriteria()->result(),
            'pelanggaran' => $this->pelanggaran->get()->result(),
            'jp' => $this->pelanggaran->get_jp()->result()
        ];

        $this->load->view('layouts/index', $data, FALSE);
    }

    /**
     * Delete Kelas
     * return JSON
     */
    public function delete($id)
    {
        $this->pelanggaran->delete($id);
        echo json_encode(array("status" => TRUE));
    }
}

/* End of file Detail_pelanggaranController.php */
